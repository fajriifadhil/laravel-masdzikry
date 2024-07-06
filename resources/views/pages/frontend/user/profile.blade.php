@extends('layouts.single')

@section('content')

<div class="flex gap-10 flex-wrap lg:flex-nowrap w-[90vw] sm:w-[85vw] md:w-[50vw] py-10 lg:py-0">
    <form action="{{ route('profile.update') }}" id="full-profile-form" method="POST" class="flex flex-wrap flex-grow gap-10" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="h-fit w-full md:w-72">
            <div class="p-10 rounded-xl bg-slate-100 w-full mx-auto">
                <label for="photo" class="cursor-pointer rounded-full overflow-hidden w-32 h-32 flex items-center justify-center mx-auto">
                    <img id="view" src="{{ auth()->user()->foto ? auth()->user()->foto : asset('user-logo.png') }}" alt="profile" class="w-full h-full object-cover hover:brightness-75 transition-all" />
                    <input type="file" id="photo" name="photo" class="hidden" />
                </label>
                <h2 class="text-center font-semibold font-lg mt-1.5">{{ auth()->user()->nama_lengkap }}</h2>
            </div>

            <button type="button" class="btn-change-pass btn btn-outline btn-block mt-5">Ubah Password</button>
        </div>

        <div id="profile-form" class="flex-grow">
            <div class="flex flex-col gap-3 w-full">
                <div class="input-group">
                    <label for="fullname">Nama</label>
                    <input type="text" id="fullname" name="fullname" placeholder="Masukan Nama" value="{{ auth()->user()->nama_lengkap }}" class="input-profile w-full" />
                </div>
                <div class="input-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukan Email" value="{{ auth()->user()->email }}" class="input-profile w-full" />
                </div>
                <div class="input-group">
                    <label for="phone-number">No. Handphone</label>
                    <input type="number" id="phone-number" name="phone-number" placeholder="Masukan No. Handphone" value="{{ auth()->user()->no_telepon }}" class="input-profile w-full" />
                </div>
            </div>

            <div class="mt-5 text-right">
                <button type="submit" id="btn-update-profile" class="btn btn-primary" disabled>Simpan</button>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function() {
            let fullname = $('#fullname').val();
            let email = $('#email').val();
            let phoneNumber = $('#phone-number').val();

            $('.input-profile').keyup(function() {
                if (fullname != $('#fullname').val() || email != $('#email').val() || phoneNumber != $('#phone-number').val()) {
                    $('#btn-update-profile').removeAttr('disabled');
                } else {
                    $('#btn-update-profile').attr('disabled', 'true');
                }
            })
        });
    </script>


    <form id="change-password-form" action="{{ route('profile.change-password') }}" method="POST" class="flex-grow hidden">
        @csrf
        @method('PUT')

        <h1 class="font-bold text-2xl">Password Baru</h1>
        <p class="my-3 text-gray-400">Buat Password Baru Anda</p>

        <div class="input-group">
            <label for="old-password">Password Lama</label>
            <input id="old-password" name="old-password" type="password" class="w-full" placeholder="Masukan Password Lama" value="{{ isset($old_password) ? $old_password : '' }}" />
        </div>
        @if(isset($error_old))
        <p class="mt-2 text-error text-sm">{{ $error_old }}</p>
        @endif

        <div class="input-group mt-4">
            <label for="new-password">Password Baru</label>
            <input id="new-password" name="new-password" type="password" class="w-full" placeholder="Masukan Password Baru" value="{{ isset($new_password) ? $new_password : '' }}" />
        </div>
        @if(isset($error_new))
        <p class="mt-2 text-error text-sm">{{ $error_new }}</p>
        @endif

        <button type="submit" class="btn btn-primary mt-5 btn-block">Lanjut</button>
    </form>
</div>

@if(isset($error_new) || isset($error_old))
<script>
    $(document).ready(function() {
        $('#profile-form').addClass('hidden');
        $('#change-password-form').removeClass('hidden');
        $("#full-profile-form").removeClass("flex-grow");
        $(".btn-change-pass").html('Batal');
    });
</script>
@endif
<script src="{{ asset('js/previewImage.js') }}"></script>
<script src="{{ asset('js/changePassword.js') }}"></script>
@endsection
