<?php 

if(!isset($_SESSION)){
    session_start();
}

// if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
//     exit("<script>
//         alert('잘못된 접근 경로 입니다.')
//         location.href='../'
//         </script>");
// }else{

class dbConf{

    public function dbConnect(){

        
        $connect = mysqli_connect($host, $user, $pw, $dbName);

        // if use port
        // $port = "13306";
        // $connect = mysqli_connect($host, $user, $pw, $dbName, $port);

        return $connect;
    }

}


function DBQuery($query,$queryType){
    $connectDB = new dbconf();

    $conn = $connectDB->dbConnect();

    // select문
    if($queryType == "select"){
        $result = mysqli_query($conn, $query);

        while($row = mysqli_fetch_array($result)){
            // return var_dump($row);
            return $row;
        }

    }
    // select문 여러개
    else if($queryType == "selectRows"){
        $result = mysqli_query($conn, $query);

        $rows = [];

        while($row = mysqli_fetch_array($result)){
            // return var_dump($row);
            array_push($rows,$row);
        }

        return $rows;


    }
    // count 수
    else if($queryType == "count"){
        $result = mysqli_query($conn, $query);

        $total_rows = mysqli_num_rows($result);

        return $total_rows;


    }
    // insert문
    else if($queryType == "insert"){
        $result = mysqli_query($conn, $query);

        if($result){
            // return var_dump("성공적으로 등록이 완료됐습니다");
            return $result;
        }else{
            // return var_dump("등록이 실패됐습니다");
            return $result;
        }

    }
    // update문
    else if($queryType == "update"){
        $result = mysqli_query($conn, $query);

        if($result){
            // return var_dump("성공적으로 등록이 완료됐습니다");
            return $result;
        }else{
            // return var_dump("등록이 실패됐습니다");
            return $result;
        }

    }
    // delete문
    else if($queryType == "delete"){
        $result = mysqli_query($conn, $query);

        if($result){
            // return var_dump("성공적으로 등록이 완료됐습니다");
            return $result;
        }else{
            // return var_dump("등록이 실패됐습니다");
            return $result;
        }
    }
}
    // 디버그
    // array값 확인
    // error_log(var_export($변수명, true));
    // 단일 값 확인
    // error_log($변수명);

    //세션 정보
    // $_SESSION["signin"] = true;
    // $_SESSION["user_id"] = $IDCheckResult['user_id'];
    // $_SESSION["user_name"] = $IDCheckResult['user_name'];
    // $_SESSION["user_email"] = $IDCheckResult['user_email'];
    // $_SESSION["user_level"] = $IDCheckResult['user_level'];
    // $_SESSION["user_regdate"] = $IDCheckResult['user_regdate'];
    // $_SESSION["user_update"] = $IDCheckResult['user_update'];

// }

?>