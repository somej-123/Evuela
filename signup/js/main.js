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
    passwordCheck = false;
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

function signCheck_PasswordCheck(value){

    passwordCheck2 = false;

    let password = $("#user_password").val();

    const regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,18}$/
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;

    if(regKor.test(value)){

        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#user_passwordCheck").val("");
        $("#user_password").css("border-color","#fff");
        return;

    }else if(regSpace.test(value)){

        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#user_passwordCheck").val("");
        $("#user_passwordCheck").css("border-color","#fff");
        return;

    }else if(value.length == 0){

        $(".passwordCheckCss").css("display","none");
        $("#user_passwordCheck").css("border-color","#fff");
        return;

    }else if(password != value){
        $(".passwordCheckCss").css("display","none");
        $("#unequalPassword").css("display","block");
        $("#user_passwordCheck").css("border-color","rgb(253, 15, 15)");
        return;

    }else if(password == value){
        $(".passwordCheckCss").css("display","none");
        $("#samePassword").css("display","block");
        $("#user_passwordCheck").css("border-color","rgb(0, 255, 0)");
        passwordCheck2 = true;
        return;
    }
}

function signCheck_emailCheck(value){
    emailCheck = false;
    var regExp = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

    if(!regExp.test(value)){
        $(".emailCheckCss").css("display","none");
        $("#notAvailableEmail").css("display","block");
        $("#user_email").css("border-color","rgb(253, 15, 15)");
    }else{
        $(".emailCheckCss").css("display","none");
        $("#user_email").css("border-color","rgb(0, 255, 0)");
        emailCheck = true;
    }
}


function changePasswordType(value){

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

function changePasswordCheckType(value){

    var className = $(value).attr("class");
    
    if(className == "user_passwordCheck_show"){
        $("#user_passwordCheck").attr("type","text");
        $("#user_passwordCheck_show_icon").attr("class","fas fa-eye-slash");
        $("#user_passwordCheck_show_btn").attr("class","user_passwordCheck_noshow");
    }else{
        $("#user_passwordCheck").attr("type","password");
        $("#user_passwordCheck_show_icon").attr("class","fas fa-eye");
        $("#user_passwordCheck_show_btn").attr("class","user_passwordCheck_show");
    }

}

function CheckFormAfterSignUp(){
    var _userID = $("#user_id").val();
    var _userPassword = $("#user_password").val();
    var _userEmail = $("#user_email").val();

    if(_userID == ""){
        showAlert("ID를 입력해주세요","error");
        return;
    }else if(_userPassword == ""){
        showAlert("password를 입력해주세요","error");
        return;
    }else if(_userEmail == ""){
        showAlert("email를 입력해주세요","error");
        return;
    }else if(IDCheck == false){
        showAlert("ID를 확인해주세요","error");
        return;
    }else if(passwordCheck == false){
        showAlert("password를 확인해주세요","error");
        return;
    }else if(passwordCheck2 == false){
        showAlert("동일한 password를 입력했는지 확인해주세요","error");
        return;
    }else if(emailCheck == false){
        showAlert("email를 확인해주세요","error");
        return;
    }else if(_userID != "" && _userPassword != "" && _userEmail != "" && IDCheck == true && passwordCheck == true && passwordCheck2 == true && emailCheck == true){
        showAlert("회원가입이 완료되었습니다.","success");
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