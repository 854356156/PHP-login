$(function () {
    $(".pwd2").focus(function () {
        $('.pwd2').bind('input propertychange change', function() {
            var value = $('.pwd2').val();
            if(value === $('.pwd1').val()){
                //两次密码输入相同
                $(".registered").attr('disabled', false);
                $(".prompt").css('display','none');
            }else {
                //两次密码输入不相同
                $(".registered").attr('disabled', true);
                $(".prompt").css('display','block');
            }
        })
    })
})