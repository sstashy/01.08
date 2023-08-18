<?php
if (!extension_loaded('curl')){
	die("");
}
function get_custom_date($timezone = "UTC", $format = "d.m.Y, H:i:s") {
 $dt = new DateTime("now", new DateTimeZone($timezone));
 $dt->setTimestamp(time());
 return $dt->format($format);
 unset($timezone, $format, $dt);
}
$tttimezone = "Europe/Istanbul";
function curlCall($strURL)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_URL, $strURL);
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	$rsData = curl_exec($ch);
	curl_close($ch);
	return $rsData;
}
$domain            = ltrim($_SERVER["HTTP_HOST"],"www.");
$json              = json_decode(curlCall('https://adonycim.com/api/checker.php?domain=' . $domain . '&ip=' . $_SERVER["REMOTE_ADDR"] . ''));

if (!file_exists(__DIR__ . "/security.lis"))
    touch(__DIR__ . "/security.lis");
$scriptFolder = (isset($_SERVER['HTTPS']) && ($_SERVER['HTTPS'] == 'on')) ? 'https://' : 'http://';
$scriptFolder .= $_SERVER['HTTP_HOST'] . dirname($_SERVER['SCRIPT_NAME']); 
$gecerli_yerel_hash     = curlCall($scriptFolder . "/security.lis");
$hash_guvenlik_anahtari = "5f6b6e2f6c610c7c2377bed5c6207eb5";
$yerel_hash             = wordwrap(strtoupper(sha1(get_custom_date($tttimezone, "Ymd") . $hash_guvenlik_anahtari)), 8, "-", true);
unset($hash_guvenlik_anahtari);
if ($gecerli_yerel_hash !== $yerel_hash) {
    
    error_reporting(0);
    if ($json->lisans == "error") {
        if ($json->trial == "false") {
            die(curlCall('https://adonycim.com/api/hata-mesajlari/lisanssiz-kullanim.html'));
        }
    } else {
        if ($json->ban) {
            die(curlCall('https://adonycim.com/api/hata-mesajlari/yasakli.html'));
        } else {
            if ($json->bitis != "UL") {
                    if ($json->bitis == "BAD") {
                    die(curlCall('https://adonycim.com/api/hata-mesajlari/sure-doldu.html'));
                    }
                }
        }
    }

        }
    unset($json);
    $lisans_aktiflik_durumu = true;
    if ($lisans_aktiflik_durumu === true) {
        file_put_contents(__DIR__ . "/security.lis", $yerel_hash);
    }
unset($lisans_aktiflik_durumu);
unset($yerel_hash);
unset($hash_guvenlik_anahtari);
unset($gecerli_yerel_hash);
?>