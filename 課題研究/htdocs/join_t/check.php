<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php 
require('../dbconnect.php');

if(!isset($_SESSION['join'])) {
	header('Location: index.php');
	exit();
}

if(!empty($_POST)){
	$sql = sprintf('INSERT INTO members_s SET id="%s", name="%s" , grade="%s" , number="%s" , password="%s" , created="%s" ',
	mysql_real_escape_string($_SESSION['join']['grade'].$_SESSION['join']['number']),
	mysql_real_escape_string($_SESSION['join']['name']),
	mysql_real_escape_string($_SESSION['join']['grade']),
	mysql_real_escape_string($_SESSION['join']['number']),
	mysql_real_escape_string(sha1($_SESSION['join']['password'])),
	date('Y-m-d H:i:s'));
	mysql_query($sql) or die(mysql_error());
	unset($_SESSION['join']);
	header('Location: thanks.php');
	exit();
}
?>

<form action=""method="post">
	<input type="hidden" name="action" value="submit">
	<dl>
		<dt>名前</dt>
		<dd><?php echo $_SESSION['join']['name']; ?></dd><br>

		<dt>学年</dt>
		<dd><?php echo $_SESSION['join']['grade']; ?></dd><br>

		<dt>名簿番号</dt>
		<dd><?php echo $_SESSION['join']['number']; ?></dd><br>

		<dt>パスワード</dt>
		<dd><?php echo $_SESSION['join']['password']; ?></dd><br>
		</dl>

		<div><a href="index.php?action=rewrite">&laquo;&nbsp;書き直す</a>
			<input type="submit" value="入力内容を確認する"></div><br>
</form>