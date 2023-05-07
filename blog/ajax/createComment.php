<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{
    
    // 유저 ID
    $user_id = $_POST['user_id'];
    // 유저 권한
    $user_level = $_POST['user_level'];
    // 게시글 ID
    $board_id = $_POST['board_id'];
    // 게시글 카테고리 index
    $board_category_idx = $_POST['board_category_idx'];
    // 게시글 카테고리 타입 index
    $board_contents = $_POST['board_categorytype_idx'];
    // 게시글 권한
    $board_level = $_POST['board_level'];
    // 댓글 내용
    $comment_contents = $_POST['comment_contents'];

    // 게시판 생성
    $sql = "INSERT INTO evuela_board (board_id, board_category_idx, board_categorytype_idx, board_title, board_contents, img_idx, board_level, user_id, user_level, createdate)
    VALUES ('$board_id', $board_category, $board_categoryType, '$board_title', '$board_contents', '$serializeImg', $board_level, '$user_id', $user_level, now())";

    $createBoard = DBQuery($sql, 'insert');

    // 게시판 생성 결과 값 저장
    $result = new stdClass();

    if($createBoard){
        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }else{
        $result->error = false;
        $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }

    // 게시판 생성 끝


    // 디버그
    // error_log(var_export($category, true));
    // error_log(var_export($imgArray, true));
}


?>