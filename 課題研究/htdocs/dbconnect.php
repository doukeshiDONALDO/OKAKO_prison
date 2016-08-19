<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<?php
require "DB.php";
mysql_connect('localhost','root','lucchini') or die(mysql_error());
mysql_select_db('mini_bbs');
mysql_query('SET NAMES UTF8');
	$db = DB::connect("mysql://root:lucchini@localhost/mini_bbs");
	$db ->query("SET NAMES 'utf-8'");
?>