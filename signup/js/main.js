"use strict";

var scrollEventFlag = 0;

$(document).ready(function(){

    $("#navMenuInfo").on("click",function(){
        $(location).attr("href", "../info/home")
    })
    $("#navMenuLogin").on("click",function(){
        $(location).attr("href", "../login/home")
    })
})