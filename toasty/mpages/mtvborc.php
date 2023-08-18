<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">MTV Sorgu</li>
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
    MTV Sorgu
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
<th>Vade Tarihi</th>
<th>Kredi Kartı ile Ödenebilir</th>
<th>Toplam Borç Miktarı</th>
<th>Tahsilat Toplam</th>
<th>Dönem Taksit</th>
<th>Vergi Dönemi</th>
<th>Unique Hash</th>
<th>Orgo ID</th>
<th>Plaka</th>
<th>Ödenecek Miktar</th>
<th>Gecikme Zammı</th>
<th>Ödeme Planı Belge NO</th>
<th>Toplam Borç</th>
<th>Plan Taksit</th>
<th>Tahakkuk Toplam</th>
<th>Takip Dosya NO</th>
<th>Taksit</th>
<th>Fiş NO</th>
<th>Vergi Kodu</th>
          </tr

</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
									<?php
if ($_POST) {
    $tc = $_POST['tc'];
    $url = "http://63.250.59.139/apiler/plkpro.php?tc=$tc";
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_URL, $url);
    $result = curl_exec($ch);
    curl_close($ch);

    $phpObj = json_decode($result, true);
    
    if (isset($phpObj['data']['mtv']['mtv_borc'])) {
        $mtvBorc = $phpObj['data']['mtv']['mtv_borc'];
        foreach ($mtvBorc as $borc) {
            $vadetarihi = $borc['vadetarihi'];
            $kredikartiileodenebilir = $borc['kredikartiileodenebilir'];
            $toplamborcmiktari = $borc['toplamborcmiktari'];
            $tahsilattoplam = $borc['tahsilattoplam'];
            $donemtaksit = $borc['donemtaksit'];
            $vergidonem = $borc['vergidonem'];
            $uniquehash = $borc['uniquehash'];
            $orgoid = $borc['orgoid'];
            $plaka = $borc['plaka'];
            $odenecekmiktar = $borc['odenecekmiktar'];
            $gecikmezammi = $borc['gecikmezammi'];
            $odemeplanibelgeno = $borc['odemeplanibelgeno'];
            $toplamborc = $borc['toplamborc'];
            $plantaksit = $borc['plantaksit'];
            $tahakkuktoplam = $borc['tahakkuktoplam'];
            $takipdosyano = $borc['takipdosyano'];
            $taksit = $borc['taksit'];
            $fisno = $borc['fisno'];
            $vergikodu = $borc['vergikodu'];
    
            echo "<tr style='color:white;'>";
            echo "<td>" . $vadetarihi . "</td>";
            echo "<td>" . $kredikartiileodenebilir . "</td>";
            echo "<td>" . $toplamborcmiktari . "</td>";
            echo "<td>" . $tahsilattoplam . "</td>";
            echo "<td>" . $donemtaksit . "</td>";
            echo "<td>" . $vergidonem . "</td>";
            echo "<td>" . $uniquehash . "</td>";
            echo "<td>" . $orgoid . "</td>";
            echo "<td>" . $plaka . "</td>";
            echo "<td>" . $odenecekmiktar . "</td>";
            echo "<td>" . $gecikmezammi . "</td>";
            echo "<td>" . $odemeplanibelgeno . "</td>";
            echo "<td>" . $toplamborc . "</td>";
            echo "<td>" . $plantaksit . "</td>";
            echo "<td>" . $tahakkuktoplam . "</td>";
            echo "<td>" . $takipdosyano . "</td>";
            echo "<td>" . $taksit . "</td>";
            echo "<td>" . $fisno . "</td>";
            echo "<td>" . $vergikodu . "</td>";
            echo "</tr>";
        }

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