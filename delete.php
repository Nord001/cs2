<?php
/**
$$$$$   $$$$$$  $$  $$   $$$$   $$  $$  $$$$$$
$$  $$    $$    $$$ $$  $$      $$  $$    $$
$$$$$     $$    $$ $$$  $$ $$$  $$  $$    $$
$$        $$    $$  $$  $$  $$   $$$$     $$
$$      $$$$$$  $$  $$   $$$$     $$    $$$$$$

Разработчик и дизайнер Сысолятин Артём
http://sysolyatin.com http://pingvi.org
https://github.com/temapingvi
E-mail: me@pingvi.org

Перед использованием, читайте файл лицензии.
**/
	require('config.php'); // Подключение файла настроек
	// Авторизация
	session_start();
	if (!(isset($_SESSION['autorized']) &&
		$_SESSION['autorized'] != '')) {
		header("Location: login.php");
	}
	// Обработка удаления контакта
	if(isset($_GET['user']))
	  {	
	  	$userid = $_GET['user']; // Получаем id контакта для удаления
	  	// Удаление строки из базы данных
	  	@mysql_connect($baza['server'], $baza['login'], $baza['pass']);
		@mysql_select_db($baza['baza']);
		//$query = "DELETE FROM `contacts` WHERE `id` = ".$userid."";
		$deluserresult = mysql_query ("DELETE FROM `contacts` WHERE `id`= '".$userid."'");
		mysql_close();
		header('Location: index.php?status=del');
		exit();
	  }
	header('Location: index.php');
?>
