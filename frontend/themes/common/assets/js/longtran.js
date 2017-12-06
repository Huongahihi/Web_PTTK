/**
 * Created by Long on 2/9/2017.
 */
var adult = 0;
var infant = 0;
function actionAdd(id, sl, action, url) {
    var url = url;
    var data = {
        id: id,
        sl: sl,
        action: action
    };
    $.ajax({
        url: url,
        type: "post",
        dateType: "text",
        data: data,
        success: function (result) {
            result = result.trim();
            arr = result.split('^');

            if (arr[0] == 'success') {
               /* quantity = parseInt($('.items-count').text());*/
               console.log(arr[2]);
                $('.items-count').text(arr[2]);
                //$('#total-price').text(arr[1]);

                $.notify({
                    icon: 'fa fa-check-square-o',
                    message: "Add to cart success"
                }, {
                    delay: 1000,
                    type: "success"
                });
                setTimeout(function () {

                }, 1500);
                var imgtofly = $('.imgtest_' + id + '>img');
                var cart = $('.items-count');
                if (imgtofly) {

                    var imgclone = imgtofly.clone()

                        .offset({top: imgtofly.offset().top, left: imgtofly.offset().left})

                        .css({
                            'opacity': '0.7',
                            'position': 'absolute',
                            'height': '150px',
                            'width': '150px',
                            'z-index': '1000'
                        })

                        .appendTo($('body'))

                        .animate({

                            'top': cart.offset().top + 5,

                            'left': cart.offset().left + 30,

                            'width': 55,

                            'height': 55

                        }, 400, 'easeInCirc');

                    imgclone.animate({'width': 0, 'height': 0}, function () {
                        $(this).detach()
                    });

                }
            }

        }
    });
}
function checkinputNumber(id, url) {
    id_input = '#input_' + id;
    if (isNaN($(id_input).val())) {
        $.notify({
            icon: 'fa fa-check-square-o',
            message: "Quantity must be a number!!!"
        }, {
            // delay: 1000,
            type: "danger"
        });
        setTimeout(function () {

        }, 0);
        string = $(id_input).val();
        if (string.substring(0, string.length - 1) == '') {
            $(id_input).val(1);
            data = {
                id: id,
                sl: 1
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result) {
                    result = result.trim();
                    arr = result.split('^');
                    if (arr[0] == 'success') {
                        price='#price_'+id;//price of this product
                        $(price).text('$'+parseFloat(arr[3]).toLocaleString());
                        $('.items-count').text(arr[1]);
                        $('#total_price').text('$'+parseFloat(arr[2]).toLocaleString());
                    }
                }
            });
        }
        else {
            $(id_input).val((string.substring(0, string.length - 1)));
            data = {
                id: id,
                sl: parseInt(string.substring(0, string.length - 1))
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result) {
                    result = result.trim();
                    arr = result.split('^');
                    if (arr[0] == 'success') {
                        price='#price_'+id;//price of this product
                        $(price).text('$'+parseFloat(arr[3]).toLocaleString());
                        $('.items-count').text(arr[1]);
                        $('#total_price').text('$'+parseFloat(arr[2]).toLocaleString());
                    }
                }
            });

        }
    }
    else {
        string = $(id_input).val();
        if (string == '') {
            $.notify({
                icon: 'fa fa-check-square-o',
                message: "Quantity must be require!!!"
            }, {
                // delay: 1000,
                type: "danger"
            });
            setTimeout(function () {

            }, 0);
            $(id_input).val(1);
            $(id_input).focus();
            data = {
                id: id,
                sl: 1
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result) {
                    result = result.trim();
                    arr = result.split('^');
                    if (arr[0] == 'success') {
                        price='#price_'+id;//price of this product
                        $(price).text('$'+parseInt(arr[3]).toLocaleString());
                        $('.items-count').text(arr[1]);
                        $('#total_price').text('$'+parseFloat(arr[2]).toLocaleString());
                    }
                }
            });

        }
        if (parseInt(string) == 0) {
            $.notify({
                icon: 'fa fa-check-square-o',
                message: "Quantity>0!!!"
            }, {
                // delay: 1000,
                type: "danger"
            });
            setTimeout(function () {

            }, 0);
            $(id_input).val(1);
            $(id_input).focus();

        }
        if (parseInt(string) < 0) {
            $.notify({
                icon: 'fa fa-check-square-o',
                message: "Quantity must be a number > 0!!!"
            }, {
                // delay: 1000,
                type: "danger"
            });
            setTimeout(function () {

            }, 0);
            $(id_input).val(1);
            data = {
                id: id,
                sl: 1
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result) {
                    result = result.trim();
                    arr = result.split('^');
                    if (arr[0] == 'success') {
                        price='#price_'+id;//price of this product
                        $(price).text('$'+parseFloat(arr[3]).toLocaleString());
                        $('.items-count').text(arr[1]);
                        $('#total_price').text('$'+parseFloat(arr[2]).toLocaleString());
                    }
                }
            });
        }
        if (parseInt(string) > 0) {
            data = {
                id: id,
                sl: parseInt(string)
            };
            $.ajax({
                url: url,
                type: "post",
                dateType: "text",
                data: data,
                success: function (result)
                {
                    result = result.trim();
                    arr = result.split('^');
                    if (arr[0] == 'success') {
                        price='#price_'+id;//price of this product
                        $(price).text('$'+parseFloat(arr[3]).toLocaleString());
                        $('.items-count').text(arr[1]);
                        $('#total_price').text('$'+parseFloat(arr[2]).toLocaleString());
                    }
                }
            });
        }
    }

}


function choosemembercollepse() {
    $('.select-no-people-dropdown').slideToggle();
}
function choosememberhidden() {
    $('.select-no-people-dropdown').slideToggle();
}
function choosemember_above_plus(member, url) {
    count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text()) + 1;
    $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text(count);
    var url = url;
    var data = {
        member: member,
        sl: count
    };
    $.ajax({
        url: url,
        type: "post",
        dateType: "text",
        data: data,
        success: function (result) {
            result = result.trim();
            if (result == 'success') {
            }
        }

    });
}
function choosemember_above_minus(member, url) {
    count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text());
    if (count == 0) {
        $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text('0');
    }
    else {
        count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text()) - 1;
        $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text(count);
    }
    var url = url;
    var data = {
        member: member,
        sl: count
    };
    $.ajax({
        url: url,
        type: "post",
        dateType: "text",
        data: data,
        success: function (result) {
            result = result.trim();
            if (result == 'success') {
            }
        }

    });
}
function validateform(object) {
    if (!(object.attr("value") == "Make Payment")) {

    }
    else {
        firstname = $('#firstname');
        lastname = $('#lastname');
        email = $('#email');
        phone = $('#phone');
        filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        firstname_adult_travel = $('input[name="firstname_adult_travel[]"]');
        lastname_adult_travel = $('input[name="lastname_adult_travel[]"]');
        firstname_frant_travel = $('input[name="firstname_frant_travel[]"]');
        lastname_frant_travel = $('input[name="lastname_frant_travel[]"]');
        k = 0;
        if ($.trim(firstname.val()) == '') {
            k++;
            firstname.addClass('border');
        }
        else {
            firstname.removeClass('border');
        }
        if ($.trim(lastname.val()) == '') {
            k++;
            lastname.addClass('border');
        }
        else {
            lastname.removeClass('border');
        }

        if ($.trim(email.val()) == '') {
            k++;
            email.addClass('border');
        }
        else {
            if (!filter.test($.trim(email.val()))) {
                k++;
                email.addClass('border');
            }
            else {
                email.removeClass('border');
            }
        }
        if ($.trim(phone.val()) == '') {
            k++;
            phone.addClass('border');
        }
        else {

            if ($.trim(phone.val()).length > 10 || $.trim(phone.val()).length < 9 || !(/\(?([0-9]{3})\)?([ .-]?)([0-9]{3})\2([0-9]{4})/.test($.trim(phone.val())))) {
                k++;
                phone.addClass('border');
            }
            else {
                phone.removeClass('border');
            }
        }
        // if(firstname_adult_travel.length > 0){
        //     for(i=0;i<firstname_adult_travel.length;i++){
        //         console.log(firstname_adult_travel[i].val());
        //        /* if(firstname_adult_travel[i].val()){
        //
        //         }*/
        //     }
        // }
        if(k == 0) {
            return true;
        }
        else {
            return false;
        }
    }

}
function choosemember_under_plus(member, url) {
    count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text()) + 1;
    $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text(count);
    var url = url;
    var data = {
        member: member,
        sl: count
    };
    $.ajax({
        url: url,
        type: "post",
        dateType: "text",
        data: data,
        success: function (result) {
            result = result.trim();
            if (result == 'success') {
            }
        }

    });
}
function choosemember_under_minus(member, url) {
    count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text());
    if (count == 0) {
        $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text('0');
    }
    else {
        count = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text()) - 1;
        $('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text(count);
    }
    var url = url;
    var data = {
        member: member,
        sl: count
    };
    $.ajax({
        url: url,
        type: "post",
        dateType: "text",
        data: data,
        success: function (result) {
            result = result.trim();
            if (result == 'success') {

            }
        }
    });

}
$(document).ready(function () {
    if($('#total_price').text()=='$0'){
    }
    $('body').click(function () {
        adult = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-above .pull-right div .count').text());
        infant = parseInt($('.select-no-people .select-no-people-dropdown .adult-youth-child-wrapper-under .pull-right div .count').text());
        value = 'Adult: ' + adult;
        value = value + ', Children: ' + infant;
        $('#data_input_category').val(value);
        //$('.select-no-people-dropdown').hide(1000);
    });
});
