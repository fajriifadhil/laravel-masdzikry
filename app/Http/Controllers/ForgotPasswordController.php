<?php

namespace App\Http\Controllers;

use App\Mail\SendOTP;
use App\Models\Pelanggan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class ForgotPasswordController extends Controller {
    public function view_page() {
        return view('pages.auth.forgot-pass.send-otp');
    }

    public function send_otp(Request $request) {
        $request->validate([
            'email' => 'nullable|email'
        ]);

        $email = $request->input('email');

        if (!$email) {
            return view('pages.auth.forgot-pass.send-otp', [
                'error_email' => 'Email harus diisi',
                'email' => $email
            ]);
        }
        $user = Pelanggan::where('email', $email)->first();

        if (!$user) {
            return view('pages.auth.forgot-pass.send-otp', [
                'error_email' => 'Email tidak terdaftar, silahkan cek kembali dan masukan email yang benar',
                'email' => $email
            ]);
        }

        $otp = rand(100000, 999999);
        $verifyPage = Str::uuid()->getHex();

        $update = Pelanggan::where('id', $user->id)->update([
            'otp' => $otp,
            'verify_page' => $verifyPage
        ]);

        Mail::to($user['email'])->send(new SendOTP($otp, $user['nama_lengkap'], 'forgot-password'));

        return redirect(route('forgot-password.view_otp_page', ['id' => $update ? $verifyPage : $user->verify_page]));
    }

    public function view_otp_page(string $id) {
        $user = Pelanggan::where('verify_page', $id)->first();

        if (!$user) {
            return redirect(route('home'));
        }

        return view('pages.auth.forgot-pass.check-otp', [
            'email' => $user->email
        ]);
    }

    public function check_otp(Request $request) {
        $request->validate([
            'email' => 'required|email',
            'otp' => 'required|string'
        ]);

        $email = $request->input('email');

        $user = Pelanggan::where('email', $email)->first();

        if (!$user) {
            return redirect(url()->previous());
        }

        $otp = $request->input('otp');

        if ($otp != $user->otp) {
            return back()->with('error-otp', 'Kode OTP tidak sesuai atau valid');
        }

        return redirect(route('forgot-password.change-page', ['id' => $user->verify_page]))->with('success-otp', 'success verify otp');
    }

    public function change_password_page(Request $request, string $id) {
        if ($request->session()->get('success-otp') || $request->session()->get('error-password')) {
            return view('pages.auth.forgot-pass.change-password', [
                'verify_page' => $id,
                'error_password' => $request->session()->get('error-password')
            ]);
        }

        return redirect(route('home'));
    }

    public function change_password(Request $request) {
        $request->validate([
            'verify-page' => 'string|required',
            'password' => 'string|required',
            'confirmation' => 'string|required'
        ]);

        $password = $request->input('password');
        $confirmation = $request->input('confirmation');

        if ($password != $confirmation) {
            return back()->with('error-password', 'Password tidak cocok. Silahkan Coba lagi');
        }

        $verifyPage = $request->input('verify-page');

        $update = Pelanggan::where('verify_page', $verifyPage)->update([
            'password' => Hash::make($password)
        ]);

        if (!$update) {
            return back()->with('error',);
        }

        Auth::logout();
        return redirect(route('forgot-password.success'))->with('success-forgot-change', 'success change forgot password');
    }

    public function success(Request $request) {
        if (!$request->session()->get('success-forgot-change')) {
            return redirect(route('home'));
        }

        return view('pages.auth.forgot-pass.success');
    }
}
