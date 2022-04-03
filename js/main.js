"use strict";

var scrollEventFlag = 0;

$(document).ready(function(){

    $("#navMenuInfo").on("click",function(){
        $(location).attr("href", "./info")
    })
    $("#lineEffectText").on("click",function(){
        $(location).attr("href", "./info")
    })
})