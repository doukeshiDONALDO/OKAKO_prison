<?php
	session_start();

	if(isset($_POST['my_id'])) {
		$_SESSION['my_id'] = $_POST['my_id'];
	}
?>
