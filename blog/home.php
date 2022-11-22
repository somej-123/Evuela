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
    <link href="./css/home.css" rel="stylesheet"/>
    <script src="./js/home.js"></script>
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
                
            </div>
        </div>
        <!-- mainSection Header 구역 끝-->
        <!-- mainSection Body 구역 -->

        <div id="mainSection_Body" class="container">

                    <!-- 개인 정보 -->
                    <div id="mainSection_userInfoDiv">

                    <?php if(!isset($_SESSION["signin"])){?>
                        <div id="userInfoLoginDiv" class="col-12">
                            <p class="userInfoContents">로그인 하여 다양한 기능을 사용해보세요!</p>
                        </div>
                    <?php }
                    else{ ?>
                        <div id="userInfoContentsDiv" class="col-9">
                            <div class="userInfoContentsDiv_M">
                                <p class="userInfoContents">somej</p>
                                <p class="userInfoContents">회원</p>
                            </div>
                            <div class="userInfoContentsDiv_M">
                                <p class="userInfoContents"><a href="#">나의 글 <span id="myContentsCount">15</span></a></p>
                                <p class="userInfoContents"><a href="#">나의 댓글 <span id="myCommentCount">15</span></a></p>
                            </div>
                        </div>
                        <div id="userInfoETCDiv" class="col-3">
                            <button id="userInfoETC_write_btn" class="btn btn-primary">글쓰기 <i class="fas fa-edit"></i></button>
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


            <!-- 최신글 -->
            <div id="mainSection_Body_firstDiv">

                <!-- 최신글 타이틀  -->
                <h5 id="mainSection_Body_firstDiv_title"><i class="far fa-clock"></i>최신글</h5>
                <div id="mainSection_Body_firstDiv_contents">

                    <!-- 최신글 컨텐츠 내용 시작 -->
                    <div class="mainSection_Body_firstDiv_list">
                        <div class="mainSection_Body_firstDiv_list_top">
                            <a href="#">
                                <img src="./img/ocean_header.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_firstDiv_list_bottom">
                            <div class="mainSection_Body_firstDiv_list_bottom_title">
                                <h5 class="mainSection_Body_firstDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_contents">
                                <p class="mainSection_Body_firstDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_user">
                                <p class="mainSection_Body_firstDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_firstDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_firstDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 최신글 컨텐츠 내용 끝 -->

                    <div class="mainSection_Body_firstDiv_list">
                        <div class="mainSection_Body_firstDiv_list_top">
                            <a href="#">
                                <img src="./img/code_test.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_firstDiv_list_bottom">
                            <div class="mainSection_Body_firstDiv_list_bottom_title">
                                <h5 class="mainSection_Body_firstDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_contents">
                                <p class="mainSection_Body_firstDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_user">
                                <p class="mainSection_Body_firstDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_firstDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_firstDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>







                    <div class="mainSection_Body_firstDiv_list">
                        <div class="mainSection_Body_firstDiv_list_top">
                            <a href="#">
                                <img src="./img/city_header.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_firstDiv_list_bottom">
                            <div class="mainSection_Body_firstDiv_list_bottom_title">
                                <h5 class="mainSection_Body_firstDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_contents">
                                <p class="mainSection_Body_firstDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_user">
                                <p class="mainSection_Body_firstDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_firstDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_firstDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_firstDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_firstDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_firstDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>








                </div>
            </div>
            <!-- 최신글 끝 -->

            <!-- 추천 수 별 글 -->
            <div id="mainSection_Body_secondDiv">

                <!-- 추천 수 별 글 타이틀  -->
                <h5 id="mainSection_Body_secondDiv_title"><i class="far fa-clock"></i>추천 수 별 글</h5>
                <div id="mainSection_Body_secondDiv_contents">

                    <!-- 추천 수 별 글 컨텐츠 내용 시작 -->
                    <div class="mainSection_Body_secondDiv_list">
                        <div class="mainSection_Body_secondDiv_list_top">
                            <a href="#">
                                <img src="./img/ocean_header.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_secondDiv_list_bottom">
                            <div class="mainSection_Body_secondDiv_list_bottom_title">
                                <h5 class="mainSection_Body_secondDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_contents">
                                <p class="mainSection_Body_secondDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_user">
                                <p class="mainSection_Body_secondDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_secondDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_secondDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 추천수 별 글 컨텐츠 내용 끝 -->



                    <div class="mainSection_Body_secondDiv_list">
                        <div class="mainSection_Body_secondDiv_list_top">
                            <a href="#">
                                <img src="./img/rain_load.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_secondDiv_list_bottom">
                            <div class="mainSection_Body_secondDiv_list_bottom_title">
                                <h5 class="mainSection_Body_secondDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_contents">
                                <p class="mainSection_Body_secondDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_user">
                                <p class="mainSection_Body_secondDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_secondDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_secondDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="mainSection_Body_secondDiv_list">
                        <div class="mainSection_Body_secondDiv_list_top">
                            <a href="#">
                                <img src="./img/code_test.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_secondDiv_list_bottom">
                            <div class="mainSection_Body_secondDiv_list_bottom_title">
                                <h5 class="mainSection_Body_secondDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_contents">
                                <p class="mainSection_Body_secondDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_user">
                                <p class="mainSection_Body_secondDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_secondDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_secondDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_secondDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_secondDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_secondDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

            </div>

            <!-- 댓글 수 -->
            <div id="mainSection_Body_thirdDiv">
                <!-- 댓글 수 별 글 타이틀  -->
                <h5 id="mainSection_Body_thirdDiv_title"><i class="far fa-clock"></i>댓글 수 별 글</h5>
                <div id="mainSection_Body_thirdDiv_contents">

                    <!-- 댓글 수 별 글 컨텐츠 내용 시작 -->
                    <div class="mainSection_Body_thirdDiv_list">
                        <div class="mainSection_Body_thirdDiv_list_top">
                            <a href="#">
                                <img src="./img/test.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_thirdDiv_list_bottom">
                            <div class="mainSection_Body_thirdDiv_list_bottom_title">
                                <h5 class="mainSection_Body_thirdDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_contents">
                                <p class="mainSection_Body_thirdDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_user">
                                <p class="mainSection_Body_thirdDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_thirdDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_thirdDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- 댓글 수 글 컨텐츠 내용 끝 -->




                    <div class="mainSection_Body_thirdDiv_list">
                        <div class="mainSection_Body_thirdDiv_list_top">
                            <a href="#">
                                <img src="./img/ocean_header.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_thirdDiv_list_bottom">
                            <div class="mainSection_Body_thirdDiv_list_bottom_title">
                                <h5 class="mainSection_Body_thirdDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_contents">
                                <p class="mainSection_Body_thirdDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_user">
                                <p class="mainSection_Body_thirdDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_thirdDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_thirdDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>




                    <div class="mainSection_Body_thirdDiv_list">
                        <div class="mainSection_Body_thirdDiv_list_top">
                            <a href="#">
                                <img src="./img/city_header.jpg"/>
                            </a>
                        </div>
                        <div class="mainSection_Body_thirdDiv_list_bottom">
                            <div class="mainSection_Body_thirdDiv_list_bottom_title">
                                <h5 class="mainSection_Body_thirdDiv_list_bottom_title_h5">
                                    <a href="#">[카테고리] 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요</a>
                                </h5>    
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_contents">
                                <p class="mainSection_Body_thirdDiv_list_bottom_contents_p">아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요. 아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.아직은 테스트 진행중입니다. 테스트를 진행하면서 좋은 아이디어가 있으면 말씀해주세요.</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_user">
                                <p class="mainSection_Body_thirdDiv_list_bottom_user_name">작성자</p>
                            </div>
                            <div class="mainSection_Body_thirdDiv_list_bottom_etc">
                                <div class="col-8 mainSection_Body_thirdDiv_list_bottom_etc_days">
                                    <i class="far fa-calendar-alt"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_days_value">2222-22-22 22:22:22</span>
                                </div>
                                <div class="col-4 mainSection_Body_thirdDiv_list_bottom_etc_info">
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand">
                                        <i class="far fa-thumbs-up"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_recommand_count">5</span>
                                    </div>
                                    <div class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment">
                                        <i class="far fa-comments"></i> <span class="mainSection_Body_thirdDiv_list_bottom_etc_info_comment_count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>



            </div>
            <!-- 댓글 수 끝-->



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