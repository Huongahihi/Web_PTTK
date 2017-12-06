/* Write here your custom javascript codes */
$('#parent').click(function () {
    if($(window).width()<990){
        if($('#dropdownmenu').is(":hidden")){
            $('#dropdownmenu').css('top','35%').slideDown();
            $('#parent').addClass('active');
        }
        else{
            $('#dropdownmenu').css('top','35%').slideUp();
            $('#parent').removeClass('active');
        }
    }
});
$(window).resize(function () {
    if($(window).width()>=990){
        $('#dropdownmenu').css('top','100%')
    }
});



