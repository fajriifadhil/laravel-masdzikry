<?php

namespace App\Http\Controllers;

use App\Mail\SendInvoice;
use App\Mail\SendOTP;
use App\Models\Pelanggan;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class FrontEndController extends Controller {
    public function home() {

        if (Auth::check()) {
            // VERIFY FIRST
            if (auth()->user()->is_verified == 0) {
                $otp = rand(100000, 999999);
                $verifyPage = Str::uuid()->getHex();

                Pelanggan::where('id', auth()->user()->id)->update([
                    'otp' => $otp,
                    'verify_page' => $verifyPage
                ]);

                Mail::to(auth()->user()['email'])->send(new SendOTP($otp, auth()->user()->nama_lengkap, 'registration'));

                Auth::logout();
                return redirect(route('verify-email-page', ['id' => $verifyPage]))->with('error', 'anda perlu verifikasi akun terlebih dahulu');
            }
        }


        return view('pages.frontend.home');
    }

    public function press_release() {
        return view('pages.frontend.services.press-release');
    }

    public function verify_instagram() {
        return view('pages.frontend.services.verify-instagram');
    }

    public function content_placement() {
        return view('pages.frontend.services.content-placement');
    }

    public function backlink_media() {
        return view('pages.frontend.services.backlink-media');
    }

    public function web_optimization() {
        return view('pages.frontend.services.web-optimization');
    }

    public function elementor_pro() {
        return view('pages.frontend.services.elementor-pro');
    }
}
