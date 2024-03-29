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
    <link href="./index/css/main.css" rel="stylesheet"/>
    <!-- favicon -->
    <link rel="icon" type="image/x-icon" href="./favicon.png">
    <!-- favicon end -->
    <script src="./index/js/main.js"></script>
    <title>EVUELA</title>
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


        <div id="BackgroundImg">
            <!-- <img src="./img/background_1920px.jpg"/> -->
        </div>

        <div class="container" id="headerContainer">
            <div id="headerText">
                <h1 id="headerTitle">EVUELA</h1>
                <h5 id="headerContents">I find peace in the rain</h5>
            </div>
            <div id="lineEffect">
                <div id="lineEffectLine"></div>
                <div id="lineEffectText">
                    <!-- <span id="arrowText"> Welcome to EVUELA　</span><i class="fas fa-cloud-rain fa-lg"></i> -->
                    <h5>View more info</h5>
                </div>
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
                    <?php if(!isset($_SESSION["signin"])){?>
                    <h4 id="navMenuLogin" class="navMenuText">LOGIN</h4>
                    <?php }
                    else{ ?>
                    <h4 id="navMenuOptions" class="navMenuText">MENU <i id="navMenuOptionsIcon" class="fas fa-caret-down"></i></h4>
                    <div id="navMenuOptionsDiv">
                        <h5 id="profileBtn" class="navMenuText">PROFILE</h5>
                        <h5 id="logoutBtn" class="navMenuText">LOGOUT</h5>
                    </div>
                    <?php } ?>
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