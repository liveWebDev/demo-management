$(document).ready(function ($) {
    
    $(document).on("click", "#btnSignup", function (e) {
        $("#frmSignup").submit();
    });

    $(document).on("click", "#btnLogin", function (e) {
        $("#frmLogin").submit();
    });

    $(document).on("click", "#btnResetPassword", function (e) {
        $("#frmResetPassword").submit();
    });

    $('.date').datetimepicker({
      format: 'YYYY-MM-DD',
      minDate:new Date()
    });

    $('.time').datetimepicker({
        format: 'H:mm'
    });
});