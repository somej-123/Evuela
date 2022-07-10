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
    <!-- BLOG헤더 시작 -->
    <header>
        <div id="headerTop" class="row">
            <div id="headerTopLeftContents" class="col-7">
                <div id="headerTopLeftContentsSe" class="row">
                    <div id="headerTopTitleDiv" class="col-2">
                        <h3 id="headerTopTitle"><a href="../">EVUELA</a></h3>
                    </div>
                    <div class="col-10">
                        <ul id="headerTopLeftMenu">
                            <li><a href="../info/home">INFO</a></li>
                            <li><a href="../blog/home">BLOG</a></li>
                            <li><a href="#">PICTURE</a></li>
                            <li><a href="#">ETC</a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div id="headerTopRightContents" class="col-5">
                <ul id="headerTopRightMenu">
                    <li><a href="../login/home">LOGIN</a></li>
                    <li><a href="../signup/home">SIGNUP</a></li>
                </ul>
            </div>
        </div>
        <div id="headerBackgroundImgDiv">
            <div id="headerBackgroundImgTitle" class="container">
                <h1>EVUELA BLOG</h1>
                <br>
                <p>나만의 이야기를 작성하고 공유하는 공간입니다.</p>
                <!-- <p>테스트 단계이므로 언제든지 내용이 변경 및 삭제될 수 있습니다.</p> -->
            </div>
        </div>
    </header>
    <!-- BLOG헤더 끝 -->
    <!-- BLOG 메인 컨텐츠 시작 -->
    <section id="mainContents">
        <div id="mainContentsDiv" class="container">
            <!-- 메인 컨텐츠 헤더 시작 -->
            <div id="mainContentsHeader" class="row">
                <div id="mainContentsHeaderLeft" class="col-8">
                    <ul id="mainContentsHeaderLeftUl">
                        <li>
                            <h5 class="mainContentsHeaderLeftTitle TitleSelect">전체 게시판</h5>
                        </li>
                        <li>
                            <h5 class="mainContentsHeaderLeftTitle">자유 게시판</h5>
                        </li>
                        <li>
                            <h5 class="mainContentsHeaderLeftTitle">개발자 노트</h5>
                        </li>
                        <li>
                            <h5 class="mainContentsHeaderLeftTitle">문의사항</h5>
                        </li>
                    </ul>
                </div>
                <div id="mainContentsHeaderRight" class="col-4">
                    <div id="mainContentsHeaderRightSearchDiv">
                        <div class="input-group">
                            <input id="searchBox" type="search" class="form-control" aria-label="Text input with segmented dropdown button">
                            <button type="button" class="btn btn-outline-primary"><i class="fas fa-search"></i></button>
                            <button type="button" class="btn btn-outline-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="visually-hidden">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li><a class="dropdown-item" href="#">제목 검색</a></li>
                                <li><a class="dropdown-item" href="#">내용 검색</a></li>
                                <li><a class="dropdown-item" href="#">태그 검색</a></li>
                                <li><a class="dropdown-item" href="#">사용자 검색</a></li>
                                <!-- <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="#">Separated link</a></li> -->
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- 메인 컨텐츠 헤더 끝 -->
            <!-- 메인 컨텐츠 내용 시작 -->

            <div id="mainContentsBody" class="row">
                <div id="mainContentsBodyAside" class="col-3">
                    <div id="mainContentsBodyAsideContents">
                        <div id="mainContentsBodyAsideContentsHeader">
                            <div id="mainContentsBodyAsideContentsHeader_userImgDiv">
                                <div id="mainContentsBodyAsideContentsHeader_userImg">
                                    
                                </div>
                            </div>
                            <div id="mainContentsBodyAsideContentsHeader_userInfoDiv">

                            </div>
                        </div>
                        <div>

                        </div>
                    </div>
                </div>
                <div id="mainContentsBodyDiv" class="col-9">

                    <div class="ContentsDiv">
                        <div class="ContentsDivImg">
                            <!-- <img src="./img/test.jpg" width="100%" height="auto"> -->
                        </div>
                        <div class="ContentsDivTitle">
                            <h3>1. 지금은 테스트 중입니다.</h3>
                        </div>
                        <div class="contentsDivContents">
                            <p>지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.</p>
                        </div>
                        <div class="contentsDivTag">
                            <p>태그 : <span class="TagName">test</span><span class="TagName">test</span></p>
                        </div>
                        <div class="contentsDivEtc row">
                            <div class="contentsDivDate col-6">
                                <p>2022년 07월 10일</p>
                            </div>
                            <div class="contentsDivComment col-6">
                                <p><span class="commentCount">댓글 5</span><span class="recommandCount"><i class="fas fa-heart" style="color:red"></i> 5</span></p>
                            </div>
                            
                        </div>
                    </div>


                    <!-- 추가 게시글 시작 -->
                    <div class="ContentsDiv">
                        <div class="ContentsDivImg">
                            <!-- <img src="./img/test.jpg" width="100%" height="auto"> -->
                        </div>
                        <div class="ContentsDivTitle">
                            <h3>1. 지금은 테스트 중입니다.</h3>
                        </div>
                        <div class="contentsDivContents">
                            <p>지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.</p>
                        </div>
                        <div class="contentsDivTag">
                            <p>태그 : <span class="TagName">test</span><span class="TagName">test</span></p>
                        </div>
                        <div class="contentsDivEtc row">
                            <div class="contentsDivDate col-6">
                                <p>2022년 07월 10일</p>
                            </div>
                            <div class="contentsDivComment col-6">
                                <p><span class="commentCount">댓글 5</span><span class="recommandCount"><i class="fas fa-heart" style="color:red"></i> 5</span></p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="ContentsDiv">
                        <div class="ContentsDivImg">
                            <!-- <img src="./img/test.jpg" width="100%" height="auto"> -->
                        </div>
                        <div class="ContentsDivTitle">
                            <h3>1. 지금은 테스트 중입니다.</h3>
                        </div>
                        <div class="contentsDivContents">
                            <p>지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.</p>
                        </div>
                        <div class="contentsDivTag">
                            <p>태그 : <span class="TagName">test</span><span class="TagName">test</span></p>
                        </div>
                        <div class="contentsDivEtc row">
                            <div class="contentsDivDate col-6">
                                <p>2022년 07월 10일</p>
                            </div>
                            <div class="contentsDivComment col-6">
                                <p><span class="commentCount">댓글 5</span><span class="recommandCount"><i class="fas fa-heart" style="color:red"></i> 5</span></p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="ContentsDiv">
                        <div class="ContentsDivImg">
                            <!-- <img src="./img/test.jpg" width="100%" height="auto"> -->
                        </div>
                        <div class="ContentsDivTitle">
                            <h3>1. 지금은 테스트 중입니다.</h3>
                        </div>
                        <div class="contentsDivContents">
                            <p>지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.</p>
                        </div>
                        <div class="contentsDivTag">
                            <p>태그 : <span class="TagName">test</span><span class="TagName">test</span></p>
                        </div>
                        <div class="contentsDivEtc row">
                            <div class="contentsDivDate col-6">
                                <p>2022년 07월 10일</p>
                            </div>
                            <div class="contentsDivComment col-6">
                                <p><span class="commentCount">댓글 5</span><span class="recommandCount"><i class="fas fa-heart" style="color:red"></i> 5</span></p>
                            </div>
                            
                        </div>
                    </div>

                    <div class="ContentsDiv">
                        <div class="ContentsDivImg">
                            <!-- <img src="./img/test.jpg" width="100%" height="auto"> -->
                        </div>
                        <div class="ContentsDivTitle">
                            <h3>1. 지금은 테스트 중입니다.</h3>
                        </div>
                        <div class="contentsDivContents">
                            <p>지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.지금은 여러가지 테스트를 진행중입니다.</p>
                        </div>
                        <div class="contentsDivTag">
                            <p>태그 : <span class="TagName">test</span><span class="TagName">test</span></p>
                        </div>
                        <div class="contentsDivEtc row">
                            <div class="contentsDivDate col-6">
                                <p>2022년 07월 10일</p>
                            </div>
                            <div class="contentsDivComment col-6">
                                <p><span class="commentCount">댓글 5</span><span class="recommandCount"><i class="fas fa-heart" style="color:red"></i> 5</span></p>
                            </div>
                            
                        </div>
                    </div>
                    <!-- 추가 게시글 끝 -->
                    
                    <!--  -->
                </div>
            </div>

            <!-- 메인 컨텐츠 내용 끝 -->
        </div>
    </section>
    <!-- BLOG 메인 컨텐츠 시작 끝 -->
</body>
</html>