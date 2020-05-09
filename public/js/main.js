
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



