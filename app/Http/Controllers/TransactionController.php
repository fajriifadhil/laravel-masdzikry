<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use App\Models\IsiPaket;
use App\Models\MetodePembayaran;
use App\Models\Paket;
use App\Models\Transaksi;
use DateTime;
use DateTimeZone;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Midtrans\Config;
use Midtrans\CoreApi;
use Midtrans\Transaction;

class TransactionController extends Controller {
    public function __construct() {
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$clientKey = env('MIDTRANS_CLIENT_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
    }

    public function detail(string $id) {
        $package = Paket::select('paket.id as id', 'paket.no_paket as no_paket', 'layanan.nama as layanan', 'paket.nama as paket', 'paket.harga as harga')
            ->join('layanan', 'layanan.id', '=', 'paket.id_layanan')
            ->where('paket.id', $id)->first();

        if (!$package) {
            return redirect(url()->previous());
        }

        $contents = IsiPaket::where('id_paket', $id)->get();

        return view('pages.frontend.transaction.detail', [
            'package' => $package,
            'contents' => $contents
        ]);
    }

    public function store(Request $request) {
        $request->validate([
            'package-id' => 'required|integer',
            'payment-method' => 'required|integer'
        ]);

        $package = Paket::find($request->input('package-id'));
        $payment_method = MetodePembayaran::find($request->input('payment-method'));

        if (!$package || !$payment_method) {
            return redirect(route('home'));
        }

        $userId = auth()->user()->id;

        $uuid = uuid_create(); // Generate a UUID
        $numericUUID = preg_replace('/[^0-9]/', '', $uuid); // Remove non-numeric characters

        $transaction_details = [
            'order_id' => substr($numericUUID, 0, 7),
            'gross_amount' => $package->harga
        ];

        $items = [
            [
                'id' => $package->id,
                'price' => $package->harga,
                'quantity' => 1,
                'name' => $package->nama ? $package->nama : 'Paket ' . $package->no_paket
            ]
        ];

        $customer_details = [
            'first_name' => auth()->user()->nama_lengkap,
            'phone' => auth()->user()->no_telepon,
            'email' => auth()->user()->email
        ];

        $transaction_data = [
            'transaction_details' => $transaction_details,
            'item_details'        => $items,
            'customer_details'    => $customer_details,
            'custom_expiry'  => [
                "expiry_duration" => 24,
                "unit" => "hour"
            ]
        ];


        if ($payment_method->tipe == "bank_transfer") {
            $transaction_data['payment_type'] = 'bank_transfer';
            $transaction_data['bank_transfer'] = [
                'bank' => $payment_method->metode
            ];
        } else if ($payment_method->tipe == "echannel") {
            $transaction_data['payment_type'] = 'echannel';
            $transaction_data['echannel'] = [
                'bill_info1' => 'Payment:',
                'bill_info2' => 'Online purchase'
            ];
        } else {
            $transaction_data['payment_type'] = $payment_method->metode;
            if ($payment_method->metode == "qris") {
                $transaction_data['qris'] = [
                    'type' => 'dynamic'
                ];
            }

            // if ($payment_method->metode == "linkaja") {
            //     $transaction_data['linkaja'] = "";
            // }
        }

        // try {
        $transaction = CoreApi::charge($transaction_data);

        // var_dump($transaction);

        $transaction_number = 0;
        if ($payment_method->tipe == "bank_transfer") {
            $transaction_number = $transaction->va_numbers[0]->va_number;
        } else if ($payment_method->tipe == "echannel") {
            $transaction_number = $transaction->bill_key;
        } else if ($payment_method->tipe == "qris") {
            $transaction_number = $transaction->qr_string;
        } else if ($payment_method->tipe == "permata") {
            $transaction_number = $transaction->permata_va_number;
        } else {
            $transaction_number = $transaction->actions[1]->url; // deeplink-redirect
        }

        $datetime = new DateTime(date("Y-m-d H:i:s", strtotime('+24 hours')));
        $datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
        $deadline = $datetime->format("Y-m-d H:i:s");

        $new_transaction = [
            'id_transaksi' => substr($numericUUID, 0, 7),
            'id_pelanggan' => $userId,
            'id_paket' => $package->id,
            'id_metode_pembayaran' => $payment_method->id,
            'no_transaksi' => $transaction_number,
            'tanggal_kadaluarsa' => $deadline
        ];

        if ($payment_method->tipe == "echannel") {
            $new_transaction['kode_biller'] = $transaction->biller_code;
        }

        if ($payment_method->tipe == "gopay") {
            $new_transaction['akses_pembatalan'] = $transaction->actions[3]->url;
        }

        Transaksi::create($new_transaction);

        return redirect(route('payment.invoice', ['transaction' => substr($numericUUID, 0, 7)]));
        // } catch (Exception $e) {
        //     return back()->with('error', 'error generate virtual account');
        // }
    }

    public function invoice(string $id) {
        $transaction = Transaksi::select('transaksi.status as status', 'metode_pembayaran.foto as foto_metode', 'metode_pembayaran.kode_bank as kode_bank', 'transaksi.no_transaksi as no_transaksi', 'transaksi.kode_biller as kode_biller', 'paket.harga as harga', 'metode_pembayaran.tipe as tipe', 'metode_pembayaran.metode as nama_metode', 'transaksi.id_transaksi as id_transaksi', 'transaksi.tanggal_kadaluarsa as tanggal_kadaluarsa')
            ->join('metode_pembayaran', 'transaksi.id_metode_pembayaran', '=', 'metode_pembayaran.id')
            ->join('paket', 'transaksi.id_paket', '=', 'paket.id')
            ->where('id_transaksi', $id)->first();

        if (!$transaction) {
            return back()->with('error', 'transaksi tidak ditemukan');
        }

        if ($transaction->status == "MENUNGGU") {
            $qr_code = "";

            if ($transaction->nama_metode == "qris") {
                $qr_code = QrCode::size(150)->generate($transaction->no_transaksi);
            }

            return view('pages.frontend.transaction.invoice', [
                'transaction' => $transaction,
                'qr_code' => $qr_code
            ]);
        }

        return redirect(route('payment.success', ['transaction' => $id]))->with('success-payment', 'success payment');
    }

    public function notification(Request $request) {
        try {
            $payload = json_decode($request->getContent(), true);
            $order_id = $payload['order_id'];
            $transaction_status = $payload['transaction_status'];
            $fraud = $payload['fraud_status'];

            Log::info($payload);


            $transaction = Transaksi::select('paket.harga as harga', 'metode_pembayaran.nama as nama_metode', 'pelanggan.nama_lengkap as nama_pelanggan', 'layanan.nama as layanan', 'pelanggan.email as email_pelanggan')
                ->join('metode_pembayaran', 'transaksi.id_metode_pembayaran', '=', 'metode_pembayaran.id')
                ->join('paket', 'transaksi.id_paket', '=', 'paket.id')
                ->join('layanan', 'paket.id_layanan', '=', 'layanan.id')
                ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id')
                ->where('id_transaksi', $order_id)->first();

            if ($transaction_status == 'capture') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'challenge'
                    Transaksi::where('id_transaksi', $order_id)->update([
                        'status' => 'MENUNGGU'
                    ]);
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'success'
                    $datetime = new DateTime(date("Y-m-d H:i:s"));
                    $datetime->setTimezone(new DateTimeZone('Asia/Jakarta'));
                    $datenow = $datetime->format("Y-m-d H:i:s");

                    Transaksi::where('id_transaksi', $order_id)->update([
                        'status' => 'BERHASIL',
                        'dibayar_pada' => $datenow
                    ]);

                    Mail::to($transaction['email_pelanggan'])->send(new SendInvoice($order_id, $transaction['nama_pelanggan'], $transaction['layanan'], $transaction['nama_metode'], $transaction['harga'], 'success'));
                }
            } else if ($transaction_status == 'settlement') {
                // TODO set payment status in merchant's database to 'Settlement'
                $settlement_time = $payload['settlement_time'];
                Transaksi::where('id_transaksi', $order_id)->update([
                    'status' => 'BERHASIL',
                    'dibayar_pada' => $settlement_time
                ]);

                Mail::to($transaction['email_pelanggan'])->send(new SendInvoice($order_id, $transaction['nama_pelanggan'], $transaction['layanan'], $transaction['nama_metode'], $transaction['harga'], 'success'));
            } else if ($transaction_status == 'pending') {
                Transaksi::where('id_transaksi', $order_id)->update([
                    'status' => 'MENUNGGU'
                ]);
            } else if ($transaction_status == 'expire') {
                Transaksi::where('id_transaksi', $order_id)->update([
                    'status' => 'KADALUARSA'
                ]);

                Mail::to($transaction['email_pelanggan'])->send(new SendInvoice($order_id, $transaction['nama_pelanggan'], $transaction['layanan'], $transaction['nama_metode'], $transaction['harga'], 'failed'));
            } else if ($transaction_status == 'cancel') {
                if ($fraud == 'challenge') {
                    // TODO Set payment status in merchant's database to 'failure'
                    Transaksi::where('id_transaksi', $order_id)->update([
                        'status' => 'GAGAL'
                    ]);

                    Mail::to($transaction['email_pelanggan'])->send(new SendInvoice($order_id, $transaction['nama_pelanggan'], $transaction['layanan'], $transaction['nama_metode'], $transaction['harga'], 'failed'));
                } else if ($fraud == 'accept') {
                    // TODO Set payment status in merchant's database to 'failure'
                    Transaksi::where('id_transaksi', $order_id)->update([
                        'status' => 'GAGAL'
                    ]);

                    Mail::to($transaction['email_pelanggan'])->send(new SendInvoice($order_id, $transaction['nama_pelanggan'], $transaction['layanan'], $transaction['nama_metode'], $transaction['harga'], 'failed'));
                }
            } else if ($transaction_status == 'deny') {
                // TODO Set payment status in merchant's database to 'failure'
                Transaksi::where('id_transaksi', $order_id)->update([
                    'status' => 'GAGAL'
                ]);
            }
            return response('Ok', 200)->header('Content-Type', 'text/plain');
        } catch (Exception $e) {
            return response('Error', 500)->header('Content-Type', 'text/plain');
        }
    }

    public function cancel_transaction(string $id) {
        $transaction = Transaksi::where('id_transaksi', $id)->first();

        if (!$transaction) {
            return back()->with('error', 'transaksi tidak ditemukan');
        }

        try {
            Transaction::cancel($id);

            return redirect(route('payment.success', ['transaction' => $id]))->with('success-payment', 'success payment');
        } catch (Exception $e) {
            return back()->with('error', 'transaksi mengalami error ketika membatalkan');
        }
    }

    public function payment_success(Request $request, string $id) {
        if (!$request->session()->get('success-payment')) {
            return redirect(route('home'));
        }

        $transaction = Transaksi::select('transaksi.id_transaksi as id_transaksi', 'paket.harga as harga', 'layanan.nama as layanan', 'metode_pembayaran.nama as nama_metode', 'transaksi.status as status')
            ->join('metode_pembayaran', 'transaksi.id_metode_pembayaran', '=', 'metode_pembayaran.id')
            ->join('paket', 'transaksi.id_paket', '=', 'paket.id')
            ->join('layanan', 'paket.id_layanan', '=', 'layanan.id')
            ->where('id_transaksi', $id)->first();

        if (!$transaction) {
            return redirect(route('home'));
        }

        return view('pages.frontend.transaction.success', [
            'transaction' => $transaction,
        ]);
    }
}
