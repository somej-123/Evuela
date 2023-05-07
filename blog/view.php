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
    <link href="./css/view.css" rel="stylesheet"/>
    <script src="./js/view.js"></script>
    <!-- blog css,js 경로 끝-->

    <title>EVUELA::BLOG</title>
</head>
<body>
    <!-- Blog Header 시작 -->
    <?php 
        include_once("./header.php");
        require_once("./viewContents.php");
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

            <!-- <h5 id="mainSection_Body_title">글쓰기</h5> -->
            <div id="mainSection_Body_viewDiv">
                <div id="mainSection_Body_viewHeader">
                    <div id="viewHeader_titleDiv">
                        <h3 id="viewHeader_title"><b>[<?= $board_contents['board_category_name']?>]</b> <?= $board_contents['board_title']?></h3>
                        <!-- <input type="text" class="form-control" id="viewHeader_title" aria-describedby="제목을 입력하세요" placeholder="제목을 입력하세요"> -->
                    </div>
                    <div id="viewHeader_boardInfoDiv">
                        <div id="viewHeader_boardInfoDiv_sub_time" class="viewHeader_boardInfoDiv_sub"><?= $board_contents['user_id']?></div>
                        <div id="viewHeader_boardInfoDiv_sub_eye" class="viewHeader_boardInfoDiv_sub"><i class="far fa-eye"></i> <?= $board_contents['board_view']?></div>
                        <div id="viewHeader_boardInfoDiv_sub_heart" class="viewHeader_boardInfoDiv_sub"><i class="far fa-heart"></i> <?= $board_contents['board_recommend']?></div>
                        <div id="viewHeader_boardInfoDiv_sub_time" class="viewHeader_boardInfoDiv_sub"><i class="far fa-clock"></i> <span id="viewHeader_boardInfo_time"></span></div>
                        <!-- <select id="viewHeader_category" class="form-select" aria-label="Default select example"> -->
                            <!-- <option selected value="0">카테고리 선택</option>
                            <option value="1">One</option>
                            <option value="2">Two</option>
                            <option value="3">Three</option> -->
                        <!-- </select> -->
                    </div>
                </div>
                <div id="mainSection_Body_viewBody">
                    <div id="mainSection_Body_view_summernote"><?= $board_contents['board_contents']?></div>
                </div>

                <!-- 버튼 외 여러 기타 -->
                <div id="mainSection_Body_viewFooter_BtnList">
                    <input type="hidden" value="<?= $board_contents['user_id']?>" id="user_id"/>
                    <input type="hidden" value="<?= $board_contents['user_level']?>" id="user_level"/>
                    <input type="hidden" value="<?= $board_contents['board_id']?>" id="board_id"/>
                    <input type="hidden" value="<?= $board_contents['board_category_idx']?>" id="board_category_idx"/>
                    <input type="hidden" value="<?= $board_contents['board_categorytype_idx']?>" id="board_categorytype_idx"/>
                    <input type="hidden" value="<?= $board_contents['board_level']?>" id="board_level"/>
                    <button type="button" id="viewToEditBtn" class="btn btn-warning">수정</button>
                    <button type="button" id="viewToListBtn" class="btn btn-secondary">목록</button>
                    <button type="button" id="" class="btn btn-danger">삭제</button>
                </div>
                <!-- 버튼 외 여러 기타 끝-->

                <div id="mainSection_Body_viewFooter">
                <!-- 댓글 영역 시작 -->
                <?php 
                    include_once("./viewComments.php");
                ?>
                <!-- 댓글 영역 끝 -->
                    
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

<script>
    $(document).ready(()=>{

        // 게시글 작성 시간 경과 입력
        var boardWriteTime = new Date("<?= $board_contents['createdate']?>");

        boardWriteTime = elapsedText(boardWriteTime);

        $("#viewHeader_boardInfo_time").text(boardWriteTime);

    })
    

    // 게시글 등록 시간 문자열로 표현(방금전, 1분전, 1시간전 등등...)
    function elapsedText(date) {
	// 초 (밀리초)
	const seconds = 1;
	// 분
	const minute = seconds * 60;
	// 시
	const hour = minute * 60;
	// 일
	const day = hour * 24;
	
	var today = new Date();
	var elapsedTime = Math.trunc((today.getTime() - date.getTime()) / 1000);
	
	var elapsedText = "";
	if (elapsedTime < seconds) {
		elapsedText = "방금 전";
	} else if (elapsedTime < minute) {
		elapsedText = elapsedTime + "초 전";
	} else if (elapsedTime < hour) {
		elapsedText = Math.trunc(elapsedTime / minute) + "분 전";
	} else if (elapsedTime < day) {
		elapsedText = Math.trunc(elapsedTime / hour) + "시간 전";
	} else if (elapsedTime < (day * 15)) {
		elapsedText = Math.trunc(elapsedTime / day) + "일 전";
	} else {
        dY = date.getFullYear();
        dM = addZero(date.getMonth()+1);
        dD = addZero(date.getDate());
        dH = addZero(date.getHours());
        dm = addZero(date.getMinutes());
        ds = addZero(date.getSeconds());
        
		elapsedText = dY + "-" + dM + "-" + dD + " " + dH + ":" + dm + ":" + ds;
	}
	
	return elapsedText;
}


function addZero(value){
    var IntValue = parseInt(value);
    
    if(IntValue < 10){
        IntValue = "0" + IntValue;
    }else{
        IntValue = String(IntValue);
    }

    return IntValue;

}
</script>


<?php 

function getMillisecond()
{
  list($microtime,$timestamp) = explode(' ',microtime());
  $time = $timestamp.substr($microtime, 2, 3);
 
  return $time;
}

?>