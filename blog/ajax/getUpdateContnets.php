<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

    $board_idx = $_GET['board'];

    // 게시글 정보 불러오기
    $board_contents_info_query = "AND board_idx = $board_idx";

    $board_sql = "SELECT a.*, b.board_category_name FROM evuela_board a
    LEFT JOIN evuela_board_category b ON (a.board_category_idx = b.board_category_idx)
    WHERE 1=1
    $board_contents_info_query;";

    $board_contents = DBQuery($board_sql, "select");
    error_log(var_export($board_contents, true));


    $result = new stdClass();

    // echo json_encode( $categoryList, JSON_UNESCAPED_UNICODE);

    if(count($board_contents) <= 0){ // 게시글 내용 

        $result->confirm = 0; // 결과가 없는 경우 0
        $result->data = $board_contents; // 결과가 없는 경우 빈값

        echo json_encode( $result, JSON_UNESCAPED_UNICODE);
    }else{

        $result->confirm = 1; //결과가 있는 경우 1
        $result->data = $board_contents; // 결과가 있는 경우 해당 값 리턴

        echo json_encode( $result, JSON_UNESCAPED_UNICODE);
    }
    
}


?>