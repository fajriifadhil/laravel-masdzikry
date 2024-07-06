<?php

namespace App\Http\Controllers;

use App\Models\Pelanggan;
use Illuminate\Http\Request;

class UserController extends Controller {

    public function index(Request $request) {
        $users = Pelanggan::latest();

        $search = $request->query('s');
        if ($search) {
            $users = $users->where('nama_lengkap', 'LIKE', '%' . $search . '%')
                ->orWhere('email', 'LIKE', '%' . $search . '%')
                ->orWhere('no_telepon', 'LIKE', '%' . $search . '%');
        }

        $total_records = Pelanggan::count();
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

        $users = $users->offset(($page - 1) * session()->get('dpp'))->limit(session()->get('dpp'))->get();

        return view('pages.admin.user.index', [
            'page_name' => 'users',
            'users' => $users,
            'search' => $search,
            'dpp' => session()->get('dpp') ? session()->get('dpp') : 5,
            'total_pages' => $total_pages,
            'page' => $page
        ]);
    }

    public function show(string $id) {
        $user = Pelanggan::find($id);

        if (!$user) {
            return back()->with('error', 'user not found');
        }

        return view('pages.admin.user.show', [
            'page_name' => 'users',
            'user' => $user
        ]);
    }
}
