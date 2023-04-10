<?php

//board 전체 갯수
$totalListCountSql = "SELECT a.*, b.board_category_name FROM evuela_board a
LEFT JOIN evuela_board_category b ON (a.board_category_idx = b.board_category_idx)
WHERE 1=1
$whereSql";

$totalListCount = DBquery($totalListCountSql, "count");


//한 페이지당 데이터 개수
$list_num = 5;

//한 블럭당 페이지 개수
$page_num = 5;

//전체 페이지 수  = 전체 데이터 / 페이지당 데이타 개수, ceil(올림)
$total_page = ceil($totalListCount / $list_num); // 7

// 전체 블럭 수  = 전체 페이지 수 / 블럭당 페이지
$total_block = ceil($total_page / $page_num); // 2

//현재 블럭 번호 = 현재 페이지 번호 / 블럭 당 페이지 수 
$now_block = ceil($page / $page_num);

//블럭 당 시작 페이지 번호 = (해당 글의 블럭 번호 -1) * 블럭 당 페이지 수 + 1
$s_pageNum = ($now_block - 1) * $page_num + 1;


//데이터가 0개인 경우
if($s_pageNum == 0){
    $s_pageNum = 1;
}
// 블럭당 마지막 페이지 번호 = 현재 블럭 번호 * 블럭 당 페이지 수 
$e_pageNum = $now_block * $page_num;

// 마지막 번호가 전체 페이지를 넘지 않도록
if($e_pageNum > $total_page){
    $e_pageNum = $total_page;
}

?>
<!-- 이전 버튼 -->

<?php if($page <= 1){ ?>
    <!-- <a href="list?page=1" class="btn btn-secondary btn-sm"><i class="fas fa-angle-left"></i> 이전</a> -->
<?php }else{ ?>
    <a href="list?page=<?= $page-1?>" class="btn btn-secondary btn-sm"><i class="fas fa-angle-left"></i> 이전</a>
<?php } ?>
<!-- 이전 버튼 끝 -->

<!-- 숫자 버튼 -->
<?php
    for($p=$s_pageNum; $p <= $e_pageNum; $p++){

        if($page == $p){
?>
        <p>
            <a href="./list?page=<?=$p?>" class="text-primary"><?=$p?></a>
        </p>  
<?php 
        }else{
?>
        <p>
            <a href="./list?page=<?=$p?>" class="text-secondary"><?=$p?></a>
        </p>  
<?php }
    }
?>







<!-- 숫자 버튼 끝 -->

<!-- 다음 버튼 -->
<?php if($page >= $total_page){ ?>
    <!-- <a href="list?page=<?=$total_page?>" class="btn btn-secondary btn-sm">다음 <i class="fas fa-angle-right"></i></a> -->
<?php }else{ ?>
    <a href="list?page=<?= $page+1?>" class="btn btn-secondary btn-sm">다음 <i class="fas fa-angle-right"></i></a>
<?php } ?>
<!-- 다음 버튼 끝-->