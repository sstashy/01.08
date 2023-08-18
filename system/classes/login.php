<?php

namespace jesuzweq;

class JesuLogin extends System
{
    protected static $key;

    protected static function date_check()
    {
        date_default_timezone_set("Europe/Istanbul");
        $date = date('Y-m-d');
        $sqldate = self::table('users')->where('userAuthKey', self::$key)->first();

        if ($sqldate->userTime == null) {
            return true;
        }

        if (strtotime($date) > strtotime($sqldate->userTime)) {
            return false;
        }
        return true;
    }

    protected static function checkUserRole()
    {
        $sqlCheck = self::table('users')->where('userAuthKey', self::$key)->first();

        if ($sqlCheck->userRole == 0) {
            return false;
        } else {
            return true;
        }
    }

    protected static function ipcheck()
    {
        // İstemci IP adresini alıyoruz.
        if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
            $ip = $_SERVER['HTTP_CLIENT_IP'];
        } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
            $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
        } else {
            $ip = $_SERVER['REMOTE_ADDR'];
        }

        $sqlip = self::table('users')->where('userAuthKey', self::$key)->first();

        // Eğer multiCheck 1 olarak ayarlanmışsa, IP kontrolü yapmıyoruz.
        if ($sqlip->multiCheck == 1) {
            return true;
        }

        // İstemci IP adresini son 13 karakterine indirgiyoruz.
        $ip = substr($ip, -13);

        // Kullanıcının ilk kez giriş yapması durumunda IP adresini kaydediyoruz.
        if ($sqlip->userLog == null) {
            $updateIP = self::table('users')->where('userAuthKey', self::$key)->update([
                'userLog' => $ip
            ]);
            return true;
        }

        // Kaydedilen IP ile mevcut IP aynı değilse kullanıcıyı yasaklıyoruz.
        if ($ip != $sqlip->userLog) {
            $ban = self::table('users')->where('userAuthKey', self::$key)->update([
                'userVerified' => "0"
            ]);
            return false;
        }
        return true;
    }

    public static function checkUserStatus()
    {
        $sqlCheck = self::table('users')->where('userAuthKey', self::$key)->first();

        // Eğer userVerified 0 olarak ayarlanmışsa, kullanıcı pasif durumda demektir.
        if ($sqlCheck->userVerified == 0) {
            return false;
        } elseif ($sqlCheck->userVerified == 1) {
            return true;
        }
    }

    public static function updateBrowserOS()
    {
        // İstemci kullanıcı ajanından tarayıcı ve işletim sistemini tespit ediyoruz.
        $user_agent = $_SERVER['HTTP_USER_AGENT'];
        $browser = "N/A";
        $os = "Unknown";

        // Tarayıcıları tespit etmek için kullanılacak desenler.
        $browsers = [
            '/msie/i' => 'Internet explorer',
            '/firefox/i' => 'Mozilla Firefox',
            '/safari/i' => 'Safari',
            '/chrome/i' => 'Google Chrome',
            '/edge/i' => 'Microsoft Edge',
            '/opera/i' => 'Opera',
            '/mobile/i' => 'Mobile browser',
        ];

        // Kullanıcı ajanına göre tarayıcıyı tespit ediyoruz.
        foreach ($browsers as $regex => $value) {
            if (preg_match($regex, $user_agent)) {
                $browser = $value;
            }
        }

        // İstemci kullanıcı ajanına göre işletim sistemini tespit ediyoruz.
        if (strpos($user_agent, 'Windows') !== false) {
            $os = "Windows OS";
        } elseif (strpos($user_agent, 'Mac') !== false) {
            $os = "Mac OS";
        } elseif (strpos($user_agent, 'Linux') !== false) {
            $os = "Linux";
        } elseif (strpos($user_agent, 'iPhone') !== false) {
            $os = "iPhone";
        } elseif (strpos($user_agent, 'Android') !== false) {
            $os = "Android";
        } else {
            $os = "Unknown";
        }

        // Tarayıcı ve işletim sistemi bilgisini veritabanında güncelliyoruz.
        $updateBS = self::table('users')->where('userAuthKey', self::$key)->update([
            'userBrowser' => $browser,
            'userOS' => $os
        ]);

        return true;
    }

    public static function login()
    {
        $key = self::filter($_POST['authKey'], true);
        if (empty($key)) {
            return 'emptyKey';
        }

        // Kullanıcı giriş anahtarını alıyoruz.
        self::$key = $key;

        // Kullanıcıyı ilgili fonksiyonlarla kontrol ediyoruz.
        $sqlkey = self::table('users')->where('userAuthKey', $key)->first();
        $ip = self::ipcheck();
        $date = self::date_check();
        $checkUser = self::checkUserStatus();
        $BOS = self::updateBrowserOS();
        $checkrole = self::checkUserRole();

        // Hatalara göre uygun sonuçları döndürüyoruz.
        if (!$sqlkey) {
            return "wrongKey";
        } elseif ($ip != true) {
            return "multiSecure";
        } elseif ($date != true) {
            return 'endOfMembership';
        } elseif ($checkUser != true) {
            return 'deactiveMembership';
        } elseif ($BOS != true) {
            return "databaseError";
        } elseif ($checkrole != true) {
            return "freeMember";
        }

        // Tüm kontroller başarılıysa oturum açılıyor.
        $_SESSION['authKey'] = $sqlkey->userAuthKey;
        return "success";
    }
}
