<?php

require_once '../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

    $nowPassword = $_POST['_nowPassword'];
    $newPassword = $_POST['_newPassword'];
    $user_id = $_SESSION["user_id"];

    $query = "SELECT * FROM evuela_user WHERE user_id='$user_id'";

    $userInfoResult = DBQuery($query,"select");
    // echo json_encode( $userInfoResult, JSON_UNESCAPED_UNICODE );

    if($userInfoResult[0] != null){

        if(password_verify($nowPassword, $userInfoResult["user_password"])){

            $user_password = password_hash($newPassword, PASSWORD_DEFAULT);

            $updateQuery = "UPDATE evuela_user SET user_password='$user_password' WHERE user_id='$user_id'";

            $userUpdatePasswordResult = DBQuery($updateQuery,"update");

            if($userUpdatePasswordResult){
                $data = "success";
                echo json_encode( $data, JSON_UNESCAPED_UNICODE );
            }
        }else{
            $data = "fail";
            echo json_encode( $data, JSON_UNESCAPED_UNICODE );
        }
    }else{
        $data = "noSearchID";
        echo json_encode( $data, JSON_UNESCAPED_UNICODE );
    }

}


?>