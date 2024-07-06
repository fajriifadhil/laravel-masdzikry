<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;

class SalesController extends Controller {
    public function index(Request $request) {
        // SELECT DATA
        $sales = Transaksi::select('layanan.nama as layanan', 'pelanggan.nama_lengkap as nama_pelanggan', 'paket.harga as harga', 'metode_pembayaran.nama as nama_metode', 'transaksi.status as status', 'transaksi.id_transaksi as id_transaksi')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id')
            ->join('paket', 'transaksi.id_paket', '=', 'paket.id')
            ->join('layanan', 'paket.id_layanan', '=', 'layanan.id')
            ->join('metode_pembayaran', 'transaksi.id_metode_pembayaran', '=', 'metode_pembayaran.id')
            ->orderBy('transaksi.created_at', 'DESC');

        // SEARCH KEYWORD
        $search = $request->query('s');
        if ($search) {
            $sales = $sales->where('pelanggan.nama_lengkap', 'LIKE', '%' . $search . '%')
                ->orWhere('layanan.nama', 'LIKE', '%' . $search . '%')
                ->orWhere('metode_pembayaran.nama', 'LIKE', '%' . $search . '%');
        }

        $total_records = Transaksi::count();
        $page = $request->query('p', 1);

        $dpp = $request->query('dpp');
        if ($dpp) {
            session()->put('dpp', $dpp);
        }

        if (!session()->get('dpp')) {
            session()->put('dpp', 5);
        }

        $total_pages = ceil($total_records / (int) session()->get('dpp'));

        if ($page > $total_pages) {
            $page = $total_pages;
        }

        // GET SALES / TRANSACTION
        $sales = $sales->offset(($page - 1) * session()->get('dpp'))->limit(session()->get('dpp'))->get();

        return view('pages.admin.sales.index', [
            'page_name' => 'sales',
            'sales' => $sales,
            'search' => $search,
            'dpp' => session()->get('dpp') ? session()->get('dpp') : 5,
            'total_pages' => $total_pages,
            'page' => $page
        ]);
    }

    public function show(string $id) {
        $transaction = Transaksi::select('layanan.nama as layanan', 'pelanggan.nama_lengkap as nama_pelanggan', 'pelanggan.email as email_pelanggan', 'pelanggan.no_telepon as nomor_pelanggan', 'paket.harga as harga', 'metode_pembayaran.nama as nama_metode', 'transaksi.status as status', 'paket.no_paket as no_paket', 'transaksi.dibayar_pada as dibayar_pada')
            ->join('pelanggan', 'transaksi.id_pelanggan', '=', 'pelanggan.id')
            ->join('paket', 'transaksi.id_paket', '=', 'paket.id')
            ->join('layanan', 'paket.id_layanan', '=', 'layanan.id')
            ->join('metode_pembayaran', 'transaksi.id_metode_pembayaran', '=', 'metode_pembayaran.id')
            ->where('id_transaksi', $id)
            ->first();

        if (!$transaction) {
            return redirect(url()->previous());
        }

        return view('pages.admin.sales.show', [
            'page_name' => 'sales',
            'transaction' => $transaction
        ]);
    }
}
