<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller {
    public function view_page(string $id) {
        $user = Pelanggan::where('verify_page', $id)->first();

        if (!$user) {
            return redirect(url()->previous());
        }

        if ($user->is_verified == 1) {
            return redirect(route('home'));
        }

        return view('pages.auth.verify-email.otp', [
            'email' => $user->email
        ]);
    }

    public function verify_email(Request $request) {
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

        $update = Pelanggan::where('id', $user->id)->update([
            'is_verified' => 1
        ]);

        if (!$update) {
            return back()->with('error', 'user gagal verifikasi. silahkan ulangi atau tunggu beberapa waktu');
        }

        return redirect(route('success-verification'))->with('success-verification', 'berhasil verifikasi');
    }

    public function success(Request $request) {
        if (!$request->session()->get('success-verification')) {
            return redirect(route('home'));
        }

        return view('pages.auth.verify-email.success');
    }
}
