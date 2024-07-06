@extends('layouts.admin')

@section('content')
<h1 class="h-section mb-14">Penjualan</h1>

<div class="bg-white rounded-lg border">
    <div class="p-6">
        <h2 class="font-semibold text-2xl">List Penjualan</h2>
    </div>
    <hr />
    <form action="{{ route('sales.index') }}" method="GET" class="join p-6">
        <button type="submit" class="btn join-item">Cari</button>
        <input type="text" class="input input-bordered join-item" name="s" placeholder="Masukan kata pencarian" value="{{ $search }}" />
    </form>
    <div class="overflow-x-auto border-b">
        <table class="table">
            <thead class="bg-slate-200">
                <tr>
                    <th>No</th>
                    <th>Layanan</th>
                    <th>Nama Lengkap</th>
                    <th>Jumlah</th>
                    <th>Tipe Pembayaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @if (count($sales) == 0 && $search)
                <tr>
                    <td colspan="7" class="text-center py-5">Data penjualan dengan keyword <span class="font-semibold text-error">{{ $search }}</span> tidak ditemukan</td>
                </tr>
                @elseif(count($sales) == 0 && !$search)
                <tr>
                    <td colspan="7" class="text-center py-5">Tidak ada data penjualan yang dapat ditampilkan</td>
                </tr>
                @endif
                @foreach ($sales as $index => $sale)
                <tr>
                    <th>{{ $index + 1 + (($page - 1) * $dpp) }}</th>
                    <td>{{ $sale->layanan }}</td>
                    <td>{{ $sale->nama_pelanggan }}</td>
                    <td>Rp {{ number_format($sale->harga, 2, ',', '.') }}</td>
                    <td>{{ $sale->nama_metode }}</td>
                    <td>
                        @if ($sale->status == 'BERHASIL')
                        <span class="badge bg-green-200 text-success font-medium badge-lg">Dibayar</span>
                        @elseif ($sale->status == 'GAGAL')
                        <span class="badge bg-red-200 text-error font-medium badge-lg">Gagal / Dibatalkan</span>
                        @elseif ($sale->status == 'KADALUARSA')
                        <span class="badge bg-red-200 text-error font-medium badge-lg">Kadaluarsa</span>
                        @else
                        <span class="badge bg-orange-200 text-orange-500 font-medium badge-lg">Menunggu Pembayaran</span>
                        @endif
                    </td>
                    <td class="flex gap-2">
                        <a href="{{ route('sales.show', ['sale' => $sale->id_transaksi]) }}" class="btn btn-square btn-success text-white">
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
            <form action="{{ route('sales.index') }}" method="GET" class="join">
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
                <a href="{{ route('sales.index') . '?p=' . (int) $page - 1 }}" class="join-item btn">
                    <i class="ri-arrow-left-s-line"></i>
                </a>
                <a href="{{ route('sales.index') . '?p=' . (int) $page - 1 }}" class="join-item btn">
                    {{ (int) $page - 1 }}
                </a>
                @endif
                <button type="button" class="join-item btn btn-active">{{ $page }}</button>
                @if ($page != $total_pages)
                <a href="{{ route('sales.index') . '?p=' . (int) $page + 1 }}" class="join-item btn">
                    {{ (int) $page + 1 }}
                </a>
                <a href="{{ route('sales.index') . '?p=' . (int) $page + 1 }}" class="join-item btn">
                    <i class="ri-arrow-right-s-line"></i>
                </a>
                @endif
            </div>
        </div>

    </div>
</div>
@endsection