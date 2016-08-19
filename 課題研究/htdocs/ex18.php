<HTML>
<HEAD><TITLE>データベースをPEAR DBで抽出するプログラム</TITLE></HEAD>
<BODY>

<table border="1"><tr align="center">
<td>ＩＤ</td><td>郵便番号</td><td>県名</td><td>市区町村</td><td>町域</td>
</tr>
<?php
require"MDB2.php";
$db = MDB2::connect("mysql://root:lucchini@localhost/test?charset=sjis");
if(PEAR::isError($db)) die("<p>{$db->getMessage()}</p>");//エラー処理

$rs = $db->query("SELECT * FROM nagano");
while ($row = $rs->fetchRow())
{
	echo "<tr>";
	echo "<td>".$row[0]."</td>";
	echo "<td>".$row[1]."</td>";
	echo "<td>".$row[2]."</td>";
	echo "<td>".$row[3]."</td>";
	echo "<td>".$row[4]."</td>";
	echo "</tr>";
}
?>
</table>

</BODY>
</HTML>