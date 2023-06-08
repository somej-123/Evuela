<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../' 
        </script>");
}else{

    $board_id = $_POST['board_id'];

    // 이미지 경로 추출
    $searchImgIDQuery = "SELECT * FROM evuela_board_img WHERE board_id = '$board_id';";
    $searchImgIDResult = DBQuery($searchImgIDQuery,"selectRows");

    // 이미지 파일 삭제
    foreach($searchImgIDResult as $value){
        unlink($_SERVER["DOCUMENT_ROOT"]."/blog/blogImg/".$value['file_name']);
    }

    //이미지 데이터 삭제
    $imgDeleteAllQuery = "DELETE FROM evuela_board_img WHERE board_id = '$board_id';";
    $imgDeleteAllResult = DBQuery($imgDeleteAllQuery,"delete");

    // 게시글 댓글 삭제
    $boardCommentDeleteQuery = "DELETE FROM evuela_board_comment WHERE board_id = '$board_id';";
    $boardCommentDeleteResult = DBQuery($boardCommentDeleteQuery,"delete");

    $boardDeleteQuery = "DELETE FROM evuela_board WHERE board_id = '$board_id';";
    $boardDeleteResult = DBQuery($boardDeleteQuery,"delete");
    
    // 이미지 크기 변환
    $result = new stdClass();

    if($boardDeleteResult){
        // echo "<script>alert('게시글이 삭제됐습니다.')</script>";
        // echo "<script>location.href='../home'</script>";
        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }else{
        $result->error = false;
        $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }

    // array값 확인
    // error_log(var_export($변수명, true));
    // 단일 값 확인
    // error_log($변수명);

}
?>