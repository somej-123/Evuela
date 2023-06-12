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
    // 게시글 제목
    $board_title = $_POST['board_title'];
    // 게시글 카테고리_idx(소분류)
    $board_category = $_POST['board_category'];
    // 게시글 내용
    $board_contents = $_POST['board_contents'];
    // 게시글 ID
    $board_id = $_POST['board_id'];

    $sql = "SELECT board_category_type_idx, board_category_level FROM evuela_board_category WHERE board_category_idx = $board_category";

    // 카테고리 type 추출
    $categoryType = DBQuery($sql, 'select');
    // 게시글 카테고리(대분류)
    $board_categoryType = $categoryType['board_category_type_idx'];
    // 게시글 권한(대분류)
    $board_level = $categoryType['board_category_level'];
    // 카테고리 type 추출 끝

    // 이미지 파일 추출(idx번호)
    
    //board_id에 매칭된 img 파일
    $imgSql = "SELECT A.board_img_idx FROM evuela_board_img A WHERE A.board_id = '$board_id';";
    $imgArray = DBQuery($imgSql, 'selectRows');
    //idx 값만 추출하기 위한 배열 값
    $imgArrayValue = [];
    foreach($imgArray as $array){
        array_push($imgArrayValue, $array['board_img_idx']);
    }

    // idx 배열값 DB에 넣기 위해 직렬화
    $serializeImg = serialize($imgArrayValue);

    // error_log($serializeImg);

    // 이미지 파일 추출(idx번호) 끝

    // 게시판 생성
    // $sql = "INSERT INTO evuela_board (board_id, board_category_idx, board_categorytype_idx, board_title, board_contents, img_idx, board_level, user_id, user_level, createdate)
    // VALUES ('$board_id', $board_category, $board_categoryType, '$board_title', '$board_contents', '$serializeImg', $board_level, '$user_id', $user_level, now())";

    $sql = "UPDATE evuela_board
    SET board_category_idx = $board_category, board_categorytype_idx = $board_categoryType, board_title='$board_title', board_contents='$board_contents', img_idx='$serializeImg', board_level='$board_level', updatedate=NOW()
    WHERE board_id='$board_id' AND user_id='$user_id'";

    $updateBoard = DBQuery($sql, 'update');

    // 게시판 생성 결과 값 저장
    $result = new stdClass();

    if($updateBoard){
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