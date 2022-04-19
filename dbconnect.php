<?php 

session_start();

class dbConf{

    public function dbConnect(){
        $host = "localhost";
        $user = "somej";
        $pw = "woojungho950217!";
        $dbName = "somej";
        
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
            return var_dump($row);
        }

    }
    // insert문
    else if($queryType == "insert"){
        $result = mysqli_query($conn, $query);

        if($result){
            return var_dump("성공적으로 등록이 완료됐습니다");
        }else{
            return var_dump("등록이 실패됐습니다");
        }

    }
    // update문
    else if($queryType == "update"){
        $result = mysqli_query($conn, $query);

    }
    // delete문
    else if($queryType == "delete"){
        $result = mysqli_query($conn, $query);

    }
}

// DBQuery("SELECT * FROM evuela_user","select");

// $sqlQeury = "INSERT INTO evuela_user (user_id, user_password, user_name, user_email, user_level, user_regdate, user_update)
// VALUES('somej','abcd','test123','test@gamil.com',2,NOW(),NOW());";
// DBQuery($sqlQeury,"insert")



?>