<?php
	session_start();

	$count_chars = 7;
	$rand_size   = rand(14, 30);
	$rand_angle  = rand(0, 45);
	$x = 20;
	$y = 40;
	$shift_x = 35;

	$img     = imageCreateFromJPEG('bg.jpg');
	$color   = imageColorAllocate($img, 0, 0, 0);
	$captcha = substr(base64_encode(md5(md5(uniqid()))), 0, $count_chars);

	$_SESSION['captcha'] = $captcha;

	for ($i = 0; $i < $count_chars; $i++){

		imageTtfText($img, $rand_size, $rand_angle, $x, $y, $color, 'bellb.ttf', $captcha{$i});
		$x += $shift_x;
	}

	header('Content-Type: image/jpeg');
	imageJPEG($img, null, 60);
?>
