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

    // 댓글 ID
    $comment_id = $_POST['comment_id'];
    // 댓글을 삭제할 유저
    $user_id = $_POST['deleteUser_id'];

    // 게시글 ID
    $board_id = $_POST['board_id'];

    // 댓글 삭제
    $sql = "DELETE FROM evuela_board_comment WHERE comment_id='$comment_id' AND user_id='$user_id';";

    $deleteComment = DBQuery($sql, 'delete');

    if($deleteComment){
        $commentSelectSql = "SELECT * FROM evuela_board_comment WHERE board_id = '$board_id' ORDER BY createdate DESC;";

        $commentSelectResult = DBQuery($commentSelectSql, 'selectRows');

        if($commentSelectResult){
            $result->error = true;
            $result->errorText = ""; // 에러 텍스트 띄우기
            $result->data = $commentSelectResult;
            echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
        }else{
            $result->error = true;
            $result->errorText = ""; // 에러 텍스트 띄우기
            $result->data = $commentSelectResult;
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