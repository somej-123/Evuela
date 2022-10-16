"use strict";

$(document).ready(()=>{
    btnEvent();
})

function btnEvent(){

    $("#headerUserMenuP").on("click",()=>{
        $("#headerUserMenuDiv").slideToggle();
    })
}