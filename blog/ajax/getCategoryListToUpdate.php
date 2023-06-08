<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{
    $result = new stdClass();

    $query = "SELECT * FROM evuela_board_category ORDER BY board_category_type_idx, board_category_idx";

    $categoryList = DBQuery($query,"selectRows");

    // echo json_encode( $categoryList, JSON_UNESCAPED_UNICODE);

    if(count($categoryList) < 0){

        $result->confirm = 0;
        $result->data = $categoryList;

        echo json_encode( $result, JSON_UNESCAPED_UNICODE);
    }else{

        $result->confirm = 1;
        $result->data = $categoryList;

        echo json_encode( $result, JSON_UNESCAPED_UNICODE);
    }
    
}


?>