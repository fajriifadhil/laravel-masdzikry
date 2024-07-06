<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller {
    public function index() {
        $total_sales = Transaksi::join('paket', 'paket.id', '=', 'transaksi.id_paket')
            ->where('transaksi.status', 'BERHASIL')->sum('paket.harga');
        $total_users = Pelanggan::count();

        $pending_ts = Transaksi::where('status', 'MENUNGGU')->count();
        $success_ts = Transaksi::where('status', 'BERHASIL')->count();

        $year = now()->year; // Get the current year

        // Use Eloquent with whereYear and groupBy
        $transactionsByMonth = Transaksi::whereYear('created_at', $year)
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('count(*) as total_transactions'))
            ->groupBy('month')
            ->get();

        // Create an empty array to store the monthly totals
        $monthlyTotals = [];

        // Loop through results and populate the array
        foreach ($transactionsByMonth as $transaction) {
            $monthlyTotals[$transaction->month] = $transaction->total_transactions;
        }

        return view('pages.admin.dashboard', [
            'page_name' => 'dashboard',
            'total_sales' => $total_sales,
            'total_users' => $total_users,
            'total_pending_ts' => $pending_ts,
            'total_success_ts' => $success_ts,
            'monthly_ts' => $monthlyTotals
        ]);
    }

    public function login_page() {
        return view('pages.admin.login');
    }

    public function login(Request $request) {
        $request->validate([
            'email' => 'nullable|string|email',
            'password' => 'nullable|string'
        ]);

        $data = [
            'email' => $request->input('email'),
            'password' => $request->input('password')
        ];

        $sendView = [];

        if (!$data['email']) {
            $sendView['error_email'] = "Email harus diisi";
        }

        if (!$data['password']) {
            $sendView['error_password'] = "Password harus diisi";
        }

        if (count($sendView) > 0) {
            $sendView['email'] = $data['email'];
            $sendView['password'] = $data['password'];
            return view('pages.admin.login', $sendView);
        }

        // MANUAL ADMIN REGISTRATION
        // Admin::create([
        //     'username' => 'nibras',
        //     'nama_lengkap' => 'Nibras Alyassar',
        //     'email' => 'nibrasbiasaaja@gmail.com',
        //     'password' => Hash::make('nibras123')
        // ]);

        $admin = Admin::where('email', $data['email'])->first();

        if (!$admin) {
            return view('pages.admin.login', [
                'email' => $data['email'],
                'password' => $data['password'],
                'error_email' => 'Email salah. Coba dan periksa email anda',
                'error_password' => 'Password salah. Coba dan periksa password anda',
            ]);
        }

        if (!Hash::check($data['password'], $admin->password)) {
            return view('pages.admin.login', [
                'email' => $data['email'],
                'password' => $data['password'],
                'error_password' => 'Password salah. Coba dan periksa password anda'
            ]);
        }

        $sessionId = uniqid('admin_', true);

        session()->put('admin_id', $admin['id']);
        session()->put('user_admin', $admin['username']);
        session()->put('user_name', $admin['nama_lengkap']);
        session()->put('session_admin_id', $sessionId);

        return redirect(route('dashboard'));
    }

    public function logout() {
        session()->forget('admin_id');
        session()->forget('user_admin');
        session()->forget('user_name');
        session()->forget('session_admin_id');

        return redirect(route('home'));
    }
}
