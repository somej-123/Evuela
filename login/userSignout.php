<?php

require_once '../dbconnect.php';

header("Content-Type: text/html; charset=utf-8");

// header("Content-Type: text/html; charset=UTF-8"); 
// header("Cache-Control: no-cache");
// header("Pragma: no-cache");


if($_SERVER['HTTP_REFERER'] == '' || $_SERVER['HTTP_REFERER'] == null){
    exit("<script>
        alert('잘못된 접근 경로 입니다.')
        location.href='../'
        </script>");
}else{
    echo "<script>sessionStorage.clear();</script>";
    session_destroy();
    exit("<script>location.href='../'</script>");
}
?>