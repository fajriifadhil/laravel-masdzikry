$(document).ready(function () {
    function changePass() {
        $("#change-password-form").toggleClass("hidden");
        $("#profile-form").toggleClass("hidden");
        $("#full-profile-form").toggleClass("flex-grow");
    }
    $(".btn-change-pass").click(function () {
        if ($(this).html() == "Batal") {
            $(this).html("Ubah Password");
        } else {
            $(this).html("Batal");
        }

        changePass();
    });
});
