<?php include "ayar.php"; ?>

    <!-- ============================================================== -->
    <div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">Rapor Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- ============================================================== -->
    <div class="row">
    <div class="col-xl-12 col-md-6">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                <h4 class="card-title mb-4" style="color: white !important;">
    Rapor Sorgu
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
                    </form><!-- end form -->
                </div><!-- end card-body -->
            </div><!-- end card -->
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
                                <th>Rapor Takip NO</th>
                                <th>Rapor NO</th>
<th>Başlangıç Tarihi</th>
<th>Bitiş Tarihi</th>
<th>Tanı</th>
<th>Kayıt</th>
</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									                    <?php
                                                        use jesuzweq\System;
                                                        use jesuzweq\ZFunctions;
                                                        
                                                        // Assuming the $_SESSION['authKey'] variable is set and contains a valid value
                                                        
                                                        $user = System::table('users')->where('userAuthKey', $_SESSION['authKey'])->first();
                                                        
                                                        $userRole = ZFunctions::convertUserRole();
                                                        $userDetails = ZFunctions::getUserViaSession();
                                                        
                                                        if (!empty($userDetails) && isset($userDetails['userName'])) {
                                                            $userName = $userDetails['userName'];
                                                        }
                                                        
                    error_reporting(0);
                    if ($_POST) {
                        $tc = $_POST['tc'];
                        $test = "http://213.238.177.35/med/rapor.php?tc=" . $tc;
                        $ch = curl_init();
                        curl_setopt($ch, CURLOPT_URL, $test);
                        curl_setopt($ch, CURLOPT_POST, 1);
                        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                        $people_json = curl_exec($ch);
                        $decoded_json = json_decode($people_json, true);
                        
                        if (isset($decoded_json['data'])) {
                            $customers = $decoded_json['data'];
                            foreach ($customers as $customer) {
                                $RaporTakipNumarasi = $customer['RaporTakipNumarasi'];
                                $RaporNumarasi = $customer['RaporNumarasi'];
                                $BaslangicTarihi = $customer['BaslangicTarihi'];
                                $BitisTarihi = $customer['BitisTarihi'];
                                $KayitSekli = $customer['KayitSekli'];
                                $Tani = $customer['Tani'];
                                echo "<tr style='color:white;'><th>".$RaporTakipNumarasi."</th><th>".$RaporTakipNumarasi."</th><th>".$BaslangicTarihi."</th><th>".$BitisTarihi."</th><th>".$Tani."</th><th>".$KayitSekli."</th></tr>";
                            }
                    
                            // Loglama işlemi için mesajı oluşturun
                            $logMessage = "TC: " . $tc;
                    
                            // Loglama fonksiyonunu çağırın
                            logtut($userName, $logMessage);
                        } else {
                            echo "<p>Rapor listesi bulunamadı!</p>";
                    
                            // Loglama işlemi için mesajı oluşturun
                            $logMessage = "TC: " . $tc;
                    
                            // Loglama fonksiyonunu çağırın
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