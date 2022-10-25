<!-- blog header css,js 경로 -->
<link href="./css/header.css" rel="stylesheet"/>
<script src="./js/header.js"></script>
<!-- blog header css,js 경로 끝 -->

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
                    <div class="col-9" style="margin: 0; padding:0;">
                       <div id="headerMenuFlexBox">
                            <div id="headerMenuInfoDiv">
                                <p id="headerMenuInfoP" onclick="location.href='../info/home'">INFO</p>
                            </div>
                            <div id="headerMenuBlogDiv">
                                <p id="headerMenuBlogP" class="selectMenu" onclick="location.href='../blog/home'">BLOG</p>
                                <div id="selectMenuLine"></div>
                            </div>
                            <div id="headerMenuPictureDiv">
                                <p id="headerMenuPictureP">PICTURE</p>
                            </div>
                            <div id="headerMenuEtcDiv">
                                <p id="headerMenuEtcP">ETC</p>
                            </div>
                       </div>
                    </div>
                    <div class="col-3" style="margin: 0; padding:0;">
                        <div id="headerUserMenuBox">
                            <?php if(!isset($_SESSION["signin"])){?>
                                <p class="btn btn-outline-primary" onclick="location.href='../login/home'">LOGIN</p>
                                <p class="btn btn-outline-success" onclick="location.href='../signup/home'">SIGNUP</p>
                            <?php }
                            else{ ?>
                            <p id="headerUserMenuP">MENU <i class="fas fa-caret-down"></i></p>
                            <div id="headerUserMenuDiv" style="display: none;">
                                <div class="headerUserMenuBorder" id="headerMenuProfileDiv">
                                    <p id="headerMenuProfileP" onclick="location.href='../setting/home'">
                                        PROFILE
                                    </p>
                                </div>
                                <div class="headerUserMenuBorder" id="headerMenuLogoutDiv">
                                    <p id="headerMenuLogoutP" onclick="location.href='../login/userSignout'">
                                        LOGOUT
                                    </p>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Blog Header 메뉴 끝-->

            <!-- Blog Mobile Header 시작 -->

            <div id="headerRightContents_M">
                <div id="headerRightMenubar_M">
                    <i id="menubar_M" class="fas fa-2x fa-bars"></i>
                </div>
                <div id="sideMenu_M" style="display: none;">
                    <div id="sideMenuHeader_M" class="row">
                    <?php if(!isset($_SESSION['signin'])){?>
                        <div class="col-6 sideMenuHeaderContents_M">
                            <p onclick="location.href='../login/home'">LOGIN</p>
                        </div>
                        <div class="col-6 sideMenuHeaderContents_M">
                            <p onclick="location.href='../signup/home'">SIGNUP</p>
                        </div>
                    <?php }else{?>
                        <div class="col-6 sideMenuHeaderContents_M">
                            <p onclick="location.href='../setting/home'">PROFILE</p>
                        </div>
                        <div class="col-6 sideMenuHeaderContents_M">
                            <p onclick="location.href='../login/userSignout'">LOGOUT</p>
                        </div>
                    <?php }?>
                    </div>
                    <div id="sideMenuContents_M">
                        <div id="sideMenuContents_M_InfoDiv" class="sideMenuContents_M_Div">
                            <h5 id="M_info_Title" class="sideMenuContents_M_Title" onclick="location.href='../info/home'">INFO</h5>
                            <!-- <ul id="M_info_ul">
                                <li></li>
                            </ul> -->
                        </div>
                        <div id="sideMenuContents_M_BlogDiv" class="sideMenuContents_M_Div">
                            <h5 id="M_blog_Title" class="sideMenuContents_M_Title" onclick="location.href='../blog/home'">BLOG</h5>
                                <!-- <ul id="M_blog_ul">
                                    <li></li>
                                </ul> -->
                        </div>
                        <div id="sideMenuContents_M_PictureDiv" class="sideMenuContents_M_Div">
                            <h5 id="M_picture_Title" class="sideMenuContents_M_Title">PICTURE</h5>
                        </div>
                        <div id="sideMenuContents_M_EtcDiv" class="sideMenuContents_M_Div">
                            <h5 id="M_etc_Title" class="sideMenuContents_M_Title">ETC</h5>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Blog Mobile Header 끝 -->
        </nav>
    </header>