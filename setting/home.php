<?php

session_start();
if(!isset($_SESSION["signin"])){
    echo "<script>alert('로그인 후 이용해주세요')</script>";
    echo "<script>location.href='../login/home'</script>";
}
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- 공통부분 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://hangeul.pstatic.net/hangeul_static/css/nanum-gothic.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <!-- 공통부분 끝 -->
    
    <!-- info css,js 경로 -->
    <link href="./css/main.css" rel="stylesheet"/>
    <script src="./js/main.js"></script>
    <!-- info css,js 경로 끝-->

    <title>EVUELA::PROFILE</title>
</head>
<body>

    <!-- 헤더 시작 -->
    <?php 
        include_once("./header.php");
    ?>
    <!-- 헤더 끝 -->


    <!-- 메인 시작 -->

    <div id="mainContainer" class="container">
        <div id="mainContainerDiv" class="row">
            <!-- aside 메뉴바 -->
            <section id="settingMenu" class="col-sm-3">

            <h5 id="settingMenuTitle" class="mb-2">설정 <i id="settingMenuTitleIcon" class="fas fa-cog"></i></h5>

            <div id="userInfo_management">
                <h5 id="userInfo_managementTitle">회원정보 관리 <i id="userInfo_management_menubarIcon" class="fas fa-bars"></i></h5>
                <ul id="userInfo_managementUl">
                    <li id="userInfo_edit_btn" class="userInfo_select">- 기본 정보 및 수정</li>
                    <li id="userInfo_password_btn">- 비밀번호 수정</li>
                    <li id="userInfo_leave_btn">- 회원 탈퇴</li>
                </ul>
            </div>

            </section>
            <!-- aside 메뉴바 끝 -->

            <!-- main contents -->

            <section id="settingContents" class="col-sm-9">

                <h4 id="settingContents_title"><i class="fas fa-users-cog"></i> 기본 정보 및 수정</h4>
                <hr>
                <div id="settingContents_mainContentsDiv">

                    <!-- <p>회원 정보를 확인하고 수정할 수 있습니다.</p> -->
                    <div class="mb-3">
                        <label for="setting_userID" class="form-label label_text">아이디</label>
                        <input type="text" class="form-control" id="setting_userID" value="<?=$_SESSION["user_id"]?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="setting_userName" class="form-label label_text">이름</label>
                        <input type="text" class="form-control" id="setting_userName" value="<?=$_SESSION["user_name"]?>" >
                    </div>
                    <div class="mb-3">
                        <label for="setting_userEmail" class="form-label label_text">이메일</label>
                        <input type="text" class="form-control" id="setting_userEmail" value="<?=$_SESSION["user_email"]?>" >
                    </div>
                    <?php
                    switch($_SESSION["user_level"]){
                        case 0:
                            $userLevel = "관리자";
                        break;
                        case 2:
                            $userLevel = "회원";
                        break;
                    }
                    ?>
                    <div class="mb-3">
                        <label for="setting_userLevel" class="form-label label_text">등급</label>
                        <input type="text" class="form-control" id="setting_userLevel" value="<?=$userLevel?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="setting_userRegdate" class="form-label label_text">가입 날짜</label>
                        <input type="text" class="form-control" id="setting_userRegdate" value="<?=$_SESSION["user_regdate"]?>" disabled>
                    </div>
                    <div class="mb-3">
                        <label for="setting_userUpdate" class="form-label label_text">마지막 수정 날짜</label>
                        <input type="text" class="form-control" id="setting_userUpdate" value="<?=$_SESSION["user_update"]?>" disabled>
                    </div>

                    <button type="button" id="setting_userEditBtn" class="btn btn-success">수정</button>
                </div>

            </section>

            <!-- main contents 끝 -->
        </div>
    </div>

    <!-- 메인 끝 -->

    <!-- footer 시작 -->
    <?php 
        include_once("./footer.php");
    ?>
    <!-- footer 끝 -->

</body>
</html>