<?php
	header('Content-Type: text/html; charset=utf-8');
	session_start();

	if($_SERVER['REQUEST_METHOD'] == 'POST'){

		if($_SESSION['captcha'] == $_POST['text'])
			$msg = 'ок';
		else
			$msg = 'ошибка';
	}
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Капча</title>
</head>
<body>
	<form action="" method="post">
		<img src="captcha.php">
		<div>
			<label>Введите Капчу :</label>
			<input type="text" name="text" size="15"> <?php echo($msg); ?>
		</div>
		<input type="submit" value="OK">
	</form>
</body>
</html>
