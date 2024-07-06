<?php

namespace App\Http\Controllers;

use App\Mail\SendOTP;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class AuthController extends Controller {
    public function login_page() {
        if (Auth::check()) {
            return redirect(url()->previous());
        } else {
            return view('pages.auth.login');
        }
    }

    public function registration_page() {
        if (Auth::check()) {
            return redirect(url()->previous());
        } else {
            return view('pages.auth.registration');
        }
    }

    public function register(Request $request) {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string',
            'phone-number' => 'required|string',
            'password' => 'required|string|min:6'
        ]);

        $user = [
            'nama_lengkap' => $request->input('fullname'),
            'email' => $request->input('email'),
            'no_telepon' => $request->input('phone-number'),
            'password' => Hash::make($request->input('password'))
        ];

        $email_exist = Pelanggan::where('email', $user['email'])->first();
        $phone_exist = Pelanggan::where('no_telepon', $user['no_telepon'])->first();

        if ($email_exist || $phone_exist) {
            return back()->with('error-account', 'Akun sudah pernah ditaftarkan. Gunakan email / no telepon lainnya');
        }

        $otp = rand(100000, 999999);
        $user['otp'] = $otp;

        $verifyPage = Str::uuid()->getHex();
        $user['verify_page'] = $verifyPage;

        $insert = Pelanggan::create($user);

        if (!$insert) {
            return back()->with('error', 'gagal registrasi. silahkan submit ulang form');
        }

        Mail::to($user['email'])->send(new SendOTP($otp, $user['nama_lengkap'], 'registration'));

        return redirect(route('verify-email-page', ['id' => $user['verify_page']]));
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
            return view('pages.auth.login', $sendView);
        }

        $user = Pelanggan::where('email', $data['email'])->first();

        // IS VERIFIED
        if (!$user) {
            return view('pages.auth.login', [
                'email' => $data['email'],
                'password' => $data['password'],
                'error_email' => 'Email salah. Coba dan periksa email anda',
                'error_password' => "Password salah. Coba lagi atau klik 'Lupa password'"
            ]);
        }

        // CHECK PASSWORD
        if (!Hash::check($data['password'], $user->password)) {
            return view('pages.auth.login', [
                'email' => $data['email'],
                'password' => $data['password'],
                'error_password' => "Password salah. Coba lagi atau klik 'Lupa password'"
            ]);
        }

        Auth::attempt($data);
        return redirect(route('home'));
    }

    public function logout() {
        Auth::logout();
        return redirect(route('home'))->with('success', 'sukses logout');
    }
}
