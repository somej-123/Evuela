"use strict";

$(document).ready(function(){
    $("#userWithdrawal").on("click",function(){
        Swal.fire({
            title: '회원 탈퇴를 하시겠습니까?',
            text: "사용자 정보가 삭제됩니다.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#198754',
            cancelButtonColor: '#d33',
            confirmButtonText: '탈퇴',
            cancelButtonText: '취소'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url:"./withdrawaluser.php",
                    data:{

                    },
                    method:"POST",
                    dataType:"json",
                })
                .done((data)=>{
                    if(data){
                        alert("회원탈퇴가 되었습니다.\n사이트를 이용해주셔서 감사합니다.");
                        location.href="../";
                        return;
                    }else{
                        showAlert("서버에 문제가 발생했습니다.\n나중에 다시 시도해주세요.","error");
                        return;
                    }
                })
                .fail((data)=>{
                    // alert("서버에 문제가 발생했습니다.\n다시 시도해주세요.");
                    showAlert("서버에 문제가 발생했습니다.\n다시 시도해주세요.","error");
                    return;
                })
            }
        })
    });
})



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