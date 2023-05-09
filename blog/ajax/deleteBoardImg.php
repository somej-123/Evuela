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
    $imgTagIDArray = $_POST["imgTagIDArray"];

    $searchImgIDQuery = "SELECT * FROM evuela_board_img WHERE board_id = '$board_id';";
    $searchImgIDResult = DBQuery($searchImgIDQuery,"selectRows");
    
    $searchImgIDArray = [];

    foreach($searchImgIDResult as $value){
        array_push($searchImgIDArray, $value['board_img_id']);
    }

    $arrayResult = array_diff($searchImgIDArray, $imgTagIDArray);
    $arrayResult = array_values($arrayResult);

    // 이미지 삭제 처리 완료
    $result = new stdClass();

    if($arrayResult == null || $arrayResult == []){

        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기

    }else{
        
        foreach($arrayResult as $value){
            $deleteSelectImgQuery = "SELECT * FROM evuela_board_img WHERE board_id = '$board_id' AND board_img_id = '$value';";
            $deleteSelectImgResult = DBQuery($deleteSelectImgQuery,"select");
            unlink($_SERVER["DOCUMENT_ROOT"]."/blog/blogImg/".$deleteSelectImgResult['file_name']);

            $deleteDeleteImgQuery = "DELETE FROM evuela_board_img WHERE board_id = '$board_id' AND board_img_id = '$value';";
            $deleteDeleteImgResult = DBQuery($deleteDeleteImgQuery,"delete");
        }

        $result->error = true; //정상적일 경우 true, 실패할 경우 false
        $result->errorText = ""; // 에러 텍스트 띄우기
        echo json_encode($result, JSON_UNESCAPED_UNICODE);//json 데이터 보내기
    }

}
?>