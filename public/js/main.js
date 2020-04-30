

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

    // $(".btn").on("click", function(){
    //     $("btn-group").find(".active").removeClass("active"); //not work
    //     $(this).addClass("active"); //work
    //  });


});

// var ul = document.getElementById("settings-list");

// var listItems = ul.getElementsByClassName("sidebar-dropdown");

// for(li of  listItems){
//   li.addEventListener('click', function(){
//     if(this.classList.contains('active')){
//       this.classList.remove("active");
//     } else {
//       this.classList.add("active");
//     }
//   })
// }


