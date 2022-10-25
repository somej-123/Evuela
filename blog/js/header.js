"use strict";

$(document).ready(()=>{
    btnEvent();
})

function btnEvent(){

    $("#headerUserMenuP").on("click",()=>{
        $("#headerUserMenuDiv").slideToggle();
    });

    $("#menubar_M").on("click",()=>{
        $("#sideMenu_M").off().fadeToggle();
    });
}