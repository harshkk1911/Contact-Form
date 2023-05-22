<?php
session_start();

header('Content-type: image/jpeg');

$random = rand(1000,9999);
$_SESSION['captcha'] = $random;

$image = imagecreate(80, 25);
$bgColor = imagecolorallocate($image, 255, 255, 255);
$textColor = imagecolorallocate($image, 0, 0, 0);

imagestring($image, 5, 20, 5, $random, $textColor);

imagejpeg($image);
imagedestroy($image);
?>
