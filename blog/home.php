<?php session_start()?>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 공통부분 끝 -->

    <!-- blog header css,js 경로 -->
    <link href="./css/header.css" rel="stylesheet"/>
    <script src="./js/header.js"></script>
    <!-- blog header css,js 경로 끝 -->

    <!-- blog css,js 경로 -->
    <!-- <link href="./css/home.css" rel="stylesheet"/>
    <script src="./js/home.js"></script> -->
    <!-- blog css,js 경로 끝-->

    <title>EVUELA::BLOG</title>
</head>
<body>
    <!-- Blog Header 시작 -->
    <header>
        <nav>
            <!-- Blog Header 로고 컨텐츠 -->
            <div id="headerLeftContents">
                <div id="headerLeftLogoDiv">
                    <h3 id="headerLeftLogoTitle" onclick="location.href='../'">EVUELA</h3>
                </div>
            </div>
            <!-- Blog Header 로고 컨텐츠 끝-->

            <!-- Blog Header 메뉴 시작 -->
            <div id="headerRightContents">
                <div class="row" style="margin: 0; padding:0; height:100%">
                    <div class="col-8" style="margin: 0; padding:0;">
                       <div id="headerMenuFlexBox">
                            <div id="headerMenuInfoDiv">
                                <p id="headerMenuInfoP" onclick="location.href='../info/home'">INFO</p>
                            </div>
                            <div id="headerMenuBlogDiv">
                                <p id="headerMenuBlogP" onclick="location.href='../blog/home'">BLOG</p>
                            </div>
                            <div id="headerMenuPictureDiv">
                                <p id="headerMenuPictureP">PICTURE</p>
                            </div>
                            <div id="headerMenuEtcDiv">
                                <p id="headerMenuEtcP">ETC</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-4" style="margin: 0; padding:0;">
                        <div id="headerUserMenuBox">
                            <?php if(!isset($_SESSION["signin"])){?>
                                <p>LOGIN</p>
                            <?php }
                            else{ ?>
                            <p id="headerUserMenuP">MENU <i class="fas fa-caret-down"></i></p>
                            <div id="headerUserMenuDiv" style="display: none;">
                                <ul>
                                    <li>
                                        <a href="#">프로필</a>
                                    </li>
                                    <li>
                                        <a href="#">로그아웃</a>
                                    </li>
                                </ul>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Header 메뉴 끝-->
        </nav>
    </header>
    <!-- Blog Header 끝 -->

    <!-- Blog body 섹션 -->
    <section>

    </section>
    <!-- Blog Body 섹션 끝 -->
</body>
</html>