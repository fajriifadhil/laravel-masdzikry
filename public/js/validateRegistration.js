$(document).ready(function () {
    let noError = {
        fullname: false,
        email: false,
        "phone-number": false,
        password: false,
        "less-password": false,
    };

    function checkValid(input) {
        for (let key in input) {
            if (noError[key] == false) {
                $("#submit-btn").attr("disabled", "");
                return;
            }
        }

        $("#submit-btn").removeAttr("disabled");
    }

    $(".input-registration").blur(function () {
        if (this.value == "") {
            let id = $(this).attr("id");
            $("#empty-" + id).removeClass("hidden");
            $(this).addClass("input-error");
            noError[id] = false;
        }
    });

    $(".input-registration").keyup(function () {
        let id = $(this).attr("id");
        if (this.value != "") {
            $("#empty-" + id).addClass("hidden");
            $(this).removeClass("input-error");
            noError[id] = true;

            if (this.id == "password" && this.value.length < 6) {
                noError["less-" + id] = false;
                $(this).addClass("input-error");
                $("#error-password").removeClass("hidden");
            } else if (this.id == "password" && this.value.length >= 6) {
                $("#error-password").addClass("hidden");
                noError["less-" + id] = true;
            }

            if (id == "email") {
                $("#used-email").addClass("hidden");
            }
        } else {
            $("#empty-" + id).removeClass("hidden");
            $(this).addClass("input-error");
            noError[id] = false;
        }

        checkValid(noError);
    });

    $(".input-registration").change(function () {
        let id = $(this).attr("id");
        if (this.value != "") {
            $("#empty-" + id).addClass("hidden");
            $(this).removeClass("input-error");
            noError[id] = true;

            if (this.id == "password" && this.value.length < 6) {
                noError["less-" + id] = false;
                $(this).addClass("input-error");
                $("#error-password").removeClass("hidden");
            } else if (this.id == "password" && this.value.length >= 6) {
                $("#error-password").addClass("hidden");
                noError["less-" + id] = true;
            }

            if (id == "email") {
                $("#used-email").addClass("hidden");
            }
        } else {
            $("#empty-" + id).removeClass("hidden");
            $(this).addClass("input-error");
            noError[id] = false;
        }

        checkValid(noError);
    });
});
