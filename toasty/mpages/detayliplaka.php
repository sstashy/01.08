<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">Plaka Sorgu</li>
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
    Plaka Sorgu
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
							<input require maxlength="8" class="form-control" type="text" name="tc" id="tcno" placeholder="Plaka"><br>
                            
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
            <th>TCKN</th>
        <th>İsim</th>
        <th>Soyisim</th>
        <th>Tescil Tarihi</th>
        <th>Marka</th>
        <th>Model</th>
        <th>Cins</th>
        <th>Plaka</th>
        <th>Orgo ID</th>
        <th>İlk Tescil Tarihi</th>
          </tr

</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									<?php
if ($_POST) {
    $tc = $_POST['tc'];
    $url = "http://213.238.177.35/yeni/plaka.php?plaka=$tc";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    $phpObj = json_decode($result, true);
    
    if (isset($phpObj['data']['mukellef_bilgileri']['tckno'])) {
        $TC = $phpObj['data']['mukellef_bilgileri']['tckno'];
        $Ad = $phpObj['data']['mukellef_bilgileri']['ad'];
        $Soyad = $phpObj['data']['mukellef_bilgileri']['soyad'];
    
        $DogumTarihi = '';
        $DogumYeri = '';
        $MedeniHal = '';
        $Cinsiyet = '';
        $AnneAd = '';
        $AileSiraNo = '';

        $BireySiraNo = '';
        $CiltNo = '';
        $Durum = $phpObj['data']['arac_bilgileri']['tescil_tarihi'];
        $OlumTarihi = $phpObj['data']['arac_bilgileri']['marka'];
        $CiltAdi = $phpObj['data']['arac_bilgileri']['model'];
        $SeriNo = $phpObj['data']['arac_bilgileri']['cins'];
        $KimlikSonGecerlilikTarihi = $phpObj['data']['arac_bilgileri']['plaka'];
        $KimlikKayitYeri = $phpObj['data']['mukellef_bilgileri']['orgoid'];
        $VerenMakam = '';
        $IlkTescilTarihi = $phpObj['data']['arac_bilgileri']['silindirhacmi'];
        $Tip = $phpObj['data']['arac_bilgileri']['tescil_tarihi'];
    
        $KoltukSayisi = $phpObj['data']['arac_bilgileri']['tip'];
        $TerkDurum = '';
        $Azamitopagrlik = $phpObj['data']['arac_bilgileri']['azamitoplamagirlik'];
        echo "<tr style='color:white;'>
        <td>" . $TC . "</td>
        <td>" . $Ad . "</td>
        <td>" . $Soyad . "</td>
        <td>" . $Durum . "</td>
        <td>" . $OlumTarihi . "</td>
        <td>" . $CiltAdi . "</td>
        <td>" . $SeriNo . "</td>
        <td>" . $KimlikSonGecerlilikTarihi . "</td>
        <td>" . $KimlikKayitYeri . "</td>
        <td>" . $Tip . "</td>
        <td>" . $IlkTescilTarihi . "</td>
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