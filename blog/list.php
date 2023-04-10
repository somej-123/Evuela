<?php 
    session_start();
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <!-- 공통부분 끝 -->


    
    <!-- blog css,js 경로 -->
    <link href="./css/list.css" rel="stylesheet"/>
    <script src="./js/list.js"></script>
    <!-- blog css,js 경로 끝-->

    <title>EVUELA::BLOG</title>
</head>
<body>
    <!-- Blog Header 시작 -->
    <?php 
        include_once("./header.php");
    ?>
    <!-- Blog Header 끝 -->

    <!-- Blog body 섹션 -->
    
    <section id="mainSection">
        <!-- mainSection Header 구역 -->
        <div id="mainSection_Header">
            <div id="mainSection_Header_background_div">
                <div id="mainSection_Header_background"></div>
            </div>
            <div class="container" id="mainSection_Header_Top">
                <h2 id="mainSection_Header_Top_title">자유로운 공간</h2>
                <p id="mainSection_Header_Top_text">정보 공유, 일상, 실험 글들을 작성하고 나의 생각을 공유해요</p>
                <div id="mainSection_Header_Center">
                    <div class="input-group mb-3">
                        <select class="form-select" id="mainSection_Header_Center_searchSelect" aria-label="Default select example">
                            <option value="all" selected>전체</option>
                            <option value="title">제목</option>
                            <option value="contents">내용</option>
                            <option value="user">작성자</option>
                        </select>
                        <input type="text" class="form-control" id="mainSection_Header_Center_searchText" aria-label="Text input with dropdown button">
                        <button class="btn btn-secondary" id="mainSection_Header_Center_searchBtn" type="button"><i class="fas fa-search"></i></button>
                    </div>
                </div>
                <div id="mainSection_Header_Footer">
                    <p id="mainSection_Header_Footer_Title" onclick="location.href='./list'">전체 목록 보기</p>
                </div>
            </div>
        </div>
        <!-- mainSection Header 구역 끝-->
        <!-- mainSection Body 구역 -->

        <div id="mainSection_Body" class="container">


            <!-- 개인 정보 -->
            <div id="mainSection_userInfoDiv">

                <?php if(!isset($_SESSION["signin"])){?>
                    <div id="userInfoLoginDiv" class="col-12">
                        <p class="userInfoContents"><span id="userInfoContents_loginBtn">로그인</span> 하여 다양한 기능을 사용해보세요!</p>
                    </div>
                <?php }
                else{ 
                    
                    if($_SESSION["user_level"] == 1){
                        $UserLevel = "운영자";
                    }else if($_SESSION["user_level"] == 2){
                        $UserLevel = "회원";
                    }else if($_SESSION["user_level"] == 3){
                        $UserLevel = "비회원";
                    }else{
                        $UserLevel = "관리자";
                    }
                    ?>
                    <div id="userInfoContentsDiv" class="col-9">
                        <div class="userInfoContentsDiv_M">
                            <p class="userInfoContents"><?= $_SESSION["user_id"]?></p>
                            <p class="userInfoContents"><?= $UserLevel?></p>
                        </div>
                        <div class="userInfoContentsDiv_M">
                            <p class="userInfoContents"><a href="#">나의 글 <span id="myContentsCount">15</span></a></p>
                            <p class="userInfoContents"><a href="#">나의 댓글 <span id="myCommentCount">15</span></a></p>
                        </div>
                    </div>
                    <div id="userInfoETCDiv" class="col-3">
                        <button id="userInfoETC_write_btn" class="btn btn-primary" onclick="location.href='./write'">글쓰기 <i class="fas fa-edit"></i></button>
                    </div>
                <?php } ?>
                
            </div>
            
            <!-- 카테고리 -->
            <div id="mainSection_categoryDiv">
                <h5 id="mainSection_categoryTitle">카테고리 <i id="mainSection_categoryTitle_arrowIcon" class="fas fa-angle-double-right"></i> <span id="mainSection_categoryContents">전체</span><i id="categoryTitleIcon" class="fas fa-caret-down"></i></h5>
                <div id="mainSection_categorySubDiv" class="row">
                    <div id="mainSection_categorySubDiv-main" class="col-6">
                        <!-- <p class="category_mainTag_P category_mainSelect"><a href="#">전체</a></p>
                        <p class="category_mainTag_P"><a href="#">메인#1</a></p>
                        <p class="category_mainTag_P"><a href="#">메인#2</a></p>
                        <p class="category_mainTag_P"><a href="#">메인#3</a></p>
                        <p class="category_mainTag_P"><a href="#">메인#4</a></p>
                        <p class="category_mainTag_P"><a href="#">메인#5</a></p> -->
                    </div>
                    <div id="mainSection_categorySubDiv-sub" class="col-6">
                        <!-- <p class="category_subTag_P category_subSelect"><a href="#">서브#1</a></p>
                        <p class="category_subTag_P"><a href="#">서브#2</a></p>
                        <p class="category_subTag_P"><a href="#">서브#3</a></p>
                        <p class="category_subTag_P"><a href="#">서브#4</a></p>
                        <p class="category_subTag_P"><a href="#">서브#5</a></p>
                        <p class="category_subTag_P"><a href="#">서브#6</a></p> -->
                    </div>
                </div>
            </div>
            <!-- 카테고리 끝-->

            <!-- boardList 영역 시작 -->

            <div id="mainSection_boardListDiv">
                <?php require_once("./pageContents.php"); ?>

                <div id="boardList_contents_countDiv">
                    <?php require_once("./pageCount.php"); ?>
                </div>
                

                

            </div>

            <!-- boardList 영역 끝 -->
            



        </div>

        <!-- mainSection Body 구역 끝-->
    </section>

    <!-- Blog footer 시작 -->
    <?php 
        include_once("./footer.php");
    ?>
    <!-- Blog footer 끝 -->
    
</body>
</html>
