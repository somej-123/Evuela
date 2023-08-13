<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{
    // ajax 결과 값 담는 곳
    $result = new stdClass();

    // 유저 ID
    $user_id = $_POST['user_id'];
    // 유저 권한
    $user_level = $_POST['user_level'];
    // 게시글 ID
    $board_id = $_POST['board_id'];
    // 게시글 카테고리 index
    $board_category_idx = $_POST['board_category_idx'];
    // 게시글 카테고리 타입 index
    $board_categorytype_idx = $_POST['board_categorytype_idx'];
    // 게시글 권한
    $board_level = $_POST['board_level'];
    // 댓글 내용
    $comment_contents = htmlspecialchars($_POST['comment_contents']);
    // 댓글 ID
    $comment_id = time();

    // 게시판 생성
    $sql = "INSERT INTO evuela_board_comment (comment_id, board_id, board_category_idx, board_categorytype_idx, comment_contents, board_level, user_id, user_level, createdate)
    VALUES ('$comment_id', '$board_id', $board_category_idx, $board_categorytype_idx, '$comment_contents', '$board_level', '$user_id', $user_level, now())";

    $createComment = DBQuery($sql, 'insert');

    if($createComment){

        $commentSelectSql = "SELECT * FROM evuela_board_comment WHERE board_id = '$board_id' AND comment_parents_id IS NULL ORDER BY createdate DESC;";

        error_log($commentSelectSql);

        $commentSelectResult = DBQuery($commentSelectSql, 'selectRows');

        if($commentSelectResult){
            $result->error = true; //정상적일 경우 true, 실패할 경우 false
            $result->errorText = ""; // 에러 텍스트 띄우기
            $result->data = $commentSelectResult;
            echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
        }else{
            $result->error = false;
            $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
            echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기    
        }
        
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