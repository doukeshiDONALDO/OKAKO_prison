<?php
require('dbconnect.php');
/*"<?php echo htmlspecialchars($_POST['name']);?>*/
if(!empty($_POST)){
	if($_POST['id'] != '' && $_POST['password'] != '') {
		$sql = sprintf('SELECT * FROM members_t WHERE id="%s" and password ="%s"',
		mysql_real_escape_string($_POST['id']),
		mysql_real_escape_string(sha1($_POST['password']))
		);
		$record = mysql_query($sql) or die(mysql_error());
		if($table = mysql_fetch_assoc($record)){
			$_SESSION['id'] = $table['id'];
			$_SESSION['time'] = time();
			$_SESSION['kind'] = 1;
			header('Location: top.php');
			exit();
		} 
		else{
			$error['login'] = 'failed';
		}
	}
	else{
		$error['login'] = 'blank';
	}
}
?>

<form action="" method="post">
	<dl>
		<dt>ユーザーID　例：１年１番　→　11</dt>
		<dd>
		<input type="text" name="id" size="35" maxlength="255" value="">
		<?php if($error['login'] == 'blank'): ?>
		<p class="error">* ユーザーIDを入力してください</p>
		<?php endif; ?>
		<?php if($error['login'] == 'failed'): ?>
		<p class="error">* ログインに失敗しました。スペースなど正しくご記入ください。</p>
		<?php endif; ?>
		</dd>
		<dt>パスワード</dt>
		<dd>
		<input type="text" name="password" size="35" maxlength="255"value="<?php echo htmlspecialchars($_POST['password']);?>">
		</dd>
		<dt>ログイン情報の記録</dt>
		<dd>
		<input id="save" type="checkbox" name="save" value="on"><label for="save">次回からは自動的にログインする</label>
		</dd>
	</dl>
	<div><input type="submit" value="ログインする"></div>
	<p>&raquo;<a href="join_t/">アカウント新規登録></a></p>
</form>
