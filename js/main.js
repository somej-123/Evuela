"use strict";

var scrollEventFlag = 0;

$(document).ready(function(){
    
    
    headerTextFadein();

    btnEvent();




    
})

function headerTextFadein(){
    // scroll_on();
    $("#Background_Effect").animate({
        "opacity":"0"
    },5000);
    setTimeout(function(){
        $("#headerText").fadeIn(5000);
    },3000)
    setTimeout(function(){
        $("#lineEffectLine").fadeIn(3000);
        $("#lineEffectLine").animate({
            "width":"25%"
        },2000);
    },2000)
    setTimeout(function(){
        // $("#lineTest").css("display","none")
        $("#lineEffectText").fadeIn(3000);
        // scroll_off();
    },6000);
    setTimeout(function(){
        // $("#lineTest").css("display","none")
        $("#navMenuInfo").fadeIn(1000);
        $("#navMenuBlog").fadeIn(2000);
        $("#navMenuPicture").fadeIn(3000);
        $("#navMenuLogin").fadeIn(4000);
        // scroll_off();
    },8000);
    
}





function btnEvent(){

    // $("#lineEffectText").on("click",function(){
    //     var offset = $("#lightSection").offset();
    //     $("html").animate({scrollTop : offset.top}, 300);
    // })

    // $("#lightDivRainText").on("mouseenter",function(){
    //     $("#lightText").css("display","none");
    //     $("#lightText2").stop().fadeIn(2000);
    // });
    // $("#lightDivRainText").on("mouseleave",function(){
    //     $("#lightText2").css("display","none");
    //     $("#lightText").stop().fadeIn(2000);
    // })
    
}

 // 스크롤 제한 ON
 function scroll_on() {
    $('html, body').css({'overflow': 'hidden', 'height': '100%'});
    $('#headerContainer').on('scroll touchmove mousewheel', function(event) {
      event.preventDefault();
      event.stopPropagation();
      return false;
    });
}

// 스크롤 제한 OFF
function scroll_off() {
    $("#headerContainer").off('scroll touchmove mousewheel');
    $('html, body').css({'overflow': 'visible', 'height': '100%'});
}