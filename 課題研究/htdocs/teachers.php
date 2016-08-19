<head><title>簡易掲示板</title></head>
<body>



<?php

	require('./dbconnect.php');

	if(isset($_SESSION['id']) && $_SESSION['time'] + 3600 > time()) {
		$_SESSION['time'] = time();
	}
	else{
		header('Location:login_t.php');
		exit();
	}

	$rt = $db->query("SELECT * FROM members order by number desc");


	echo "<form action=''method='POST'>";
	echo "<select name='user_id'>";
    	while ($row = $rt->fetchRow()) {
        	echo "<option value='".$row[0]."'>";
        	echo $row[1]."</option>";

    	}
    	echo "</select>";
	echo "<input type='submit' value='選択'><br><br>";

	if($_POST['user_id'] != ""){
		$rs = $db->query("SELECT * FROM grade_1 WHERE user_id = ".$_POST['user_id']." order by number desc");
		$s_name = $db->query("SELECT * FROM members WHERE id= ".$_POST['user_id']);
		$s__name = $s_name->fetchRow();
		echo "生徒名:  ".$s__name[1]."<br><br>";
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
			echo "<td>".htmlspecialchars($row[3])."</td>";
			echo "<td><img src='./_file/".$row[4]."' width='50%'height='50%'></td>";
			echo "<td>".htmlspecialchars($row[5])."</td>";
			echo "<td>".$row[7]."</td>";
			echo "</tr>";
		}
	}

?>

<body>
<html>