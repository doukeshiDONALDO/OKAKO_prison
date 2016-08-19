<html>
	<head>
		<title>情報技術科内専用ページ</title>
		<link rel="stylesheet" type="text/css" href="style.css" >
	</head>
<div id="user"> 

<?php
	require('./dbconnect.php');
		echo "<body onLoad ='parent.menu.location.reload(true)'>"; 
		
	if(isset($_SESSION['id'])) {
		if($_SESSION['kind'] == 1 ) {
			$sql = sprintf('SELECT * FROM members_t WHERE id=%d',mysql_real_escape_string($_SESSION['id']));
			$record = mysql_query($sql) or die(mysql_error());
			$member = mysql_fetch_assoc($record);
			echo "<font color='#9900cc'><a position:absolute;top:0px;right:30px;>".$member['name']."<font color=white>がログインしています</font></font></a>";
		}
		else {
			$sql = sprintf('SELECT * FROM members WHERE id=%d',mysql_real_escape_string($_SESSION['id']));
			$record = mysql_query($sql) or die(mysql_error());
			$member = mysql_fetch_assoc($record);
			echo "<font color='#00ffff'><a position:absolute;top:0px;right:30px;>".$member['name']."<font color=white>がログインしています</font></font></a>";
		}

	}
	else{
		echo "<font color=red>ログインしていません</font>";
	}

?>
</div>

<div id="login">
	<center>
	<div class="dfo"><a href ="login.php" style="color: #000;">ログイン</a></div>
	<div class="dfo"><a href ="join/index.php" style="color: #000;">アカウント新規作成</a></div>
	<div class="dfo"><a href ="logout.php" style="color: #000;">ログアウト</a></div>
	
</div>

<div id="student"><div class="dfo"><center>個別画面</div>

<?php



	if($_SESSION['id'] != ""){
		$rs = $db->query("SELECT * FROM grade_1 WHERE user_id = ".$_SESSION['id']." order by number desc");
		echo "<table border=1 align='center'>";
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
			echo "<td>".htmlspecialchars($row[3])."</td>";
			echo "<td><img src='./_file/".$row[4]."' width='50%'height='50%'></td>";
			echo "<td>".htmlspecialchars($row[5])."</td>";
			echo "<td>".$row[7]."</td>";
			echo "<td><a href='update.php?id=".$row[1]."'>編集</a></td>";
			echo "<td><a href='delete.php?id=".$row[1]."' style='color: #F33;'>削除</a></td>";
			echo "</tr>";
		}
	}

?>




</div>
</body>

</html>

