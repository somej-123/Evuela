"use strict";
var IDCheck = false;
var passwordCheck = false;
var passwordCheck2 = false;
var emailCheck = false;

$(document).ready(function(){

    // ID Boolean 체크
    
    btnEvent();


});

function btnEvent(){

    // 메뉴 클릭 시 페이지 이동

    $("#navMenuInfo").on("click",function(){
        $(location).attr("href", "../info/home")
    });

    $("#navMenuLogin").on("click",function(){
        $(location).attr("href", "../login/home")
    });

    // 메뉴 클릭 시 페이지 이동 끝

    // 회원가입 관련 문

    // $("#user_id").on("keyup, input, keydown, change",()=>{
        

    //     $.ajax({
    //         url:"",
    //         data:"",
    //         method:"post",
    //         dataType:"json",
    //     }).done((data)=>{
    //         console.log(data);
    //     }).fail((data)=>{
    //         console.log(data);
    //     })
    // })

    // 회원가입 관련 문 끝

}

// ID 체크 정규식
function signCheck_ID(value){
    IDCheck = false;
    const regExp = /[~!@\#$%<>^&*\()\-=+_\’]/gi;
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;


    if(regExp.test(value)){
        // alert("특수 문자는 사용 할 수 없습니다.");
        showAlert("특수 문자는 사용 할 수 없습니다.","error");
        $("#user_id").val('');
        $(".IDCss").css("display","none");
        $("#user_id").css("border-color","#fff");
        return;
    }else if(regKor.test(value)){
        // alert("한글은 사용 할 수 없습니다.");
        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#user_id").val('');
        $(".IDCss").css("display","none");
        $("#user_id").css("border-color","#fff");
        return;
    }else if(regSpace.test(value)){
        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#user_id").val('');
        $(".IDCss").css("display","none");
        $("#user_id").css("border-color","#fff");
    }else if(value.length < 5){
        $(".IDCss").css("display","none");
        $("#moreCharactersID").css("display","block");
        $("#user_id").css("border-color","#fff");
        // console.log("5글자 이상의 ID를 입력해주세요");
        return;
    }else{
        if(value.length >= 5){
            $.ajax({
                url:"./idcheck.php",
                data:{user_ID : value},
                method:"POST",
                dataType:"json",
            })
            .done((data)=>{

                if(data){
                    IDCheck = true;
                    $(".IDCss").css("display","none");
                    $("#availableID").css("display","block");
                    $("#user_id").css("border-color","rgb(0, 255, 0)");
                }else{
                    IDCheck = false;
                    $(".IDCss").css("display","none");
                    $("#alreadyUsedID").css("display","block");
                    $("#user_id").css("border-color","rgb(253, 15, 15)");
                }
            })
            .fail((data)=>{
                IDCheck = false;
                // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
                showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
            })
        }

    }
}

function signCheck_Password(value){
    const regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,18}$/
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;

    if(regKor.test(value)){

        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#user_password").val('');
        $(".passwordCss").css("display","none");
        $("#user_password").css("border-color","#fff");
        return;

    }else if(regSpace.test(value)){

        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#user_password").val('');
        $(".passwordCss").css("display","none");
        $("#user_password").css("border-color","#fff");
        return;

    }else if(value.length < 8){
        $(".passwordCss").css("display","none");
        $("#moreCharactersPassword").css("display","block");
        $("#user_password").css("border-color","#fff");
        return;

    }else if(!regPassword.test(value)){

        $(".passwordCss").css("display","none");
        $("#notAvaliablePassword").css("display","block");
        $("#user_password").css("border-color","rgb(253, 15, 15)");
        return;

    }else{
        if(regPassword.test(value)){

            $(".passwordCss").css("display","none");
            $("#availablePassword").css("display","block");
            $("#user_password").css("border-color","rgb(0, 255, 0)");
            passwordCheck = true;
    
        }
    }
}

function chagePasswordType(value){

    var className = $(value).attr("class");
    
    if(className == "user_password_show"){
        $("#user_password").attr("type","text");
        $("#user_password_show_icon").attr("class","fas fa-eye-slash");
        $("#user_password_show_btn").attr("class","user_password_noshow");
    }else{
        $("#user_password").attr("type","password");
        $("#user_password_show_icon").attr("class","fas fa-eye");
        $("#user_password_show_btn").attr("class","user_password_show");
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
    
}