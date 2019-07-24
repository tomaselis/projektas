$(document).ready(function () {
    // console.log('veikia');
    $('.wrapperReg').submit(function (e) {
        e.preventDefault();
        var url = $('.wrapperReg').attr('action');

        $.ajax({
            type: "POST",
            url: url,
            data: $(this).serialize(),
            success: function (response) {
                window.location.replace("http://194.5.157.92/phpObjektinis/index.php/post");
                console.log(response);
                }
        });
    });
    $('.password2').change(function(){
        var pass1 = $('.password').val();
        var pass2 = $('.password2').val();
        if(pass1 != pass2){

            $('.password').addClass('red');
            $('.password2').addClass('red');
        }else{
            $('.password').removeClass('red');
            $('.password2').removeClass('red');
        }
    });
});