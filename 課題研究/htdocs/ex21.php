<head><title>簡易掲示板</title></head>
<body>
<table border=1>
<form action=""method="post">
<tr align="center"><td>氏名</td>
<td><input type="text"name="name"></td></tr>
<tr><td>コメント</td><td><textarea name="msg"cols=40 rows=4></textarea></td></tr>
<tr><td><input type="submit"value="送信"></td></tr>
</table>
</form>

<pre>
<?php
	require ('./dbconnect.php');
//	$db = DB::connect("mysql://root:superman@localhost/mini_bbs");
//	$db -> query("SET NAMES 'sjis'");

	$n = $_POST["name"];
	$m = $_POST["msg"];


	if($_POST["msg"] != "") {
		$date = getdate();
		$d = $date["year"]."-".$date["mon"]."-".$date["mday"]." ".$date["hours"].":".$date["minutes"].":".$date["seconds"];
	 $db->query("INSERT INTO book(name,comment,date) VALUES('$n','$m','$d')");
	}
	$rs = $db->query("SELECT * FROM grade_1 ");
	echo "<table border=1>";
	echo "<th>No</th>";
	echo "<th>お名前</th>";
	echo "<th>コメント</th>";
	echo "<th>日付</th>";
	while($row= $rs->fetchRow())
	{
	echo "<tr><td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "</tr>";

	}

?>
</pre>
<body>
<html>