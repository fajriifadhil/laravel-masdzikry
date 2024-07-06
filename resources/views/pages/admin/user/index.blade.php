@extends('layouts.admin')

@section('content')
<h1 class="h-section mb-14">Pelanggan</h1>

<div class="bg-white rounded-lg border">
    <div class="p-6">
        <h2 class="font-semibold text-2xl">List Pelanggan</h2>
    </div>
    <hr />
    <form action="{{ route('users.index') }}" method="GET" class="join p-6">
        <button type="submit" class="btn join-item">Cari</button>
        <input type="text" class="input input-bordered join-item" name="s" placeholder="Masukan kata pencarian" value="{{ $search }}" />
    </form>
    <div class="overflow-x-auto border-b">
        <table class="table">
            <thead class="bg-slate-200">
                <tr>
                    <th>No</th>
                    <th>Email</th>
                    <th>Nama Lengkap</th>
                    <th>No. Handphone</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($users) == 0 && $search)
                <tr>
                    <td colspan="7" class="text-center py-5">Data pelanggan dengan keyword <span class="font-semibold text-error">{{ $search }}</span> tidak ditemukan</td>
                </tr>
                @elseif(count($users) == 0 && !$search)
                <tr>
                    <td colspan="7" class="text-center py-5">Tidak ada data pelanggan yang dapat ditampilkan</td>
                </tr>
                @endif
                @foreach ($users as $index => $user)
                <tr>
                    <th>{{ $index + 1 + (($page - 1) * $dpp) }}</th>
                    <td>{{ $user['email'] }}</td>
                    <td>{{ $user['nama_lengkap'] }}</td>
                    <td>{{ $user['no_telepon'] }}</td>
                    <td class="flex gap-2">
                        <a href="{{ route('users.show', ['user' => $user['id']]) }}" class="btn btn-square btn-success text-white">
                            <i class="ri-info-i"></i>
                        </a>
                    </td>
                </tr>
                @endforeach

            </tbody>
        </table>
    </div>

    <div class="p-6 flex gap-5 justify-between items-center">
        <p>Menampilkan halaman ke {{ $page }} dari {{ $total_pages }} halaman</p>

        <div class="flex items-center gap-5">
            <form action="{{ route('users.index') }}" method="GET" class="join">
                <button type="submit" class="btn join-item">Tampilkan</button>
                <select name="dpp" class="select select-bordered join-item">
                    <option value="5" @if($dpp==5) selected @endif>5</option>
                    <option value="15" @if($dpp==15) selected @endif>15</option>
                    <option value="25" @if($dpp==25) selected @endif>25</option>
                    <option value="50" @if($dpp==50) selected @endif>50</option>
                </select>
            </form>
            <div class="join">
                @if ($page != 1)
                <a href="{{ route('users.index') . '?p=' . (int) $page - 1 }}" class="join-item btn">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <a href="{{ route('users.index') . '?p=' . (int) $page - 1 }}" class="join-item btn">
                    {{ (int) $page - 1 }}
                </a>
                @endif
                <button type="button" class="join-item btn btn-active">{{ $page }}</button>
                @if ($page != $total_pages)
                <a href="{{ route('users.index') . '?p=' . (int) $page + 1 }}" class="join-item btn">
                    {{ (int) $page + 1 }}
                </a>
                <a href="{{ route('users.index') . '?p=' . (int) $page + 1 }}" class="join-item btn">
                    <i class="ri-arrow-right-s-line"></i>
                </a>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection