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

    $searchImgIDQuery = "SELECT * FROM evuela_board_img WHERE board_id = '$board_id';";
    $searchImgIDResult = DBQuery($searchImgIDQuery,"selectRows");

    foreach($searchImgIDResult as $value){
        unlink($_SERVER["DOCUMENT_ROOT"]."/blog/blogImg/".$value['file_name']);
    }

    $imgDeleteAllQuery = "DELETE FROM evuela_board_img WHERE board_id = '$board_id';";

    $imgDeleteAllResult = DBQuery($imgDeleteAllQuery,"delete");

    // 이미지 크기 변환
    $result = new stdClass();

    if($imgDeleteAllResult){
        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }else{
        $result->error = false;
        $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }

}
?>