"<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">İBAN Sorgu</li>
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
    İBAN Sorgu
</h4>

                    <p class="mb-1">
                    <p>
                    </p>
                    <p class="mb-1">


</p>

                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="1100" class="form-control" type="text" name="tc" id="tcno" placeholder="İBAN"><br>
                            
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
                <div class="card-bodyy">
                <style>
    .card-bodyy {
        overflow: auto;
        height: 200px;
    }
</style>

                    <table id="dTable" id="scroll-horizontal"class="table nowrap align-middle" style="width:100%">
                        <thead>
                            <tr>
                            <t style='color:white;'>
            
        <th>Adı</th>
        <th>Kod</th>
        <th>Swift</th>
        <th>Hesap NO</th>
        <th>Ad</th>
        <th>Kod</th>
        <th>İl</th>
        <th>İlçe</th>
        <th>Telefon</th>
        <th>Adres</th>
        
        
          </tr

</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									<?php
if ($_POST) {
    $tc = $_POST['tc'];
    $url = "http://213.238.177.35/gotmulalesi/ibansorgu.php?iban=$tc";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    $phpObj = json_decode($result, true);
    
    if (isset($phpObj['BANKA']['Adı'])){
        $Adı = $phpObj['BANKA']['Adı'];
        $Kod = $phpObj['BANKA']['Kod'];
        $Swift = $phpObj['BANKA']['Swift'];
        $HesapNO = $phpObj['BANKA']['HesapNO'];
        
        $Ad = $phpObj['ŞUBE']['Ad'];
        $Kod = $phpObj['ŞUBE']['Kod'];
        $İl = $phpObj['ŞUBE']['İl'];
        $İlçe = $phpObj['ŞUBE']['İlçe'];
        $Tel = $phpObj['ŞUBE']['Tel'];
        $Adres = $phpObj['ŞUBE']['Adres'];
        
        echo "<tr style='color:white;'>
        <td>" . $Adı . "</td>
        <td>" . $Kod . "</td>
        <td>" . $Swift . "</td>
        <td>" . $HesapNO . "</td>
        <td>" . $Ad . "</td>
        <td>" . $Kod . "</td>
        <td>" . $İl . "</td>
        <td>" . $İlçe . "</td>
        <td>" . $Tel . "</td>
        <td>" . $Adres . "</td>
        
      </tr>";

    }
    
    
   
          else {
            echo "<tr style='color:white;'><th colspan='7'>Veriler bulunamadı!</th></tr>";
          }
    
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