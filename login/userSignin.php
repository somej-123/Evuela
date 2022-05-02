<?php

require_once '../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");

// header("Content-Type: text/html; charset=UTF-8"); 
// header("Cache-Control: no-cache");
// header("Pragma: no-cache");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

    $user_id = $_POST['user_ID'];
    $user_password = $_POST['user_password'];

    $IDCheckResult = DBQuery("select * from evuela_user where user_id='$user_id'","select");


    if($IDCheckResult[0] != 0){

        if(password_verify($user_password, $IDCheckResult["user_password"])){

            $_SESSION["signin"] = true;
            $_SESSION["user_id"] = $IDCheckResult['user_id'];
            $_SESSION["user_name"] = $IDCheckResult['user_name'];
            $_SESSION["user_email"] = $IDCheckResult['user_email'];
            $_SESSION["user_level"] = $IDCheckResult['user_level'];
            $_SESSION["user_regdate"] = $IDCheckResult['user_regdate'];
            $_SESSION["user_update"] = $IDCheckResult['user_update'];

            $data = true;
            echo json_encode( $data, JSON_UNESCAPED_UNICODE );
        }else{
            $data = false;
            echo json_encode( $data, JSON_UNESCAPED_UNICODE );
        }
    }else{
        $data = false;
        echo json_encode( $data, JSON_UNESCAPED_UNICODE );
    }
}


?>