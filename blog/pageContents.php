<?php 
require_once './../dbconnect.php';

// 페이지 수
$page = $_GET['page'];

if($page == null){
    $page = 1;
}

// 행 개수
$rowCount = 5;

// 행 개수 영역 설정
$rowLimit = ($rowCount * ($page - 1));

// 검색 조건
$searchList = $_GET['searchSelect'];

// 검색어
$searchText = $_GET['saerchText'];

if($searchList == "all" && $searchText != "" && $searchText != null){
    $whereSql = "AND board_title LIKE '%$searchText%' OR board_contents LIKE '%$searchText%' OR user_id LIKE '%$searchText%'";
}else if($searchList == "title"){
    $whereSql = "AND board_title LIKE '%$searchText%'";
}
else if($searchList == "contents"){
    $whereSql = "AND board_contents LIKE '%$searchText%'";
}
else if($searchList == "user"){
    $whereSql = "AND user_id LIKE '%$searchText%'";
}else{
    $whereSql = "";
}

// LIST 쿼리문
$countSql = "SELECT a.*, b.board_category_name FROM evuela_board a
LEFT JOIN evuela_board_category b ON (a.board_category_idx = b.board_category_idx)
WHERE 1=1
$whereSql
ORDER BY board_idx desc LIMIT $rowCount OFFSET $rowLimit;";

// 전체 행 수
$listTotal = DBQuery($countSql,"count");

// 전체 컨텐츠 불러오기
$listContents = DBQuery($countSql,"selectRows");

// error_log($listTotal);

// error_log(var_export($countSql, true));

?>
<?php foreach($listContents as $list){

    //첫번재 이미지 불러오기

    $img_unserialize = unserialize($list['img_idx']);

    if($img_unserialize != [] ){
        $imgSelectSql = "SELECT * FROM evuela_board_img WHERE board_img_idx = ".$img_unserialize[0]."";

        $imgSelect = DBQuery($imgSelectSql, "select");
    }else{
        $imgSelect = null;
    }

    if($imgSelect == null){
        $imgSrc = "./img/no_picture.png";
    }else{
        $imgSrc = "".$imgSelect['file_path']."";
    }

    //첫번재 이미지 불러오기 끝

    // 컨텐츠 내용에서 img 태그 변경
    $listContents = preg_replace("/<img[^>]+\>/i", "(image) ", $list['board_contents']);
?>
<!-- boardList -->
<div class="row boardListDiv">
    <div class="boardList_img col-3">
        <img src="<?=$imgSrc?>">
    </div>
    <div class="boardList_contents col-9">

        <!-- 글 제목 -->
        <div class="boardList_contents_titleDiv">
            <h5 class="boardList_contents_title">
                <a href="./view?board=<?= $list['board_idx']?>">[<?=$list['board_category_name']?>] <?= $list['board_title'] ?></a>
            </h5>
        </div>
        <!-- 글 제목 끝-->
        
        <!-- 글 내용 -->
        <div class="boardList_contents_contentsDiv">
            <p class="boardList_contents_contents">
            <?= $listContents ?>
            </p>
        </div>
        <!-- 글 내용 끝-->

        <!-- 태그 -->
        <!-- <div class="boardList_conetnts_tagDiv">
            <span class="boardList_conetnts_tag btn btn-outline-success btn-sm">#test</span><span class="boardList_conetnts_tag btn btn-outline-success btn-sm">#test</span><span class="boardList_conetnts_tag btn btn-outline-success btn-sm">#test</span>
        </div> -->
        <!-- 태그 끝 -->

        <!-- 작성자 -->
        <div class="boardList_contents_userDiv">
            <p><?=$list['user_id']?></p>
        </div>
        <!-- 작성자 끝 -->

        <div class="boardList_contents_etcDiv">
            <div class="boardList_contents_etc_dayDiv">
                <i class="far fa-calendar-alt"></i> <span class="boardList_contents_etc_day"><?=$list['createdate']?></span>
            </div>
            <div class="boardList_contents_etc_etcDiv">
                <div class="boardList_contents_etc_commandDiv">
                    <i class="far fa-thumbs-up"></i> <span class="boardList_contents_etc_command"><?=$list['board_recommend']?></span>
                </div>
                <div class="boardList_contents_etc_commentDiv">
                    <i class="far fa-comments"></i> <span class="boardList_contents_etc_comment">0</span>
                </div>
            </div>
        </div>
        
            
    </div>
</div>
<!-- boardList end-->
<?php }?>


