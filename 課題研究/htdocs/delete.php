<?php

require('./dbconnect.php');

if (isset($_SESSION['id'])) {
	$id = $_REQUEST['id'];
	
	// 投稿を検査する
	$rs = $db->query("SELECT * FROM grade_1 WHERE user_id ='".$_SESSION['id']."' AND number ='".$id."'");
	$row = $rs->fetchRow();
	mysql_query("DELETE FROM grade_1 WHERE user_id ='".$_SESSION['id']."' AND number ='".$id."'");
	echo $id."を削除しました";
}

header('Location: student.php');
 exit();
?>
