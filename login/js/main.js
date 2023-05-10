"use strict";

var scrollEventFlag = 0;

$(document).ready(function(){

    $("#navMenuInfo").on("click",function(){
        $(location).attr("href", "../info/home")
    })
    $("#navMenuLogin").on("click",function(){
        $(location).attr("href", "../login/home")
    });
    $("#navMenuBlog").on("click",function(){
        $(location).attr("href", "../blog/home");
    })


});
function enterkey(){
    if (window.event.keyCode == 13) {
    	// 엔터키가 눌렸을 때
        signIn();
    }
}

function signIn(){
    var _userID = $("#user_id").val();
    var _userPassword = $("#user_password").val();

    if(_userID == ""){
        showAlert("ID를 입력해주세요","error");
        return
    }else if(_userPassword == ""){
        showAlert("password를 입력해주세요","error");
        return
    }else if(_userID != "" && _userPassword != ""){
        $.ajax({
            url:"./userSignin.php",
            data:{
                user_ID : _userID,
                user_password : _userPassword,
            },
            method:"POST",
            dataType:"json",
        })
        .done((data)=>{

            if(data){
                // js 세션 등록 - 암호화
            
                // console.log("< Base64 인코딩 및 디코딩 >");
                var key = CryptoJS.enc.Utf8.parse(_userID);
                var base64 = CryptoJS.enc.Base64.stringify(key);
                // console.log("인코딩된 값 : " + base64);
                // var decrypt = CryptoJS.enc.Base64.parse(base64);
                // var hashData = decrypt.toString(CryptoJS.enc.Utf8);
                // 아이디
                sessionStorage.setItem("USE1", base64);


                //메인페이지로 이동
                location.href="../";
                return;
            }else{
                // console.log(data);
                showAlert("ID 또는 Password가 다릅니다\n다시 확인해주세요","error");
                return;
            }
        })
        .fail((data)=>{
            showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
        })
        return;
    }
}


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