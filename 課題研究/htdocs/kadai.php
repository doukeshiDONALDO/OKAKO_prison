<html>
<head>
	<link rel="stylesheet" type="text/css" href="style.css" >
	<script type="text/javascript">
		var bbb = 1;
		var ccc = 1; 
		function change(aaa) {
			if(aaa >= 10 || aaa <= -10)
				 bbb = aaa / 10 + bbb;
			ccc = aaa % 10 + ccc;
			if(bbb<=0)bbb=1;
			if(ccc<=0)ccc=1;
			number.value= bbb+"-"+ccc ;

		}
	</script>
</head>
<body>
<?php
	require('./dbconnect.php');




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

	if(!empty($_POST)) {
		if(empty($error)) {
			$image = date('Ymdhis').$_FILES['result']['name'];
			move_uploaded_file($_FILES['result']['tmp_name'],'./_file/'.$image);
		}
		if($_POST['name'] != '') {
			$sql = sprintf('INSERT INTO grade_1 SET user_id="%d",number="%s", name="%s", source="%s", result="%s", examination="%s",created=NOW()',
			mysql_real_escape_string($member['id']),
			mysql_real_escape_string($_POST['number']),
			mysql_real_escape_string($_POST['name']),
			mysql_real_escape_string(htmlspecialchars($_POST['source'])),
			mysql_real_escape_string($image),
			mysql_real_escape_string($_POST['examination'])
			);
			mysql_query($sql) or die(mysql_error());
			
		header('Location:kadai.php');
			exit();

			}
	}

	if(!isset($bbb) OR !isset($ccc)) {
  		$bbb = 1;
		$ccc = 1;
	}


	echo "<form action='' method='post'enctype='multipart/form-data'>";
	echo "<input id='down10' type='button'value='<<' onClick='change(-10)'>";
	echo "<input id='down1'  type='button'value='<' onClick='change(-1)'>";
	echo "<label>課題<input name='number' id='number'type='text' value='1-1'></label>";
	echo "<input id='up1'type='button'value='>' onClick='change(1)'>";
	echo "<input id='up10' type='button'value='>>' onClick='change(10)'>"; ?>
		<br><br>課題名：<br>
		<input type="text" name="name" size="35" maxlength="255"aria-required="true"  ><br>
		ソースコード：<br>
		<textarea type="text" name="source" cols="100" rows="15" ></textarea><br><br>
		実行結果：<br>
		<input type="file" name="result" size="50" id="result"><br><br>
		考察：<br>
		<textarea type="text" name="examination" cols="100" rows="7" ></textarea><br>
		<input type="submit" value="送信する" >
	</form>




</body>
</html>