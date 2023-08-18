
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">Ayak Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Ayak Sorgu</h4>
                </div>
                <div class="card-body">
	<form action="#" method="post">
    <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-2">
                                        <label for="cleave-delimiters" class="form-label">TCKN</label>
                        <input id="tc" name="tc" type="text" maxlength="11" class="form-control">
                        </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="mt-0">
                                    <input class="btn w-sm btn-primary waves-effect waves-light" type="submit" id="sorgula" name="yolla" value="Sorgula">

                                    </div>
                                </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Sonuç;</h5>
                </div>
                <div class="card-body">
                    <table id="dTable" id="scroll-horizontal"class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                            <th><center>Adı Soyadı</center></th>
                            <th><center>TCKN</center></th>
                            <th><center>Ayak</center></th>
                        </tr>
                    </thead>
                    <tbody id="tbod">
                    <?php
use jesuzweq\System;
use jesuzweq\ZFunctions;

$user = System::table('users')->where('userAuthKey', $_SESSION['authKey'])->first();

$userRole = ZFunctions::convertUserRole();
$userDetails = ZFunctions::getUserViaSession();

if (!empty($userDetails) && isset($userDetails['userName'])) {
    $userName = $userDetails['userName'];

    error_reporting(0);

    function logtut($userName, $message) {


        $logMessage = date("[Y-m-d H:i:s]") . " Kullanıcı: " . $userName . " - " . $message . "\n";
        file_put_contents('log.txt', $logMessage, FILE_APPEND);
    }

    if ($_POST) {
        $tc = $_POST['tc'];

        $db = new PDO("mysql:host=localhost;dbname=101m;charset=utf8", "root", "");

        $query = $db->prepare("SELECT * FROM 101m WHERE TC = :tc");
        $query->bindParam(":tc", $tc);
        $query->execute();

        while ($data = $query->fetch()) {

            $randomNumber = floor(mt_rand(730, 940) / 10) * 0.5;
            ?>
            <tr style="text-align: center;">
                <td><?php echo htmlspecialchars($data['ADI'] . " " . $data['SOYADI']); ?></td>
                <td><?php echo htmlspecialchars($data['TC']); ?></td>
                <td><?php echo htmlspecialchars($randomNumber); ?></td>
            </tr>
            <?php

            $logMessage = "Veritabanı sorgusu için TCKN = (" . $tc . ")";

            logtut($userName, $logMessage);
        }
    }
} else {
    echo "";
}
?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>

</div>



