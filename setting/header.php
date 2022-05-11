<!-- header css, js 경로 -->
<link href="./css/header.css" rel="stylesheet"/>
<script src="./js/header.js"></script>
<!-- header css, js 경로 끝-->


<header>
        <nav class="container">
            <div class="row" style="height: 100%;">
                <div class="col-3" id="navTitle">
                    <h1><a href="../">EVUELA</a></h1>
                </div>
                <div class="col-9" id="navMenu">
                    <ul id="navMenuUl">
                        <li>
                            <h5><a href="../info/home">INFO</a></h5>
                        </li>
                        <li>
                            <h5><a href="#">BLOG</a></h5>
                        </li>
                        <li>
                            <h5><a href="#">PICTURE</a></h5>
                        </li>
                        <li>
                            <h5><a href="#">ETC</a></h5>
                        </li>
                        <?php if(!isset($_SESSION['signin'])){?>
                        <li>
                            <h5><a href="../login/home">LOGIN</a></h5>
                        </li>
                        <?php }else{?>
                        <li>
                            <h5><a href="../setting/home">PROFILE</a></h5>
                        </li>
                        <li>
                            <h5><a href="../login/userSignout">LOGOUT</a></h5>
                        </li>
                        <?php }?>
                    </ul>
                </div>
                <div class="col-9" id="mobile_navMenuDiv">
                    <div id="mobile_navMenuToggleBtn" class="pe-3">
                        <i class="fas fa-2x fa-bars"></i>
                    </div>
                </div>
            </div>
        </nav>
        <div id="mobile_navMenu">
            <ul>
                <li>
                    <h5><a href="../info/home">INFO</a></h5>
                </li>
                <li>
                    <h5><a href="#">BLOG</a></h5>
                </li>
                <li>
                    <h5><a href="#">PICTURE</a></h5>
                </li>
                <li>
                    <h5><a href="#">ETC</a></h5>
                </li>
                <?php if(!isset($_SESSION['signin'])){?>
                    <li>
                        <h5><a href="../login/home">LOGIN</a></h5>
                    </li>
                    <?php }else{?>
                    <li>
                        <h5><a href="../setting/home">PROFILE</a></h5>
                    </li>
                    <li>
                        <h5><a href="../login/userSignout">LOGOUT</a></h5>
                    </li>
                <?php }?>
            </ul>
        </div>
    </header>