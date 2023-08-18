<?php
use jesuzweq\System;
use jesuzweq\ZFunctions;

$user = System::table('users')->where('userAuthKey', $_SESSION['authKey'])->first();

$userRole = ZFunctions::convertUserRole();
$userDetails = ZFunctions::getUserViaSession();

if (!empty($userDetails) && isset($userDetails['userName'])) {
    $userName = $userDetails['userName'];

	function kullanicirol(){
		global $db;
	
		if (isset($_COOKIE["userName"]) && isset($_COOKIE["userAuthKey"])) {
			$kadi = $_COOKIE["userName"];
			$sifre = $_COOKIE["userAuthKey"];
			$kullanicibilgisi = $db->query("SELECT * FROM users WHERE userName = '{$kadi}' AND userAuthKey = '{$sifre}'")->fetch(PDO::FETCH_ASSOC);
			return $kullanicibilgisi;
		} else {
			return false;
		}
	}

	function GetIP() {
		$ip = '';
	
		if (isset($_SERVER['HTTP_X_FORWARDED_FOR'])) {
			$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
		} elseif (isset($_SERVER['HTTP_CLIENT_IP'])) {
			$ip = $_SERVER['HTTP_CLIENT_IP'];
		} elseif (isset($_SERVER['REMOTE_ADDR'])) {
			$ip = $_SERVER['REMOTE_ADDR'];
		}
	
		$ip = explode(',', $ip);
		$ip = trim($ip[0]);
	
		return $ip;
	}



		


function logtut($kadi, $islem){
    global $db;
    $tarayici = $_SERVER['HTTP_USER_AGENT'];
    $link = $_SERVER['REQUEST_URI'];
    $ip_adresi = GetIP();
    $tarih = date('Y-m-d H:i:s');
    
    $query = $db->prepare("INSERT INTO log SET
        kadi = ?,
        islem = ?,
        ip = ?,
        tarih = ?,
        link = ?,
        tarayici = ?");
    $insert = $query->execute(array(
        $kadi, $islem, $ip_adresi, $tarih, $link, $tarayici
    ));
}

}
?>

<body>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>


    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
</body>
