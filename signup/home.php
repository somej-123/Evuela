<?php

session_start();

?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" rel="stylesheet">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="./css/main.css" rel="stylesheet"/>
    <script src="./js/main.js"></script>
    <title>EVUELA::SIGNUP</title>
</head>
<body>

    <!--PC header -->
    <header id="PCHeader">
        <!-- background effect -->
        <!-- <div id="Background_Effect">

        </div> -->
        <!-- background effect end -->

        <!-- video -->
        <!-- <div id="videoBackground">
            <video src="./img/rain.mp4" muted autoplay loop></video>
        </div> -->
        <!-- video end -->


        <div class="container" id="headerContainer">
            <!-- login box -->
            <div id="signupDiv">

                <h3>WELCOME TO EVUELA</h3>
                <form action="" method="post">
                    <ul id="signupDivUl">
                        <li>
                            <label for="user_id">ID</label>
                            <input type="text" name="user_id" id="user_id" required autocomplete="off" onKeyup="signCheck_ID(this.value)" maxlength="12" placeholder="5~12자의 영문, 숫자" />
                            <span class="IDInfo IDCss" id="availableID">사용 가능한 ID입니다</span>
                            <span class="IDInfo2 IDCss" id="alreadyUsedID">이미 존재하는 ID입니다</span>
                            <span class="IDInfo2 IDCss" id="moreCharactersID">5자 이상 입력해주세요</span>
                            <!-- oninvalid="this.setCustomValidity('ID를 입력해주세요')" -->
                        </li>
                        <li>
                            <label for="user_password">PASSWORD　<span id="user_password_show_btn" class="user_password_show" onclick="changePasswordType($(this))"><i id="user_password_show_icon" class="fas fa-eye"></i></span></label>
                            <input type="password" name="user_password" id="user_password" required autocomplete="off" onKeyup="signCheck_Password(this.value)" maxlength="18" placeholder="6 ~ 18자 영문, 숫자, 특수문자를 최소 한가지씩 조합"/>
                            <span class="passwordInfo passwordCss" id="availablePassword">사용 가능한 비밀번호 입니다</span>
                            <span class="passwordInfo2 passwordCss" id="notAvaliablePassword">사용 불가능한 비밀번호 입니다</span>
                            <span class="passwordInfo2 passwordCss" id="moreCharactersPassword">6글자 이상 작성해주세요</span>
                        </li>
                        <li>
                            <label for="user_passwordCheck">CONFIRM PASSWORD　<span id="user_passwordCheck_show_btn" class="user_passwordCheck_show" onclick="changePasswordCheckType($(this))"><i id="user_passwordCheck_show_icon" class="fas fa-eye"></i></span></label>
                            <input type="password" name="user_passwordCheck" id="user_passwordCheck" required autocomplete="off" onKeyup="signCheck_PasswordCheck(this.value)" placeholder="동일한 Password를 입력해주세요"/>
                            <span class="passwordCheckInfo passwordCheckCss" id="samePassword">비밀번호가 동일합니다</span>
                            <span class="passwordCheckInfo2 passwordCheckCss" id="unequalPassword">동일한 비밀번호를 입력해주세요</span>
                        </li>
                        <li>
                            <label for="user_email">EMAIL</label>
                            <input type="email" name="user_email" id="user_email" required autocomplete="off" onKeyup="signCheck_emailCheck(this.value)" placeholder="비밀번호 찾기에 사용됩니다."/>
                            <span class="emailCheckInfo emailCheckCss" id="notAvailableEmail">이메일 형식이 아닙니다</span>
                        </li>
                        <li>
                            <button type="button" id="signup_btn" onclick="CheckFormAfterSignUp();" class="btn btn-outline-secondary btn-lg">SIGN UP</button>
                        </li>
                    </ul>
                </form>
            </div>
        </div>

        <nav class="container" id="navMenu">
            <ul id="navMenuUl">
                <!-- <li>
                    <h4 id="navMenuMain" class="navMenuText">MAIN</h4>
                </li> -->
                <li>
                    <h4 id="navMenuInfo" class="navMenuText">INFO</h4>
                </li>
                <li>
                    <h4 id="navMenuBlog" class="navMenuText">BLOG</h4>
                </li>
                <li>
                    <h4 id="navMenuPicture" class="navMenuText">PICTURE</h4>
                </li>
                <li>
                    <h4 id="navMenuETC" class="navMenuText">ETC</h4>
                </li>
                <li>
                    <h4 id="navMenuLogin" class="navMenuText">LOGIN</h4>
                </li>
            </ul>
        </nav>

    </header>
    <!--PC header end -->

    <!-- Tab header -->

    <!-- <header id="TabHeader">

        <div id="TabBackgroundImg">
            <img src="./img/background_1280px.jpg"/>
        </div>

    </header> -->

    <!-- Tab header end -->
    
</body>
</html>