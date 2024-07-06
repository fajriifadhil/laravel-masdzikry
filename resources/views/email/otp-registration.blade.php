<div style="text-align: center;">
    <img src="{{ $message->embed(storage_path('app/enter-otp.png')) }}" alt="ENTER OTP" style="margin-inline: auto; max-width: 100%; height: 250px; object-fit: cover;" />
    <h1 style="font-weight: 700; font-size: 1.5rem; margin: 0">Selamat Datang di</h1>
    <h1 style="font-weight: 700; font-size: 1.5rem; margin: 0">Mas Dzikry</h1>
    <br style="margin-block: 5px" />
    <p style="font-size: 1.15rem; margin: 0">Halo {{ $name }}, Terima kasih sudah mendaftarkan Akun anda di Mas Dzikry. Berikut adalah kode verifikasi kamu</p>
    <br>
    <p style="font-weight: 600; font-size: 1.3rem; margin: 0;">Kode Verifikasi</p>
    <div style="display: flex; justify-content: center; width: fit-content; margin: 3px auto">
        @for ($i = 0; $i < strlen($otp); $i++) <p style="font-size: 1.35rem; font-weight: 750; background-color: #e8e8e8; padding: 10px 14px; border-radius: 0.5rem; margin: 3px;">{{ $otp[$i] }}</p>
            @endfor
    </div>
    <p style="font-size: 1.15rem; margin: 0">Kode tersebut bersifat rahasia! Jangan berikan kode OTP kepada siapapun termasuk pihak Mas Dzikry</p>
</div>
