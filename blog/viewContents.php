<?php
require_once './../dbconnect.php';

// 페이지 수
$board_idx = $_GET['board'];

$board_contents_info_query = "AND board_idx = $board_idx";

$board_sql = "SELECT a.*, b.board_category_name FROM evuela_board a
LEFT JOIN evuela_board_category b ON (a.board_category_idx = b.board_category_idx)
WHERE 1=1
$board_contents_info_query;";

$board_contents = DBQuery($board_sql, "select");

error_log(var_export($board_contents, true));

?>