<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller {
    public function index() {
        return view('pages.frontend.user.profile');
    }

    public function update(Request $request) {
        $request->validate([
            'fullname' => 'required|string',
            'email' => 'required|string|email',
            'phone-number' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp'
        ]);

        $user = [
            'nama_lengkap' => $request->input('fullname'),
            'email' => $request->input('email'),
            'no_telepon' => $request->input('phone-number'),
        ];

        $userId = auth()->user()->id;

        $oldFilename = "";

        if (isset(auth()->user()->photo)) {
            $pathInfo = pathinfo(auth()->user()->photo);
            $oldFilename = $pathInfo['filename'];
        }

        if ($request->hasFile('photo')) {
            $imagePath = $request->file('photo')->getRealPath();
            $filename = $oldFilename == "" ? time() : $oldFilename;
            $cloudinaryUpload = Cloudinary::upload($imagePath, ['public_id' => 'mas_dzikry/profile/' . $filename]);

            $user['foto'] = $cloudinaryUpload->getSecurePath();
        }

        $update = Pelanggan::where('id', $userId)->update($user);

        if (!$update) {
            return back()->with('error', 'profil gagal disimpan. coba ulangi lagi atau tunggu beberapa saat');
        }

        return back()->with('success', 'profil berhasil disimpan');
    }

    public function change_password(Request $request) {
        $request->validate([
            'old-password' => 'nullable|string',
            'new-password' => 'nullable|string'
        ]);

        $newPassword = $request->input('new-password');
        $oldPassword = $request->input('old-password');

        $sendView = [];

        if (!$newPassword) {
            $sendView['error_new'] = "Password baru harus diisi";
        }

        if (!$oldPassword) {
            $sendView['error_old'] = "Password lama harus diisi";
        }

        if (count($sendView) > 0) {
            $sendView['new_password'] = $newPassword;
            $sendView['old_password'] = $oldPassword;

            return view('pages.frontend.user.profile', $sendView);
        }

        if (Hash::check($oldPassword, auth()->user()->password)) {
            $userId = auth()->user()->id;
            $newPassword = $request->input('new-password');
            $change = Pelanggan::where('id', $userId)->update([
                'password' => Hash::make($newPassword)
            ]);

            if (!$change) {
                return back()->with('error', 'terjadi kesalahan. silahkan ulangi atau tunggu beberapa saat');
            }

            Auth::logout();
            return redirect(route('profile.change-pass-success'))->with('success-change', 'change success');
        }

        return redirect(route('profile'))->with('error', 'password lama tidak sesuai atau salah');
    }

    public function change_password_success(Request $request) {
        if (!$request->session()->get('success-change')) {
            return redirect(route('home'));
        }

        return view('pages.frontend.user.change-pass-success');
    }
}
