@extends('layouts.single')

@section('content')
<form action="{{ route('forgot-password.check-otp') }}" method="POST" class="shadow-lg p-8 rounded-lg">
    @csrf
    @method('POST')

    <img src="{{ asset('full-logo.png') }}" alt="logo" class="h-8 object-cover" />

    <h1 class="h-section my-6">Forgot Password</h1>


    <p class="font-medium text-sm text-gray-400 mb-6">Kode Verifikasi OTP telah dikirim ke {{ $email }}</p>

    <input type="hidden" id="email" name="email" value="{{ $email }}" />
    <input id="otp" name="otp" type="hidden" />


    <div class="flex gap-5 mb-3 w-fit mx-auto">
        <input id="1-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
        <input id="2-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
        <input id="3-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
        <input id="4-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
        <input id="5-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
        <input id="6-otp" name="otp-input" type="text" class="otp-input input bg-gray-300 w-12">
    </div>
    @if(session('error-otp'))
    <p class="text-center mb-3 text-error text-sm">{{ session('error-otp') }}</p>
    @endif

    <div class="text-center mt-6">
        <button type="submit" class="btn btn-primary btn-rounded-full"><span>NEXT</span> <i class="ri-arrow-right-line"></i></button>
    </div>

</form>

<script>
    function setOTP() {
        let inputAnswer = $(`input[name="otp"]`);

        inputAnswer.val("");
        for (let i = 1; i <= 6; i++) {
            inputAnswer.val(inputAnswer.val() + $("#" + i + "-otp").val());
        }
    }

    $(".otp-input").keyup(function(e) {
        let inputId = this.id.split("-")[0];

        $(this).val($(this).val().slice(0, 1));

        let nextInput = (parseInt(inputId) + 1) + "-otp";
        let prevInput = (parseInt(inputId) - 1) + "-otp";

        if (e.keyCode === 8 && $(this).val() == "") {
            $("#" + prevInput).focus();
        } else {
            $("#" + nextInput).focus();
        }

        console.log($(`input[name="otp"]`).val())

        setOTP(inputId);
    });
</script>
@endsection
