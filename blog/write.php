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

    <!-- include summernote css/js -->
    <!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script> -->
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-lite.min.js" integrity="sha512-lVkQNgKabKsM1DA/qbhJRFQU8TuwkLF2vSN3iU/c7+iayKs08Y8GXqfFxxTZr1IcpMovXnf2N/ZZoMgmZep1YQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote.min.css" integrity="sha512-m52YCZLrqQpQ+k+84rmWjrrkXAUrpl3HK0IO4/naRwp58pyr7rf5PO1DbI2/aFYwyeIH/8teS9HbLxVyGqDv/A==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/lang/summernote-ko-KR.min.js"></script>

    <!-- include summernote css/js end-->



    <!-- blog css,js 경로 -->
    <link href="./css/write.css" rel="stylesheet"/>
    <script src="./js/write.js"></script>
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
            <h5 id="mainSection_Body_title">글쓰기</h5>
            <div id="mainSection_Body_writeDiv">
                <div id="mainSection_Body_writeHeader">
                    <div id="writeHeader_titleDiv">
                        <input type="text" class="form-control" id="writeHeader_title" aria-describedby="제목을 입력하세요">
                    </div>
                    <div id="writeHeader_categoryDiv">
                        <select id="writeHeader_category" class="form-select" aria-label="Default select example">
                            <option selected>Open this select menu</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option>
                        </select>
                    </div>
                </div>
                <div id="mainSection_Body_writeBody">
                    <div id="mainSection_Body_write_summernote">

                    </div>
                </div>
                <div id="mainSection_Body_writeFooter">

                </div>

            </div>
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
