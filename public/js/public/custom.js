jQuery(document).ready(function () {

    /**
     * Отправка email на подписку обновлений
     */
    $('.send-subscription-request').on('click', function (e) {
        let divAlert = $("#alert_subscription");
        divAlert.removeClass('alert-success').removeClass('alert-danger').hide();
        let inputEmail = $('#email_subscription');
        let sEmail = inputEmail.val();

        let route = $("#route_send_subscription").val();
        let token = $("#input_token").val();

        // Регулярное выражение для проверки e-mail
        let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if (sEmail && emailPattern.test(sEmail)) {
            let form_data = new FormData();
            form_data.append('email', sEmail);

            $.ajax({
                url: route,
                type: 'POST',
                data: {
                    "_token": token,
                    "email": sEmail,
                },
                success: function (result) {
                    console.log(result);
                    divAlert.addClass('alert-success').text("Подписка успешно оформлена!").show();
                },
                error: function (xhr, status, error) {
                    let response = JSON.parse(xhr.responseText);
                    console.log(response);
                    console.log(status);
                    console.log(error);
                    divAlert.addClass('alert-danger').text(response.message).show();
                }
            });
        } else {
            divAlert.addClass('alert-danger').text("Пожалуйста, введите корректный e-mail.").show();
        }

        inputEmail.val('');
        setTimeout(function () {
            divAlert.removeClass('alert-success').removeClass('alert-danger').hide();
        }, 5000);

    })

});
