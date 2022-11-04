"use strict";

$(document).ready(()=>{


    // 카테고리 클릭
    $("#mainSection_categoryTitle").on("click",()=>{

        var category_display = $("#mainSection_categorySubDiv").css("display");

        if(category_display == "none"){
            $("#categoryTitleIcon").attr("class","fas fa-chevron-up")
            $("#mainSection_categorySubDiv").css("display","flex");
        }else{
            $("#categoryTitleIcon").attr("class","fas fa-chevron-down")
            $("#mainSection_categorySubDiv").css("display","none");
        }
    });


});