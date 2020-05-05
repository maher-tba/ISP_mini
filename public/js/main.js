
//sidebar toggle
$(function() {
     "use strict";

    $(".toggle-settings").on("click", function() {
        $(this)
          .find("i")
          .toggleClass("fa-spin");
        $(this)
          .parent()
          .toggleClass("hide-settings");
        $(".sidebar-content")
          .toggleClass("sidebar-content-show");
    });

    // alert close
    $('.alert').alert()


});
$(document).ready(function () {
    //checkbox password check
    $('#customCheckboxPassword').change(function() {
        if ($(this).prop('checked')) {
            $('#password').prop('readonly', false);
            $('#password-confirm').prop('readonly', false);
        }
        else {
            $('#password').prop('readonly', true);
            $('#password-confirm').prop('readonly', true);
        }
    });
});



