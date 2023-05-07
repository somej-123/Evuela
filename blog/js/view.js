"use strict";

$(document).ready(()=>{


    // 카테고리 메인 TITLE 가져오기

    $.ajax({
        url:"./ajax/getCategoryList.php",
        // data:{
        //     user_name : _userName,
        //     user_email : _userEmail
        // },
        method:"POST",
        dataType:"json",
    })
    .done((data)=>{
        // console.log(data);
        if(data.confirm == 1){
            // showAlert("회원수정을 완료 하였습니다","success");
            // location.reload(true);

            var rowData = data.data;

            $("#mainSection_categorySubDiv-main").empty();

            // 카테고리 전체 목록
            $("#mainSection_categorySubDiv-main").append(
                '<p class="category_mainTag_P category_mainSelect"><a href="javascript:selectCategory(\'main\',\'all\')">전체</a></p>'
            );

            // 카테고리 목록
            for(var c=0;c<rowData.length;c++){
                $("#mainSection_categorySubDiv-main").append(
                    '<p class="category_mainTag_P"><a href="javascript:selectCategory(\'main\',\''+rowData[c].board_category_name+'\')">'+rowData[c].board_category_name+'</a></p>'
                );
            }

        }else{
            // alert("회원수정에 실패 하였습니다\n다시 시도해주세요");
            showAlert("카테고리 목록이 존재 하지 않거나\n서버에 문제가 발생했습니다.","error");
            // location.reload(true);
        }
    })
    .fail((data)=>{
        // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
        showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
        return;
    })

    // 카테고리 클릭(펼쳐지기)
    $("#mainSection_categoryTitle").on("click",()=>{

        var category_display = $("#mainSection_categorySubDiv").css("display");

        if(category_display == "none"){
            $("#categoryTitleIcon").attr("class","fas fa-caret-up")
            $("#mainSection_categorySubDiv").css("display","flex");
        }else{
            $("#categoryTitleIcon").attr("class","fas fa-caret-down")
            $("#mainSection_categorySubDiv").css("display","none");
        }
    });
    
      
    //   목록 버튼 클릭(작성 페이지)
    $("#viewToListBtn").on('click',()=>{
        location.href="./list";
    });

});

// 댓글창에 답글 버튼 클릭 시
function showCommentsReplyTextArea(commentsReplyTextArea){

    let parent = $(commentsReplyTextArea).parents(".commentsListContents_footer");

    let child = parent.children(".commentsListContents_footer_reply_textarea_div");

    let childStats = child.attr("class");

    if(childStats.includes("commentsListContents_footer_reply_textarea_div_hide")){
        child.attr("class","commentsListContents_footer_reply_textarea_div commentsListContents_footer_reply_textarea_div_show");
    }else{
        child.attr("class","commentsListContents_footer_reply_textarea_div commentsListContents_footer_reply_textarea_div_hide");       
    }
}

// 답글창에 답글 버튼 클릭 시
function showReplyReplyTextArea(ReplyReplyTextArea){

    console.log("du")
    let parent = $(ReplyReplyTextArea).parents(".replyListContents_footer");

    let child = parent.children(".replyListContents_footer_reply_textarea_div");

    let childStats = child.attr("class");

    if(childStats.includes("replyListContents_footer_reply_textarea_hide")){
        child.attr("class","replyListContents_footer_reply_textarea_div replyListContents_footer_reply_textarea_show");
    }else{
        child.attr("class","replyListContents_footer_reply_textarea_div replyListContents_footer_reply_textarea_hide");       
    }
}



// sweetAlert 사용
function showAlert(alertText,alertType,alertTitle,alertFooter){

    if(alertType == "default"){
        Swal.fire(alertText);
        return;
    }
    else if(alertType == "error"){
        Swal.fire({
            icon: 'error',
            title: alertTitle,
            text: alertText,
            footer: alertFooter
          })
          return;
    }
    else if(alertType == "success"){
        Swal.fire({
            icon: 'success',
            title: alertTitle,
            text: alertText,
            footer: alertFooter
          })
          return;
    }
    
}

