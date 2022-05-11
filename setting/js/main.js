"use strict";

$(document).ready(function(){
    $("#userInfo_managementTitle").on("click",()=>{
        $("#userInfo_managementUl").stop().slideToggle();
    });
})