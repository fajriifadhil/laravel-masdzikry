<div style="text-align: center;">
    <img src="{{ $message->embed(storage_path('app/full-logo.png')) }}" alt="LOGO MAS DZIKRY" style="margin-inline: auto; max-width: 100%; height: 38px; object-fit: cover;" />

    <h1 style="margin-bottom: 0; margin-top: 10px; font-weight: 700; font-size: 2rem; color: {{ $type == 'success' ? '#54f531' : 'red' }}">Pembayaran {{ $type == 'success' ? 'Berhasil' : 'Gagal' }}</h1>

    <br style="margin-block: 5px" />
    <p style="font-size: 1.15rem; margin: 0">Halo {{ $name }}. Berikut adalah invoice pembayaran kamu</p>
    <br>
    <p style="font-weight: 600; font-size: 1.3rem;">Invoice Pembayaran</p>
    <table style="margin: 0 auto; min-width: 350px;">
        <tbody>
            <tr>
                <td style="font-size: 1.5rem; padding: 10px; text-align: left;">No Transaksi</td>
                <td style="font-size: 1.5rem; padding: 10px; text-align: right; font-weight: bold;">{{ $orderId }}</td>
            </tr>
            <tr>
                <td style="font-size: 1.5rem; padding: 10px; text-align: left;">Nama Pembeli</td>
                <td style="font-size: 1.5rem; padding: 10px; text-align: right; font-weight: bold;">{{ $name }}</td>
            </tr>
            <tr>
                <td style="font-size: 1.5rem; padding: 10px; text-align: left;">Layanan</td>
                <td style="font-size: 1.5rem; padding: 10px; text-align: right; font-weight: bold;">{{ $service }}</td>
            </tr>
            <tr>
                <td style="font-size: 1.5rem; padding: 10px; text-align: left;">Metode Pembayaran</td>
                <td style="font-size: 1.5rem; padding: 10px; text-align: right; font-weight: bold;">{{ $method }}</td>
            </tr>
            <tr>
                <td colspan="3">
                    <hr style="width: 100%" />
                </td>
            </tr>
            <tr>
                <td style="font-size: 1.5rem; padding: 10px; text-align: left;">Total Tagihan</td>
                <td style="font-size: 1.5rem; padding: 10px; text-align: right; font-weight: bold;">Rp.{{ number_format($total, 0, '', '.') }}</td>
            </tr>
        </tbody>
    </table>

</div>
