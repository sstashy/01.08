<?php include "ayar.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">Operatör Sorgu</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS-GLOBAL</a></li>
                        <li class="breadcrumb-item active">Operatör Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

<div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-4" style="color: white !important;">
    Operatör Sorgu
</h4>

                    <p class="mb-1">
                    <p>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="11" class="form-control" type="text" name="tc" id="tcno" placeholder="GSM"><br>
                            
                            <center>
                            </div>
                            <div class="col-xl-6">
                                <div class="mt-0">

                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn w-sm btn-primary waves-effect waves-light" style="float:left;"> Sorgula <span id="sorgulanumber"></span></button>
      </td>
      <td>&nbsp;&nbsp;</td>
      <td>
        <button onclick="clearResults()" id="durdurButon" type="button" class="btn w-sm btn-light waves-effect"> Temizle </button>

                        </div>
                            </div>
                        </div>
                    </form>
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
<th>GSM</th>
<th>Operatör</th>

</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
                                    <?php
use jesuzweq\System;
use jesuzweq\ZFunctions;

$user = System::table('users')->where('userAuthKey', $_SESSION['authKey'])->first();

$userRole = ZFunctions::convertUserRole();
$userDetails = ZFunctions::getUserViaSession();

if (!empty($userDetails) && isset($userDetails['userName'])) {
    $userName = $userDetails['userName'];

    error_reporting(0);

    // Verilerin var olduğunu kontrol edin
    if ($_POST) {
        $tc = $_POST['tc'];
        $url = "http://213.238.177.35/gotmulalesi/ope.php?no=" . $tc;
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_URL, $url);
        $result = curl_exec($ch);
        curl_close($ch);
    
        $phpObj = json_decode($result, true);
    
        if (isset($phpObj['data']) && count($phpObj['data']) > 0) {
            foreach ($phpObj['data'] as $data) {
                $numara = $data['numara'];
                $operatör = $data['operatör'];
    
                echo "<tr style='color:white;'><th>".$numara."</th><th>".$operatör."</th></tr>";
            }
        
    
    
        
        
        
    
    
    

            $logMessage =" TCKN = (" . $tc . ")";

            logtut($userName, $logMessage);
        } else {
            echo "<tr style='color:white;'><th colspan='5'>Veriler bulunamadı!</th></tr>";

            $logMessage = "TC = (" . $tc . ")";

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
            </div>
        </div>




    </div>