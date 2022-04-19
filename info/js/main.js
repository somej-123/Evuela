"use strict";

$(document).ready(function(){
    $("#Info_slide_BLOG").on("click",function(){
        $("#Info_slide_BLOG").css("color","black");
        $("#Info_slide_PICTURE").css("color","rgb(129, 129, 129)");
        $("#Info_slide_ETC").css("color","rgb(129, 129, 129)");
        $("#Info_Section2_Slide_Div").stop().animate({
            "left":"0"
        },500); 
    });
    $("#Info_slide_PICTURE").on("click",function(){
        $("#Info_slide_BLOG").css("color","rgb(129, 129, 129)");
        $("#Info_slide_PICTURE").css("color","black");
        $("#Info_slide_ETC").css("color","rgb(129, 129, 129)");
        $("#Info_Section2_Slide_Div").stop().animate({
            "left":"-100%"
        },500); 
    });
    $("#Info_slide_ETC").on("click",function(){
        $("#Info_slide_BLOG").css("color","rgb(129, 129, 129)");
        $("#Info_slide_PICTURE").css("color","rgb(129, 129, 129)");
        $("#Info_slide_ETC").css("color","black");
        $("#Info_Section2_Slide_Div").stop().animate({
            "left":"-200%"
        },500); 
    });
})