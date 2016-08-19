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

	$id = $_REQUEST['id'];
	$id_now = mysql_real_escape_string($_SESSION['id']);	

	$rs = $db->query("SELECT * FROM grade_1 WHERE user_id ='".$id_now."' AND number ='".$id."'");
	
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
			$sql = sprintf('UPDATE grade_1 SET name="%s", source="%s", examination="%s",created=NOW() WHERE user_id ="%s" AND number ="%s"',
			mysql_real_escape_string($_POST['name']),
			mysql_real_escape_string($_POST['source']),
			mysql_real_escape_string($_POST['examination']),
			$id_now,
			$id
			);
			mysql_query($sql) or die(mysql_error());
			
		header('Location:student.php');
			exit();

			}
	}

	if(!isset($bbb) OR !isset($ccc)) {
  		$bbb = 1;
		$ccc = 1;
	}

	$row= $rs->fetchRow(); ?>
	<form action='' method='post'enctype='multipart/form-data'>
	<label>課題:<?php echo $row[1]; ?></label> 
		<br><br>課題名：<br>
		<input type="text" name="name" size="35" maxlength="255"aria-required="true" value="<?php echo $row[2]; ?>"  ><br>
		ソースコード：<br>
		<textarea type="text" name="source" cols="100" rows="15"><?php echo $row[3]; ?></textarea><br><br>
		実行結果：<br>
		<?php echo $row[4]; ?><br><br>
		考察：<br>
		<textarea type="text" name="examination" cols="100" rows="7" ><?php echo $row[5]; ?></textarea><br>
		<input type="submit" value="送信する" >
	</form>




</body>
</html>