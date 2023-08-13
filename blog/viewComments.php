<?php

$commentByBoardID = $board_contents['board_id'];
// 게시글 정보 불러오기
$boardIDQuery = "AND board_id = $commentByBoardID";

$comment_sql = "SELECT * FROM evuela_board_comment a
WHERE 1=1
$boardIDQuery
AND comment_parents_id IS NULL
ORDER BY createdate desc;";

$comment_result = DBQuery($comment_sql, "selectRows");
$comment_count_result = DBQuery($comment_sql, "count");

?>



<!-- 댓글 영역 시작 -->
<p id="mainSection_Body_viewFooter_commments_title">comment (<?= $comment_count_result?>)</p>
<div id="mainSection_Body_viewFooter_comments">
    <div class="form-floating" id="footerTextareaDiv">
        <textarea class="form-control" placeholder="깨끗한 댓글 입력 부탁드립니다." id="footerTextareaDiv_textarea"></textarea>
        <?php if(!isset($_SESSION["signin"])){?>
            <label for="floatingTextarea2">댓글은 로그인 후에 입력할 수 있습니다.</label>
        <?php }else{ ?>
            <label for="floatingTextarea2">댓글은 최대 3000자까지 입력 가능합니다.</label>
        <?php }?>
    </div>
    <div id="footerTextareaBtnDiv">
        <?php if(!isset($_SESSION["signin"])){?>
            <button id="footerTextareaBtnDiv_button_beforeLogin" class="btn btn-secondary">등록</button>
        <?php }else{ ?>
            <button id="footerTextareaBtnDiv_button" class="btn btn-secondary">등록</button>
        <?php }?>


        
    </div>
</div>
<!-- 댓글 영역 시작 끝-->

<!-- 사용자 댓글 영역 -->
<div id="mainSection_Body_viewFooter_commentsList">
    <?php if($comment_count_result > 0){?>
        <?php for($i = 0; $i < $comment_count_result; $i++){?>

            
            <!-- 사용자 댓글(반복) -->
            <div class="mainSection_Body_viewFooter_commentsListContents" commentDivID="<?= $comment_result[$i]['comment_id']?>">
                
                <!-- 댓글 헤더 -->
                <div class="commentsListContents_header">
                    <div class="commentsListContents_header_leftMenu">
                        <p class="commentsListContents_header_ID"><?= $comment_result[$i]['user_id']?></p><p class="commentsListContents_header_createTime"><i class="far fa-clock" style="position:relative;top:1px;margin-right:5px;"></i><?= passing_time($comment_result[$i]['createdate'])?></p>
                    </div>
                    <div class="commentsListContents_header_rightMenu">
                        <?php if($_SESSION["user_id"] == $comment_result[$i]['user_id']){?>
                            <p class="commentsListContents_header_edit" onclick="updateComment(this,<?= $comment_result[$i]['comment_id']?>)">수정</p><p class="commentsListContents_header_delete"  onclick="deleteComment(<?= $comment_result[$i]['comment_id']?>)">삭제</p>
                        <?php }else{?>
                            
                        <?php }?>
                    </div>
                </div>
                <!-- 댓글 헤더 끝 -->

                <!-- 댓글 바디 -->
                <div class="commentsListContents_body">
                    <div class="commentsListContents_body_contents"><?php echo $comment_result[$i]['comment_contents'] ?></div>
                </div>
                <!-- 댓글 바디 끝 -->

                <!-- 댓글 푸터 -->
                <div class="commentsListContents_footer">
                    <div class="commentsListContents_footer_reply_div">
                        <span class="commentsListContents_footer_reply" onclick="showCommentsReplyTextArea(this)">답글</span>
                    </div>
                    <div class="commentsListContents_footer_reply_textarea_div commentsListContents_footer_reply_textarea_div_hide">
                        <div class="form-floating">
                            <textarea class="form-control commentsListContents_footer_reply_textarea" placeholder="깨끗한 댓글 입력 부탁드립니다."></textarea>
                            <label>답글은 로그인 후에 입력할 수 있습니다</label>
                        </div>
                        <div class="commentsListContents_footer_reply_btn_div">
                            <button type="button" class="btn btn-secondary" onclick="reply_add(this, <?=$comment_result[$i]['comment_id'] ?>)">등록</button>
                        </div>
                    </div>
                </div>
                <!-- 댓글 푸터 끝 -->
            </div>
            <!-- 사용자 댓글 끝-->
        <?php }?>
    <?php }?>


</div>
<!-- 사용자 댓글 영역 끝-->

<?php

// 날짜 계산 함수
function passing_time($datetime) {
    // 한국시간 날짜 기준
	$time_lag = time() - strtotime($datetime);
	
	if($time_lag < 60) {
		$posting_time = $time_lag."초 전";
	} elseif($time_lag >= 60 and $time_lag < 3600) {
		$posting_time = floor($time_lag/60)."분 전";
	} elseif($time_lag >= 3600 and $time_lag < 86400) {
		$posting_time = floor($time_lag/3600)."시간 전";
	} elseif($time_lag >= 86400 and $time_lag < 1296000) {
		$posting_time = floor($time_lag/86400)."일 전";
	} else {
		$posting_time = date("y-m-d h:i:s", strtotime($datetime));
	} 
	
	return $posting_time;
}

?>