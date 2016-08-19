<html>
	<head>
		<title>情報技術科内専用ページ</title>
		<link rel="stylesheet" type="text/css" href="style.css" >
		<script type ="text/javasqript">
		<!--
			function getWindowSize() {
			var sW,sH,s;
			if (document.all) {
				//Internet Explorer
				sW = document.body.clientWidth;
				sH = document.body.clientHeight;
				} else {
				//Firefox等
				sW = window.innerWidth;
				sH = window.innerHeight;
			}
			document.getElementById("WinSize").innerHTML = sW;

//-->		}
</script>



	</head>

	<body>

		<div id = "header">
			<h1 style="float:left;">Information-Technology</h1>
		
			
			<h5 style="float:right;">
<?php
	require('./dbconnect.php');


	$ad="172.20.12.112"
?>
</h5>

			<table border=0 width="WinSize" height="50px" style="color:white; clear:both;">
				<tr align="center" font-size="20px">
				<td width="170" color="white"><a target="bottom" href="top.php"style="color: #FFF;">HOME</a></td>
				<td width="170"><a target="bottom" href="kadai.php " style="color: #FFF;">Grade 1</a></td>
				<td width="170"><a target="bottom" href="kadai.php" style="color: #FFF;">Grade 2</a></td>
				<td width="170"><a target="bottom" href="kadai.php" style="color: #FFF;">Grade 3</a></td>
				<td width="170"><a target="bottom" href="teachers.php" style="color: #FFF;">Teachers</td>
				<td width="170"><a target="bottom" href="http://172.20.12.112/xampp/index.php" style="color: #FFF;">Administrator</a></td>
				<td width="170"><a target="bottom" href="http://www.nagano-c.ed.jp/okako/joho/index.htm"><img src="okakofooter.png"align="right"></a></td> 
				</tr>
			</table>
			
		</div>

	</body>
</html>

