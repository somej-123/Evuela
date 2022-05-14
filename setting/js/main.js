"use strict";

var emailCheck = true;
var nameCheck = true;

$(document).ready(function(){

    $("#userInfo_managementTitle").on("click",()=>{
        $("#userInfo_managementUl").stop().slideToggle();
    });
    
})

function userEdit_emailCheck(value){
    emailCheck = false;
    var regEmail = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

    if(!regEmail.test(value)){
        $("#emailCheckInfo").css("display","block");
        $("#setting_userEmail").css("border-color","rgb(253, 15, 15)");
    }else{
        $("#emailCheckInfo").css("display","none");
        $("#setting_userEmail").css("border-color","#ced4da");
        emailCheck = true;
    }
}

function userEdit_nameCheck(value){
    nameCheck = false;
    const regExp = /[\{\}\[\]\/?.,;:|\)*~`!^\-_+<>@\#$%&\\\=\(\'\"]/g;
    const regSpace = /\s/g;
    const regNumber = /[0-9]/g;


    if(regExp.test(value)){
        showAlert("특수기호는 사용할 수 없습니다","error");
        $("#setting_userName").val("");
        return;
    }else if(regSpace.test(value)){
        showAlert("공백을 포함할 수 없습니다","error");
        $("#setting_userName").val("");
        return;
    }else if(regNumber.test(value)){
        showAlert("숫자를 포함할 수 없습니다 ","error");
        $("#setting_userName").val("");
        return;
    }else{
        nameCheck = true;
        return;
    }
}

function userEditBtn(){
    var _userName = $("#setting_userName").val();
    var _userEmail = $("#setting_userEmail").val();

    var regEmail = /^[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*@[0-9a-zA-Z]([-_.]?[0-9a-zA-Z])*.[a-zA-Z]{2,3}$/i;

    if(!regEmail.test(_userEmail)){
        emailCheck = false;
    }

    if(_userName == ""){
        showAlert("이름을 입력해주세요","error");
        return;
    }else if(_userEmail == ""){
        showAlert("이메일을 입력해주세요","error");
        return;
    }else if(nameCheck == false){
        showAlert("이름을 다시 확인해주세요","error");
        return;
    }else if(emailCheck == false){
        showAlert("이메일을 다시 확인해주세요","error");
        return;
    }else if(_userName != "" && _userEmail != "" && nameCheck == true && emailCheck == true){
        Swal.fire({
            // title: '비밀번호를 변경 하시겠습니까?',
            text: "회원정보를 변경 하시겠습니까?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: '수정',
            cancelButtonText: '취소'
          }).then((result) => {
            if (result.isConfirmed) {
                
                $.ajax({
                    url:"./userupdate.php",
                    data:{
                        user_name : _userName,
                        user_email : _userEmail
                    },
                    method:"POST",
                    dataType:"json",
                })
                .done((data)=>{
                    // console.log(data);
                    if(data){
                        alert("수정을 완료 하였습니다.");
                        // showAlert("회원수정을 완료 하였습니다","success");
                        location.reload(true);
                    }else{
                        alert("회원수정에 실패 하였습니다\n다시 시도해주세요");
                        // showAlert("회원수정에 실패하였습니다\n다시 시도해주세요","error");
                        location.reload(true);
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
        // console.log(_userName);
        // console.log(_userEmail);

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