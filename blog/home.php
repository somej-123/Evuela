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

        <!-- 최신글 -->
        <div id="mainSection_Body" class="container">
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
                            <div class="row mainSection_Body_firstDiv_list_bottom_etc">
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
                            <div class="row mainSection_Body_firstDiv_list_bottom_etc">
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
                            <div class="row mainSection_Body_firstDiv_list_bottom_etc">
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
            <div id="mainSection_Body_secondDiv">

            </div>
            <div id="mainSection_Body_thirdDiv">

            </div>
        </div>
        <!-- 최신글 끝 -->

        <!-- mainSection Body 구역 끝-->
    </section>
    
</body>
</html>