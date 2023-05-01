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
    //   나가기 버튼 클릭(블로그 홈 페이지)
    $("#viewToHomeBtn").on('click',()=>{
        location.href="./home";
    });
});


// summernote 이미지 저장

function setImgFile(files, editor){

    // userID 값 저장
    var userID = $("#user_id").val();
    // userLevel 값 저장
    var userLevel = $("#user_level").val();
    // boardID 값 저장
    var boardID = $("#board_id").val();

    // 이미지 파일 체크
    var imgFilecheck = false;
    // 확장자 정규식
    var reg = /(.*?)\.(gif|jpg|png|jepg)$/; //허용할 확장자

    // 확장자 검사

    for(var i=0; i<files.length; i++){
        if(!files[i].name.match(reg)){
            
            showAlert("이미지는 gif, jpg, png, jepg 파일만 업로드가 가능합니다.","error");
            imgFilecheck = false;
            return;
        }else{
            imgFilecheck = true;
        }
    }

    // console.log(imgFilecheck);

    if(imgFilecheck == true){

        for(var i=0; i<files.length; i++){

            var formData = new FormData();
            formData.append("files",files[i]);
            formData.append("user_id",userID);
            formData.append("user_level",userLevel);
            formData.append("board_id",boardID);

            $.ajax({
                url:'./ajax/setSummernoteImgUpload.php',
                data:formData,
                cache:false,
                contentType:false,
                processData:false,
                type:'POST',
                success:function(data){
                    //alert(data);
                    if(data.error){
                        // var dataUrl = ".."+data.url.substr(19);
                        // // console.log(dataUrl)
                        // var image = $('<img>').attr('src', '' + dataUrl); // 에디터에 img 태그로 저장을 하기 위함
                        var image = $('<img>').attr('src', '' + data.url); // 에디터에 img 태그로 저장을 하기 위함
                        $('#mainSection_Body_view_summernote').summernote("insertNode", image[0]); // summernote 에디터에 img 태그를 보여줌
                        return;
                    }else{
                        showAlert(data.errorText, "error");
                        return;
                    }
                },
                error:function(data){
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                    return;
                }
            })
        }

    }

}

// summernote 이미지 저장 끝





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

