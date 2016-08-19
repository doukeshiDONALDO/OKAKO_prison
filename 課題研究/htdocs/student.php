<head><title>簡易掲示板</title></head>
<body>



<?php

	require('./dbconnect.php');

	$rt = $db->query("SELECT * FROM members order by number desc");

	if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
		$_SESSION['time'] = time();
		
		$sql = sprintf('SELECT * FROM members WHERE id=%d',mysql_real_escape_string($_SESSION['id']));
		$record = mysql_query($sql) or die(mysql_error());
		$member = mysql_fetch_assoc($record);
	}
	else{
		header('Location:login.php');
		exit();
	}

	if($_SESSION['id'] != ""){
		$rs = $db->query("SELECT * FROM grade_1 WHERE user_id = ".$_SESSION['id']." order by number desc");
		echo "生徒名:  ".$member['name']."<br><br>";
		echo "<table border=1>";
		echo "<th>課題No</th>";
		echo "<th>課題名</th>";
		echo "<th>ソース</th>";
		echo "<th>実行画像</th>";
		echo "<th>考察</th>";
		echo "<th>最終更新日時</th>";
		echo "<th></th>";
		while($row= $rs->fetchRow()){
			echo "<tr>";
			echo "<td>".$row[1]."</td>";
			echo "<td>".$row[2]."</td>";
			echo "<td>".$row[3]."</td>";
			echo "<td><img src='./_file/".$row[4]."' width='50%'height='50%'></td>";
			echo "<td>".$row[5]."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td><a href='update.php?id=".$row[1]."'>編集</a></td>";
			echo "<td><a href='delete.php?id=".$row[1]."' style='color: #F33;'>削除</a></td>";
			echo "</tr>";
		}
	}

?>

<body>
<html>