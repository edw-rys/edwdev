$(function () {

    "use strict";

    // init the validator
    // validator files are included in the download package
    // otherwise download from http://1000hz.github.io/bootstrap-validator

    $('#contact-form').validator();


    // when the form is submitted
    $('#contact-form').on('submit', function (e) {

        // if the validator does not prevent form submit
        if (!e.isDefaultPrevented()) {
            var url = document.getElementById('contact-form').getAttribute('action');
            $('#submit').text('¡Enviando el correo!').attr('disabled', 'true');
            // POST values in the background the the script URL
            $.ajax({
                type: "POST",
                url: url,
                data: $(this).serialize(),
                success: function (data)
                {
                    $('#submit').text('Enviar Mensaje').attr('disabled', 'false');
                    $('#submit').removeAttr('disabled', 'false');
                    // data = JSON object that contact.php returns

                    // we recieve the type of the message: success x danger and apply it to the 
                    var messageAlert = 'alert-' + data.type;
                    var messageText = data.message;

                    // let's compose Bootstrap alert box HTML
                    var alertBox = '<div class="alert ' + messageAlert + ' alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>' + messageText + '</div>';
                    
                    // If we have messageAlert and messageText
                    if (messageAlert && messageText) {
                        // inject the alert to .messages div in our form
                        $('#contact-form').find('.messages').html(alertBox);
                        // empty the form
                        $('#contact-form')[0].reset();
                        $('#token-form-contact').val(data.token);
                    }
                },
                error: function (params) {
                    $('#submit').text('Enviar Mensaje').attr('disabled', 'false');
                    $('#submit').removeAttr('disabled', 'false');
                }
            });
            return false;
        }
    })
});