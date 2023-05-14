<?php

require_once '../../dbconnect.php';

header("Content-Type: application/json; charset=utf-8");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

    $timestamp = time();

    $boardImgID = $timestamp;

    // 임시로 저장된 정보(tmp_name)
    $tempFile = $_FILES['files']['tmp_name'];
    
    $realFileName = $_FILES['files']['name'];

    // $resFile = $_SERVER["DOCUMENT_ROOT"]."/blog/blogImg/".$timestamp.$_FILES['files']['name'];

    $resFile = $_SERVER["DOCUMENT_ROOT"]."/blog/blogImg/".$timestamp.$realFileName;


    $imageUpload = move_uploaded_file($tempFile, $resFile);
    chmod($resFile, 0777);
    $fileSizeConfirm = false;

    $fileSize = filesize($resFile);

    //파일 사이즈 늘릴려면 php.ini에서 2M -> 10M으로 늘려줘야 한다
    if($fileSize > 10485760){
        $fileSizeConfirm = false;
    }else{
        $fileSizeConfirm = true;
    }

    $result = new stdClass();

    

    if($imageUpload == true && $fileSizeConfirm == true){

        //유저 LEVEL
        $user_level = $_POST['user_level'];
        //유저 ID
        $user_id = $_POST['user_id'];
        //게시글 ID
        $board_id = $_POST['board_id'];

        //이미지 url 경로

        $url = "../blog/blogImg/".$timestamp.$_FILES['files']['name'];

        // 저장된 파일 이름
        $saveFileName = $timestamp.$realFileName;

        // 이미지 사이즈 저장
        $imgSize = getimagesize($resFile);
        $imgWidth = $imgSize[0];
        $imgHeight = $imgSize[1];

        // 게시글 DB저장

        $sql = "INSERT INTO evuela_board_img (board_id, board_img_id, uesr_id, file_real_name, file_name, img_width, img_height, file_size, file_path, createdate)
                VALUES ('$board_id', '$boardImgID', '$user_id', '$realFileName', '$saveFileName', '$imgWidth', '$imgHeight', $fileSize, '$url', now())";

        $insertBoardImg = DBQuery($sql, 'insert');

        if($insertBoardImg){
            $result->error = true;
            $result->errorText = "";
            $result->url = $url;
            $result->imgID = $boardImgID;
            // $result->level = $user_level;
            // $result->id = $user_id;
            // $result->board_id = $board_id;
            echo json_encode($result, JSON_UNESCAPED_UNICODE);
        }else{
            $result->error = false;
            $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
        }

    }else{
        $result->error = false;
        if($fileSizeConfirm == false){
            $result->errorText = "최대 파일 사이즈는 10MB입니다.";
            unlink($resFile);
        }else{
            $result->errorText = "서버에 문제가 발생하였습니다.\n담당자에게 문의해주세요";
        }
        
        echo json_encode($result, JSON_UNESCAPED_UNICODE);
    }
    // error_log(var_export($_FILES['files']));
    // // error_log($_FILES['file']);
    // //업로드 허용 확장자
    // $allowed_ext = array('jpg','jpeg','png','gif');

    // //결과를 담을 변수
    // $result = array();
    // foreach($_FILES['files']['name'] as $f=>$name) {
    //     $name = $_FILES['files']['name'][$f];
        
    //     //확장자 추출
    //     $exploded_file = strtolower(substr(strrchr($name, '.'), 1));
        
    //     //변경할 파일명(중복되지 않게 처리하기 위해 파일명을 변경해 줍니다.)
    //     $thisName = date("YmdHis",time())."_".md5($name).".".$exploded_file;
        
    //     //업로드 파일(업로드 경로/변경할 이미지 파일명)
    //     $uploadFile = $_SERVER['DOCUMENT_ROOT']."/blog/img/".$thisName;
    //     if(in_array($exploded_file, $allowed_ext)) {
    //         if(move_uploaded_file($_FILES['files']['tmp_name'][$f], $uploadFile)){
    //             //파일을 업로드 폴더로 옮겨준후 $result 에 해당 경로를 넣어줍니다.
    //             array_push($result, "/".$uploadFile);
    //         }
    //     }
    // }

    // echo json_encode($result, JSON_UNESCAPED_UNICODE);
}


?>