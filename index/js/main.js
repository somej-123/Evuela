"use strict";

var scrollEventFlag = 0;
var menuSlide = true;

$(document).ready(function(){

    $("#navMenuInfo").on("click",function(){
        $(location).attr("href", "../info/home");
    })
    $("#navMenuLogin").on("click",function(){
        $(location).attr("href", "../login/home");
    })
    $("#profileBtn").on("click", function(){
        $(location).attr("href", "../setting/home");
    })
    $("#lineEffectText").on("click",function(){
        $(location).attr("href", "../info/home");
    })
    $("#navMenuBlog").on("click",function(){
        $(location).attr("href", "../blog/home");
    })

    $("#navMenuOptions").on("click",()=>{
        if(menuSlide){
            $("#navMenuOptionsIcon").attr("class","fas fa-caret-up");
            menuSlide = false;
            $("#navMenuOptionsDiv").stop().slideDown();
        }else{
            $("#navMenuOptionsIcon").attr("class","fas fa-caret-down");
            menuSlide = true;
            $("#navMenuOptionsDiv").stop().slideUp();
        }
        
    });

    $("#logoutBtn").on("click",()=>{
        $(location).attr("href", "../login/userSignout")
    });
    // $("#profileBtn").on("click",()=>{
    //     $(location).attr("href","../profile/home")
    // });
})