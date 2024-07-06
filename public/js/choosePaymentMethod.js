$(document).ready(function () {
    $(".radio-payment").click(function () {
        $("#temp-payment-method").val(this.value);
    });

    $(".select-payment-btn").click(function () {
        let id = $("#temp-payment-method").val();
        $('input[name="payment-method"]').val(id);

        let logo = $("#img-method-" + id).attr("src");
        let title = $("#title-method-" + id).html();

        $("#choose-payment-btn").html(
            `<img src="${logo}" class="h-6 mr-3" /> <p class="text-sm">${title}</p>`
        );

        payment_modal.close();
    });
});
