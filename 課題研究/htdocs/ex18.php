<HTML>
<HEAD><TITLE>f[^x[XπPEAR DBΕo·ιvO</TITLE></HEAD>
<BODY>

<table border="1"><tr align="center">
<td>hc</td><td>XΦΤ</td><td>§Ό</td><td>sζ¬Ί</td><td>¬ζ</td>
</tr>
<?php
require"MDB2.php";
$db = MDB2::connect("mysql://root:lucchini@localhost/test?charset=sjis");
if(PEAR::isError($db)) die("<p>{$db->getMessage()}</p>");//G[

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