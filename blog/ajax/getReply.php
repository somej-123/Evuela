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

    // 게시글 ID
    $board_id = $_POST['board_id'];
    // 부모 댓글 ID
    $board_commentID = $_POST['comment_id'];

    // 게시판 생성
    $sql = "SELECT *
    FROM
        (
          SELECT A.*, B.comment_contents AS parent_comment FROM evuela_board_comment A
          LEFT JOIN evuela_board_comment B ON (B.comment_id = A.comment_parents_id)
            WHERE A.board_id = '$board_id'
          ORDER BY comment_parents_id, comment_id
         ) products_sorted,
        (
          SELECT @pv := '$board_commentID'
        ) initialisation
    WHERE find_in_set(comment_parents_id, @pv) > 0
    AND @pv := concat(@pv, ',', comment_id)
    ORDER BY createdate DESC;";

    error_log($sql);

    $selectReplyResult = DBQuery($sql, 'selectRows');

    error_log(var_export($selectReplyResult, true));

    if(count($selectReplyResult) > 0){
        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        $result->data = $selectReplyResult;
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