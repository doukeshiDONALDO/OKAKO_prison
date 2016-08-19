<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
require('../dbconnect.php');


if(!empty($_POST)){
	if($_POST['name'] == ''){
		$error['name'] ='blank';
	}

	if($_POST['grade'] == ''){
		$error['grade'] ='blank';
	}

	if($_POST['number'] == ''){
		$error['number'] ='blank';
	}

	if($_POST['password'] == ''){
		$error['password'] ='blank';
	}

	// 重複アカウントのチェック
	if (empty($error)) {
		$sql = sprintf('SELECT COUNT(*) AS cnt FROM members_t WHERE name="%s"',
			mysql_real_escape_string($_POST['name'])
		);
		$record = mysql_query($sql) or die(mysql_error());
		$table = mysql_fetch_assoc($record);
		if ($table['cnt'] > 0) {
			$error['name'] = 'duplicate';
		}
	}

	if(empty($error)) {
		$_SESSION['join'] = $_POST;
		header('Location: check.php');
		exit();
	}
}

if($_REQUEST['action'] == 'rewrite') {
	$_POST = $_SESSION['join'];
	$error['rewrite'] = true;
}
?>


<p>次のフォームに必要事項を入力してください<p>
<form action=""method="post"enctype="multipart/form-data">
	<dl>
		<dt>名前</dt>
		<dd><input type="text" name="name"size="20"maxlength="20"value="<?php echo htmlspecialchars($_POST['name'],ENT_QUOTES,'Shift-JIS'); ?>">
			<?php if($error['name'] == 'blank'): ?>
			<p class='error'>* 名前を入力してください</p>
			<?php endif; ?>
			<?php if($error['name'] == 'duplicate'): ?>
			<p class='error'>* その名前は既に登録されています</p>
			<?php endif; ?>
		</dd><br>

		<dt>学年</dt>
		<dd><input type="text" name="grade"size="2"maxlength="2">
			<?php if($error['name'] == 'blank'): ?>
			<p class='error'>* 学年を入力してください</p>
			<?php endif; ?>
		</dd><br>

		<dt>名簿番号</dt>
		<dd><input type="text" name="number"size="2"maxlength="2">
			<?php if($error['name'] == 'blank'): ?>
			<p class='error'>* 名簿番号を入力してください</p>
			<?php endif; ?>
		</dd><br>

		<dt>パスワード</dt>
		<dd><input type="text" name="password"size="10"maxlength="10">
			<?php if($error['name'] == 'blank'): ?>
			<p class='error'>* パスワードを入力してください</p>
			<?php endif; ?>
		</dd><br>
		</dl>

		<div><input type="submit" value="入力内容を確認する"></div><br>
</form>