<?php

require_once '../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

    $user_id = $_POST['user_ID'];
    $user_password = password_hash($_POST["user_password"], PASSWORD_DEFAULT);
    $user_email = $_POST["user_email"];

    $query = "INSERT INTO evuela_user (user_id, user_password, user_email, user_regdate, user_update)
    VALUES('$user_id','$user_password','$user_email',NOW(),NOW());";

    $signupResult = DBQuery($query,"insert");

    if($signupResult){
        $data = true;
        echo json_encode( $data, JSON_UNESCAPED_UNICODE);
    }else{
        $data = false;
        echo json_encode( $data, JSON_UNESCAPED_UNICODE);
    }
}


?>