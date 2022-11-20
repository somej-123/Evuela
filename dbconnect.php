<?php 

session_start();

if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{

class dbConf{

    public function dbConnect(){

        
        $connect = mysqli_connect($host, $user, $pw, $dbName);

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


}

?>