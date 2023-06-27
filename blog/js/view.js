"use strict";

$(document).ready(()=>{

    // // 페이지 로드 시 이미지 크기 조절
    // var viewContentsImg = $("#mainSection_Body_view_summernote p img");
    // var mainSectionBodyWidth = parseInt($("#mainSection_Body_viewDiv").css("width").replace("px", ""));
    // // console.log("이미지 body 값 " + mainSection_Body_viewDiv);

    // if(viewContentsImg.length > 0){
    //     for(var imgDivCnt = 0; imgDivCnt < viewContentsImg.length; imgDivCnt++){

    //         // 이미지 ID값
    //         // console.log("이미지 ID 값" + ImgFiles.eq(imgDivCnt).attr("id"));
    //         var selectImgDiv = viewContentsImg.eq(imgDivCnt).attr("id");
    //         // 이미지 넓이 값
    //         // console.log("이미지 넓이 값 " +ImgFiles.eq(imgDivCnt).css("width"));
    //         var ImgWidthValue = parseInt(viewContentsImg.eq(imgDivCnt).css("width").replace("px", ""));

    //         // console.log(ImgWidthValue);
    //         // console.log(mainSection_Body_viewDiv);

    //         if(ImgWidthValue > mainSectionBodyWidth){
    //             viewContentsImg.eq(imgDivCnt).attr("class","imgWidthAuto");
    //         }else{
    //             viewContentsImg.eq(imgDivCnt).attr("class","");

    //         }
    //         // console.log(ImgFiles.eq(imgDivCnt).attr("class"));
    //     }
    // }



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
    // 게시글 삭제
    $("#viewToDeleteBtn").on("click",()=>{
        Swal.fire({
            title: '게시글을 삭제하시겠습니까?',
            text: "",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '삭제',
            cancelButtonText: '취소'
        }).then((result) => {
            if (result.isConfirmed) {

                const board_id = $("#board_id").val();

                $.ajax({
                    url: "./ajax/deleteBoard.php",
                    data:{
                        board_id : board_id
                    },
                    method: "POST",
                    dataType: "json",
                })
                .done((data) => {
                    if(data.error){
                        alert("게시글이 삭제됐습니다.");
                        location.href="./list";
                    }else{
                        showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.", "error");
                        return;    
                    }
                })
                .fail((data) => {
                    // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.", "error");
                    return;
                });
            }
        });
    });

    // 게시글 수정
    $("#viewToEditBtn").on("click",()=>{
        const board_idx = $("#board_idx").val();
        location.href="./update?board="+board_idx+"";
    });

    // 댓글 등록
    $("#footerTextareaBtnDiv_button").on("click",()=>{
        var commentsText = $("#footerTextareaDiv_textarea").val();

        if(commentsText == "" || commentsText == null){
            showAlert("댓글을 입력해주세요","error");
            return;
        }

        $.ajax({
            url:"./ajax/createComment.php",
            data:{
                user_id : $("#user_id").val(),
                user_level : $("#user_level").val(),
                board_id : $("#board_id").val(),
                board_category_idx : $("#board_category_idx").val(),
                board_categorytype_idx : $("#board_categorytype_idx").val(),
                board_level : $("#board_level").val(),
                comment_contents : commentsText
            },
            method:"POST",
            dataType:"json",
        }).done((data)=>{
            
            if(data.error == 1){
                showAlert("등록하였습니다.","timerSuccess");
                $("#footerTextareaDiv_textarea").val("");
                $("#mainSection_Body_viewFooter_commentsList").empty();

                //js 세션 복호화 ( 사용자ID : USE1)
                var commentSessionID = sessionStorage.getItem('USE1');
                if(commentSessionID != null || commentSessionID != ""){
                    var decrypt = CryptoJS.enc.Base64.parse(commentSessionID);
                    var hashData = decrypt.toString(CryptoJS.enc.Utf8);
                }else{
                    var hashData = "";
                }
                

                // 댓글 목록들
                let commentList = data.data;

                if(commentList.length > 0){
                    for(let i = 0; i<commentList.length; i++){
                        let commentListHtml = "";

                        // console.log(commentList[i].createdate.getTime());

                        // 사용자 댓글 반복
                        commentListHtml += '<div class="mainSection_Body_viewFooter_commentsListContents">';  
                        // 댓글 헤더
                        commentListHtml += '<div class="commentsListContents_header">';
                        commentListHtml += '<div class="commentsListContents_header_leftMenu">';
                        commentListHtml += '<p class="commentsListContents_header_ID">'+commentList[i].user_id+'</p><p class="commentsListContents_header_createTime"><i class="far fa-clock" style="position:relative;top:1px;margin-right:5px;"></i>'+elapsedText(commentList[i].createdate)+'</p>'
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_header_rightMenu">';
                        if(hashData == commentList[i].user_id){
                            commentListHtml += '<p class="commentsListContents_header_edit">수정</p><p class="commentsListContents_header_delete" onclick="deleteComment('+commentList[i].comment_id+')">삭제</p>';
                        }else{

                        }
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        // 댓글 헤더 끝

                        // 댓글 바디 시작
                        commentListHtml += '<div class="commentsListContents_body">';
                        commentListHtml += '<div class="commentsListContents_body_contents">';
                        commentListHtml += ''+commentList[i].comment_contents+'';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        // 댓글 바디 끝

                        // 댓글 푸터
                        commentListHtml += '<div class="commentsListContents_footer">';
                        commentListHtml += '<div class="commentsListContents_footer_reply_div">';
                        commentListHtml += '<span class="commentsListContents_footer_reply" onclick="showCommentsReplyTextArea(this)">답글</span>';
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_footer_reply_textarea_div commentsListContents_footer_reply_textarea_div_hide">';
                        commentListHtml += '<div class="form-floating">';
                        commentListHtml += '<textarea class="form-control commentsListContents_footer_reply_textarea" placeholder="깨끗한 댓글 입력 부탁드립니다."></textarea>';
                        commentListHtml += '<label>답글은 로그인 후에 입력할 수 있습니다</label>';
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_footer_reply_btn_div">';
                        commentListHtml += '<button type="button" class="btn btn-secondary">등록</button>';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        //댓글 푸터 끝
                        commentListHtml += '</div>';
                        // 사용자 댓글 끝
                        $("#mainSection_Body_viewFooter_commentsList").append(commentListHtml);
                    }

                }else{
                    //댓글이 하나도 없는 경우
                }
                
            }else{
                showAlert(data.errorText,"error");
                return;    
            }

        })
        .fail((data)=>{
            showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
            return;
        })
    });

    // 로그인 정보가 없을 때 댓글 등록
    $("#footerTextareaBtnDiv_button_beforeLogin").on("click",()=>{

        Swal.fire({
            // title: '게시글을 등록 하시겠습니까?',
            html:"<b>로그인이 필요한 기능입니다\n로그인 하시겠습니까?</b>",
            // text: "",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '로그인',
            cancelButtonText:'취소'
          }).then((result) => {
            if(result.isConfirmed){
                location.href = '../login/home';
            }
          });
        return;
    })


    // 브라우저 크기에 따라 이미지 크기 변경
    // window.onresize = function(event){
    //     var ImgFiles = $("#mainSection_Body_view_summernote p img");
    //     var mainSection_Body_viewDiv = parseInt($("#mainSection_Body_viewDiv").css("width").replace("px", ""));
    //     // console.log("이미지 body 값 " + mainSection_Body_viewDiv);

    //     if(ImgFiles.length > 0){
    //         for(var imgDivCnt = 0; imgDivCnt < ImgFiles.length; imgDivCnt++){

    //             // 이미지 ID값
    //             // console.log("이미지 ID 값" + ImgFiles.eq(imgDivCnt).attr("id"));
    //             var selectImgDiv = ImgFiles.eq(imgDivCnt).attr("id");
    //             // 이미지 넓이 값
    //             // console.log("이미지 넓이 값 " +ImgFiles.eq(imgDivCnt).css("width"));
    //             var ImgWidthValue = parseInt(ImgFiles.eq(imgDivCnt).css("width").replace("px", ""));

    //             // console.log(ImgWidthValue);
    //             // console.log(mainSection_Body_viewDiv);

    //             if(ImgWidthValue >= mainSection_Body_viewDiv){
    //                 ImgFiles.eq(imgDivCnt).attr("class","imgWidthAuto");
                    
    //             }else{
    //                 ImgFiles.eq(imgDivCnt).attr("class","");
                    
    //             }
    //             // console.log(ImgFiles.eq(imgDivCnt).attr("class"));
    //         }
    //     }
    // }
});

// 댓글 삭제 이벤트
function deleteComment(commentID){
    // console.log(commentID);
    var hashData = "";
    //js 세션 복호화 ( 사용자ID : USE1)
    var commentSessionID = sessionStorage.getItem('USE1');
    if(commentSessionID != null || commentSessionID != ""){
        var decrypt = CryptoJS.enc.Base64.parse(commentSessionID);
        hashData = decrypt.toString(CryptoJS.enc.Utf8);
    }else{
        hashData = "";
    }

    if(hashData == ""){
        showAlert("로그인 정보가 존재하지 않습니다.","error");
        return;
    }

    $.ajax({
        url:"./ajax/deleteComment.php",
        data:{
            comment_id : commentID,
            deleteUser_id : hashData,
            board_id : $("#board_id").val()
        },
        method:"POST",
        dataType:"json",
    }).done((data)=>{
        if(data.error){
            showAlert("댓글을 삭제하였습니다","timerSuccess");

            $("#mainSection_Body_viewFooter_commentsList").empty();

                //js 세션 복호화 ( 사용자ID : USE1)
                var commentSessionID = sessionStorage.getItem('USE1');
                if(commentSessionID != null || commentSessionID != ""){
                    var decrypt = CryptoJS.enc.Base64.parse(commentSessionID);
                    var hashData = decrypt.toString(CryptoJS.enc.Utf8);
                }else{
                    var hashData = "";
                }
                

                // 댓글 목록들
                let commentList = data.data;

                if(commentList.length > 0){
                    for(let i = 0; i<commentList.length; i++){
                        let commentListHtml = "";

                        // console.log(commentList[i].createdate.getTime());

                        // 사용자 댓글 반복
                        commentListHtml += '<div class="mainSection_Body_viewFooter_commentsListContents">';  
                        // 댓글 헤더
                        commentListHtml += '<div class="commentsListContents_header">';
                        commentListHtml += '<div class="commentsListContents_header_leftMenu">';
                        commentListHtml += '<p class="commentsListContents_header_ID">'+commentList[i].user_id+'</p><p class="commentsListContents_header_createTime"><i class="far fa-clock" style="position:relative;top:1px;margin-right:5px;"></i>'+elapsedText(commentList[i].createdate)+'</p>'
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_header_rightMenu">';
                        if(hashData == commentList[i].user_id){
                            commentListHtml += '<p class="commentsListContents_header_edit">수정</p><p class="commentsListContents_header_delete" onclick="deleteComment('+commentList[i].comment_id+')">삭제</p>';
                        }else{

                        }
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        // 댓글 헤더 끝

                        // 댓글 바디 시작
                        commentListHtml += '<div class="commentsListContents_body">';
                        commentListHtml += '<div class="commentsListContents_body_contents">';
                        commentListHtml += ''+commentList[i].comment_contents+'';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        // 댓글 바디 끝

                        // 댓글 푸터
                        commentListHtml += '<div class="commentsListContents_footer">';
                        commentListHtml += '<div class="commentsListContents_footer_reply_div">';
                        commentListHtml += '<span class="commentsListContents_footer_reply" onclick="showCommentsReplyTextArea(this)">답글</span>';
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_footer_reply_textarea_div commentsListContents_footer_reply_textarea_div_hide">';
                        commentListHtml += '<div class="form-floating">';
                        commentListHtml += '<textarea class="form-control commentsListContents_footer_reply_textarea" placeholder="깨끗한 댓글 입력 부탁드립니다."></textarea>';
                        commentListHtml += '<label>답글은 로그인 후에 입력할 수 있습니다</label>';
                        commentListHtml += '</div>';
                        commentListHtml += '<div class="commentsListContents_footer_reply_btn_div">';
                        commentListHtml += '<button type="button" class="btn btn-secondary">등록</button>';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        commentListHtml += '</div>';
                        //댓글 푸터 끝
                        commentListHtml += '</div>';
                        // 사용자 댓글 끝
                        $("#mainSection_Body_viewFooter_commentsList").append(commentListHtml);
                    }

                }else{
                    //댓글이 하나도 없는 경우
                }
        }else{
            showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.", "error");
            return;
        }
    }).fail((data)=>{
        showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.", "error");
        return;
    })
}

//댓글창 수정 버튼 클릭
function updateComment(el){
    console.log(el);
    let parent = $(el).parents(".mainSection_Body_viewFooter_commentsListContents");
    let childS = parent.children(".commentsListContents_body");
    let childE = childS.children(".commentsListContents_body_contents");

    let childCommentContents = $(childE).text();
    console.log(childCommentContents);

    $(childE).replaceWith($("<textarea>"+childCommentContents+"</textarea>"));

    console.log(childE);
    // let grandParent = $(parent).parents(".commentsListContents_header");
}

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
    }else if(alertType == "timerSuccess"){
        Swal.fire({
            position: 'center',
            icon: 'success',
            title: alertTitle,
            text: alertText,
            footer: alertFooter,
            showConfirmButton: false,
            timer: 1500
          })
          return;
    }else if(alertType == "timerSuccess"){
        Swal.fire({
            position: 'center',
            icon: 'error',
            title: alertTitle,
            text: alertText,
            footer: alertFooter,
            showConfirmButton: false,
            timer: 1500
          })
          return;
    }

    
}

// 게시글 등록 시간 문자열로 표현(방금전, 1분전, 1시간전 등등...)
function elapsedText(date) {
	// 초 (밀리초)
	const seconds = 1;
	// 분
	const minute = seconds * 60;
	// 시
	const hour = minute * 60;
	// 일
	const day = hour * 24;
	
	var today = new Date();
    var inputDate = new Date(date)
	var elapsedTime = Math.trunc((today.getTime() - inputDate.getTime()) / 1000);
	
	var elapsedText = "";
	if (elapsedTime < seconds) {
		elapsedText = "방금 전";
	} else if (elapsedTime < minute) {
		elapsedText = elapsedTime + "초 전";
	} else if (elapsedTime < hour) {
		elapsedText = Math.trunc(elapsedTime / minute) + "분 전";
	} else if (elapsedTime < day) {
		elapsedText = Math.trunc(elapsedTime / hour) + "시간 전";
	} else if (elapsedTime < (day * 15)) {
		elapsedText = Math.trunc(elapsedTime / day) + "일 전";
	} else {
        var dY = date.getFullYear();
        var dM = addZero(date.getMonth()+1);
        var dD = addZero(date.getDate());
        var dH = addZero(date.getHours());
        var dm = addZero(date.getMinutes());
        var ds = addZero(date.getSeconds());
        
		elapsedText = dY + "-" + dM + "-" + dD + " " + dH + ":" + dm + ":" + ds;
	}
	
	return elapsedText;
}


function addZero(value){
    var IntValue = parseInt(value);
    
    if(IntValue < 10){
        IntValue = "0" + IntValue;
    }else{
        IntValue = String(IntValue);
    }

    return IntValue;

}


