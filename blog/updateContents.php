<?php
require_once './../dbconnect.php';

// 게시글 번호
$board_idx = $_GET['board'];
$board_viewCount_for_userID = $_SESSION["user_id"];
// $board_viewCount_for_userID = "test";

// 조회수 증가하기

// $board_contents_viewCount_sql = "UPDATE evuela_board SET board_view = board_view + 1 WHERE board_idx = $board_idx AND user_id != '$board_viewCount_for_userID'";
// $board_viewCount_add = DBQuery($board_contents_viewCount_sql, "update");


// 게시글 정보 불러오기
$board_contents_info_query = "AND board_idx = $board_idx";

$board_sql = "SELECT a.*, b.board_category_name FROM evuela_board a
LEFT JOIN evuela_board_category b ON (a.board_category_idx = b.board_category_idx)
WHERE 1=1
$board_contents_info_query;";

$board_contents = DBQuery($board_sql, "select");

?>
