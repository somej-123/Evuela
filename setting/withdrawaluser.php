<?php

require_once '../dbconnect.php';

header("Content-Type: application/html; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{


    $user_id = $_SESSION["user_id"];

    $query = "DELETE FROM evuela_user WHERE user_id='$user_id'";

    $userUDeleteResult = DBQuery($query,"delete");

    if($userUDeleteResult){
        $data = true;
        echo json_encode( $data, JSON_UNESCAPED_UNICODE);
        session_destroy();
    }else{
        $data = false;
        echo json_encode( $data, JSON_UNESCAPED_UNICODE);
    }
}


?>