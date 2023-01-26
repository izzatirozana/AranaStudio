<?php
session_start();
function acakCaptcha()
{
    $karakter = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $results = [];
    $karakter_panjang = strlen($karakter) - 2;
    for ($i = 0; $i < 6; $i++) {
        $n = rand(0, $karakter_panjang);
        $results[] = $karakter[$n];
    }
    return implode($results);
}

$code = acakCaptcha();
$_SESSION['captcha'] = $code;

$wh = imagecreatetruecolor(120, 40);
$bgc = imagecolorallocate($wh, 84, 84, 84);
$fc = imagecolorallocate($wh, 133, 135, 139);
imagefill($wh, 0, 0, $bgc);
imagestring($wh, 8, 27, 12, $code, $fc);


header('Content-type: image/png');
imagejpeg($wh);
imagedestroy($wh);
