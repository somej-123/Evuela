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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 공통부분 끝 -->
    
    <!-- info css,js 경로 -->
    <link href="./css/changepassword.css" rel="stylesheet"/>
    <script src="./js/changepassword.js"></script>
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
                    <li id="userInfo_edit_btn" onclick="location.href='./home'">- 기본 정보 및 수정</li>
                    <li id="userInfo_password_btn"  class="userInfo_select" onclick="location.href='./changepassword'">- 비밀번호 수정</li>
                    <li id="userInfo_leave_btn">- 회원 탈퇴</li>
                </ul>
            </div>

            </section>
            <!-- aside 메뉴바 끝 -->

            <!-- main contents -->

            <section id="settingPasswordContents" class="col-sm-9">

                <h4 id="settingPasswordContents_title"><i class="fas fa-lock"></i> 비밀번호 수정</h4>
                <hr>
                <div id="settingPasswordContents_mainContentsDiv">

                    <div class="mb-3">
                        <label for="setting_nowPassword" class="form-label label_text">현재 비밀번호 <i class="fas fa-eye" id="nowPasswordIcon" onclick="nowChangePasswordType(this)"></i></label>
                        <input type="password" class="form-control" id="setting_nowPassword" onKeyup="UpdateCheck_nowPassword(this.value)">
                    </div>
                    <div class="mb-3">
                        <label for="setting_newPassword" class="form-label label_text">새로운 비밀번호 <i class="fas fa-eye" id="newPasswordIcon" onclick="newChangePasswordType(this)"></i></label>
                        <input type="password" class="form-control" id="setting_newPassword" onKeyup="UpdateCheck_newPassword(this.value)">
                        <span class="passwordInfo passwordCss" id="availablePassword">사용 가능한 비밀번호 입니다</span>
                        <span class="passwordInfo2 passwordCss" id="notAvaliablePassword">사용 불가능한 비밀번호 입니다</span>
                        <span class="passwordInfo2 passwordCss" id="moreCharactersPassword">8글자 이상 작성해주세요</span>
                    </div>
                    <div class="mb-3">
                        <label for="setting_newPasswordConfirm" class="form-label label_text">새로운 비밀번호 확인 <i class="fas fa-eye" id="newPasswordConfirmIcon" onclick="newChangePasswordConfrimType(this)"></i></label>
                        <input type="password" class="form-control" id="setting_newPasswordConfirm" onKeyup="UpdateCheck_newPasswordConfirm(this.value)">
                        <span class="passwordCheckInfo passwordCheckCss" id="samePassword">비밀번호가 동일합니다</span>
                        <span class="passwordCheckInfo2 passwordCheckCss" id="unequalPassword">동일한 비밀번호를 입력해주세요</span>
                    </div>
                    <button type="button" id="setting_changePasswordBtn" onclick="userPasswordChange()" class="btn btn-success">수정</button>
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