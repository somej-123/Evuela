"use strict";

var passwordCheck = false;
var passwordCheck2 = false;


$(document).ready(function(){

    $("#userInfo_managementTitle").on("click",()=>{
        $("#userInfo_managementUl").stop().slideToggle();
    });
    
});


function UpdateCheck_nowPassword(value){
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;

    if(regKor.test(value)){

        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#setting_nowPassword").val('');
        return;

    }else if(regSpace.test(value)){

        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#setting_nowPassword").val('');
        return;

    }
}

function UpdateCheck_newPassword(value){
    passwordCheck = false;
    const regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,18}$/
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;

    if(regKor.test(value)){

        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#setting_newPassword").val('');
        $(".passwordCss").css("display","none");
        $("#setting_newPassword").css("border-color","#ced4da");
        return;

    }else if(regSpace.test(value)){

        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#setting_newPassword").val('');
        $(".passwordCss").css("display","none");
        $("#setting_newPassword").css("border-color","#ced4da");
        return;

    }else if(value.length < 8){
        $(".passwordCss").css("display","none");
        $("#moreCharactersPassword").css("display","block");
        $("#setting_newPassword").css("border-color","#ced4da");
        return;

    }else if(!regPassword.test(value)){
        $(".passwordCss").css("display","none");
        $("#notAvaliablePassword").css("display","block");
        $("#setting_newPassword").css("border-color","rgb(253, 15, 15)");
        return;

    }else{
        if(regPassword.test(value)){
            $(".passwordCss").css("display","none");
            $("#availablePassword").css("display","block");
            $("#setting_newPassword").css("border-color","rgb(0, 153, 0)");
            passwordCheck = true;
    
        }
    }
}

function UpdateCheck_newPasswordConfirm(value){

    passwordCheck2 = false;

    let password = $("#setting_newPassword").val();

    const regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,18}$/
    const regKor = /[ㄱ-ㅎ|ㅏ-ㅣ|가-힣]/;
    const regSpace = /\s/g;

    if(regKor.test(value)){

        showAlert("한글은 사용 할 수 없습니다.","error");
        $("#setting_newPasswordConfirm").val("");
        $(".passwordCheckCss").css("display","none");
        $("#setting_newPasswordConfirm").css("border-color","#ced4da");
        return;

    }else if(regSpace.test(value)){

        showAlert("띄어쓰기는 사용할 수 없습니다.","error");
        $("#setting_newPasswordConfirm").val("");
        $(".passwordCheckCss").css("display","none");
        $("#setting_newPasswordConfirm").css("border-color","#ced4da");
        return;

    }else if(value.length == 0){
        $(".passwordCheckCss").css("display","none");
        $("#setting_newPasswordConfirm").css("border-color","#ced4da");
        return;

    }else if(password != value){
        $(".passwordCheckCss").css("display","none");
        $("#unequalPassword").css("display","block");
        $("#setting_newPasswordConfirm").css("border-color","rgb(253, 15, 15)");
        return;

    }else if(password == value){
        $(".passwordCheckCss").css("display","none");
        $("#samePassword").css("display","block");
        $("#setting_newPasswordConfirm").css("border-color","rgb(0, 153, 0)");
        passwordCheck2 = true;
        return;
    }
}

function nowChangePasswordType(value){

    var className = $(value).attr("class");
    
    if(className == "fas fa-eye"){
        $("#setting_nowPassword").attr("type","text");
        $("#nowPasswordIcon").attr("class","fas fa-eye-slash");
    }else{
        $("#setting_nowPassword").attr("type","password");
        $("#nowPasswordIcon").attr("class","fas fa-eye");
    }

}
function newChangePasswordType(value){

    var className = $(value).attr("class");
    
    if(className == "fas fa-eye"){
        $("#setting_newPassword").attr("type","text");
        $("#newPasswordIcon").attr("class","fas fa-eye-slash");
    }else{
        $("#setting_newPassword").attr("type","password");
        $("#newPasswordIcon").attr("class","fas fa-eye");
    }

}
function newChangePasswordConfrimType(value){

    var className = $(value).attr("class");
    
    if(className == "fas fa-eye"){
        $("#setting_newPasswordConfirm").attr("type","text");
        $("#newPasswordConfirmIcon").attr("class","fas fa-eye-slash");
    }else{
        $("#setting_newPasswordConfirm").attr("type","password");
        $("#newPasswordConfirmIcon").attr("class","fas fa-eye");
    }

}

function userPasswordChange(){
    const nowPassword = $("#setting_nowPassword").val();
    const newPassword = $("#setting_newPassword").val();
    const newPasswordCheck = $("#setting_newPasswordConfirm").val();

    const regPassword = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[$@$!%*#?&])[A-Za-z\d$@$!%*#?&]{6,18}$/;

    if(!regPassword.test(newPassword)){
        passwordCheck = false;
    }

    if(nowPassword == newPassword && nowPassword != ""){
        showAlert("기존 비밀번호를 사용할 수 없습니다.","error");
        return;
    }else if(nowPassword == ""){
        showAlert("현재 비밀번호를 입력해주세요","error");
        return;
    }else if(newPassword == ""){
        showAlert("새로운 비밀번호를 입력해주세요","error");
        return;
    }else if(newPasswordCheck == ""){
        showAlert("새로운 비밀번호 확인을 입력해주세요","error");
        return;
    }else if(!passwordCheck){
        showAlert("새로운 비밀번호를 확인 해주세요","error");
        return;
    }else if(!passwordCheck2){
        showAlert("동일한 새로운 비밀번호를 입력했는지 확인해주세요","error");
        return;
    }else if(nowPassword != newPassword && nowPassword != "" && newPassword != "" && newPasswordCheck != "" && passwordCheck == true && passwordCheck2 == true){
        Swal.fire({
            // title: '비밀번호를 변경 하시겠습니까?',
            text: "비밀번호를 변경 하시겠습니까?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '수정',
            cancelButtonText: '취소'
          }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url:"./userpasswordupdate.php",
                    data:{
                        _nowPassword : nowPassword,
                        _newPassword : newPassword
                    },
                    method:"POST",
                    dataType:"json",
                })
                .done((data)=>{
                    if(data == "success"){
                        alert("수정을 완료 했습니다\n다시 로그인 해주세요");
                        location.href="../login/userSignout";
                        return;
                    }else if(data == "fail"){
                        Swal.fire({
                            icon: 'error',
                            title: "",
                            text: "현재 비밀번호가 다릅니다\n다시 입력 해주세요",
                            footer: ""
                          })
                        return;
                    }else if(data == "noSearchID"){
                        Swal.fire({
                            icon: 'error',
                            title: "",
                            text: "ID를 찾을 수 없습니다\n다시 시도해주세요",
                            footer: ""
                          })
                        return;
                    }
                })
                .fail((data)=>{
                    // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                    return;
                })
                // showAlert("회원가입이 완료되었습니다.","success");
                return;

            }
        })
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