/*
 Jquery Validation using jqBootstrapValidation
 example is taken from jqBootstrapValidation docs
 */
$(function () {
    $("#contactForm input,#contactForm textarea").jqBootstrapValidation({
        preventSubmit: true,
        submitError: function ($form, event, errors) {
            // something to have when submit produces an error ?
            // Not decided if I need it yet
        },
        submitSuccess: function ($form, event) {
            event.preventDefault(); // prevent default submit behaviour
            // get values from FORM
            var name = $("input#name").val();
            var phone = $("input#phone").val();
            var email = $("input#email").val();
            var paymentMethod = $("#paymentMethod").val();
            var message = $("textarea#message").val();
            var firstName = name; // For Success/Failure Message

            var vat = $("#vat").text();
            var transportFee = $("#transportFee").text();
            var total = $("#total").text();

            // Check for white space in name for Success/Fail message
            if (firstName.indexOf(' ') >= 0) {
                firstName = name.split(' ').slice(0, -1).join(' ');
            }
            $.ajax({
                url: orderURL,
                type: "POST",
                data: {
                    fullName: name,
                    phoneNumber: phone,
                    email: email,
                    paymentMethod: paymentMethod,
                    content: message,
                    vat: vat,
                    transportFee: transportFee,
                    total: total
                },
                cache: false,
                success: function (data) {
                    if (data == 'success') {
                        switch (paymentMethod) {
                            case PAYMENT_COD:
                                clear();
                                $.notify({
                                    icon: 'fa fa-check-square-o',
                                    message: "Order Success"
                                }, {
                                    delay: 2000,
                                    type: "success"
                                });
                                break;
                            case PAYMENT_BANK:
                                clear();
                                // Success message
                                $('#success').html("<div class='alert alert-success'>");
                                $('#success > .alert-success').html("<button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;")
                                    .append("</button>");
                                $('#success > .alert-success')
                                    .append("<strong>Bank information: " + introduction + "</strong>");
                                $('#success > .alert-success')
                                    .append('</div>');
                                //clear all fields
                                $('#contactForm').trigger("reset");
                                break;
                            case PAYMENT_PAYPAL:
                                window.location.replace(linkPaypal);
                                break;
                        }
                    } else {
                        $.notify({
                            icon: 'fa fa-check-square-o',
                            message: "Add to cart failed"
                        }, {
                            delay: 2000,
                            type: "danger"
                        });
                    }
                },
                error: function () {
                    $.notify({
                        icon: 'fa fa-check-square-o',
                        message: "Add to cart failed"
                    }, {
                        delay: 2000,
                        type: "danger"
                    });
                },
            })
        },
        filter: function () {
            return $(this).is(":visible");
        },
    });

    $("a[data-toggle=\"tab\"]").click(function (e) {
        e.preventDefault();
        $(this).tab("show");
    });
});

/*When clicking on Full hide fail/success boxes */
$('#name').focus(function () {
    $('#success').html('');
});
