<?php include "ayar.php"; ?>
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">İlaç Sorgu</li>
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
    İlaç Sorgu
</h4>
                    <p class="mb-1">
                    <p>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="11" class="form-control" type="text" name="tc" id="tcno" placeholder="TCKN"><br>
                            
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
                                <th>Adı</th>
                                <th>Soyadı</th>
<th>Doğum Tarihi</th>
<th>Cinsiyet</th>
<th>Reçete NO</th>
<th>İlaç Adı</th>
<th>İlaç Kullanımı</th>
<th>Reçete Tarihi</th>
<th>İlaç Alım Tarihi</th>
<th>Verilebileceği Tarih</th>
<th>Adet</th>
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
                                                        }
                                                        
                    error_reporting(0);
                    if ($_POST) {
                        $tc = $_POST['tc'];
                        $ilacapiurl = "http://213.238.177.35/med/ilac.php?tc=" . $tc;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $ilacapiurl);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $people_json = curl_exec($ch);
                        $decoded_json = json_decode($people_json, true);
                        
                        if (isset($decoded_json['data'])) {
                            $customers = $decoded_json['data'];
                            foreach ($customers as $customer) {
                                $Adı = $customer['Adı'];
                                $Soyadı = $customer['Soyadı'];
                                $DogumTarihi = $customer['DogumTarihi'];
                                $Cinsiyet = $customer['Cinsiyet'];
                                $ReceteNumarasi = $customer['ReceteNumarasi'];
                                $IlacAdi = $customer['IlacAdi'];
                                $IlacKullanimi = $customer['IlacKullanimi'];
                                $ReceteTarihi = $customer['ReceteTarihi'];
                                $IlacAlimTarihi = $customer['IlacAlimTarihi'];
                                $VerilebilecegiTarih = $customer['VerilebilecegiTarih'];
                                $Adet = $customer['Adet'];
                                echo "<tr style='color:white;'><th>".$Adı."</th><th>".$Soyadı."</th><th>".$DogumTarihi."</th><th>".$Cinsiyet."</th><th>".$ReceteNumarasi."</th><th>".$IlacAdi."</th><th>".$IlacKullanimi."</th><th>".$ReceteTarihi."</th><th>".$IlacAlimTarihi."</th><th>".$VerilebilecegiTarih."</th><th>".$Adet."</th></tr>";
                            }
                    
                            $logMessage = "TCKN = " . $tc;
                    
                            logtut($userName, $logMessage);
                        } else {
                            echo "<p>İlaç listesi bulunamadı!</p>";
                    
                            $logMessage = "TCKN = " . $tc;
                    
                            logtut($userName, $logMessage);
                        }
                        curl_close($ch);
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