<?php include "ayar.php"; ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                                                                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">Sigorta Sorgu</li>
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
    Sigorta Sorgu
</h4>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
							<form method="POST">
							<input require maxlength="11" class="form-control" type="text" name="tc" id="tcno"  placeholder="TCKN"><br>
                            
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
<th>TCKN</th>
<th>Kapsam</th>
<th>Kapsam Türü</th>
<th>Katılım Payından Muaf</th>
<th>Sigortalı Türü</th>
<th>Yakınlık Türü</th>


</tr>
                                    </thead>
                                    <tbody id="jojjoojj">
<?php
if ($_POST) {
    $tc = $_POST['tc'];

error_reporting(0);
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "http://63.250.59.139/apiler/sigorta.php?tc=$tc");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($ch);
curl_close($ch);

    $result = curl_exec($ch);

if ($result === false) {
    die("" . curl_error($ch));
}

$json_start = strpos($result, '{');
if ($json_start !== false) {
    $json_data = substr($result, $json_start);
} else {
    die("");
}

$users = json_decode($json_data, true);

if ($users === null) {
    die("" . json_last_error_msg());
}

            $KimlikNumarasi = $users['data']['KimlikNumarasi'] ?? '';
            $Adi = $users['data']['Adi'] ?? '';
            $Soyadi = $users['data']['Soyadi'] ?? '';
            $DogumTarihi = $users['data']['DogumTarihi'] ?? '';
            $Cinsiyet = $users['data']['Cinsiyet'] ?? '';
            $Kapsam = $users['data']['Kapsam'] ?? '';
            $KapsamTuru = $users['data']['KapsamTuru'] ?? '';
            $KatilimPayindanMuafmi = $users['data']['KatilimPayindanMuafmi'] ?? '';
            $SigortaliTuru = $users['data']['SigortaliTuru'] ?? '';
            $YakinlikTuru = $users['data']['YakinlikTuru'] ?? '';


             echo "<tr style='color:white;'</th><th>".$KimlikNumarasi."</th><th>".$Kapsam."</th><th>".$KapsamTuru."</th><th>".$KatilimPayindanMuafmi."</th><th>".$SigortaliTuru."</th><th>".$YakinlikTuru."</th></tr>";
       
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

        <script>
            function clearResults() {
                $("#jojjoojj").html('<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty">No data available in table</td></tr>');
                $("#tcno").val("");
            }

            function checkNumber() {
                /*
                return Swal.fire({
                    icon: "warning",
                    title: "Oooooopss...",
                    text: "Bu çözüm şu an bakımdadır!"
                });
                */

                var roleNumber = "<?= $k_rol ?>";

                if (parseInt(roleNumber) == 1 || parseInt(roleNumber) == 2 || parseInt(roleNumber) == 3 || parseInt(roleNumber) == 4 || parseInt(roleNumber) == 5 || parseInt(roleNumber) == 6 || parseInt(roleNumber) == 7) {

                    var tc = $("#tcno").val();
                    $.Toast.showToast({
                        "title": "Sorgulanıyor...",
                        "icon": "loading",
                        "duration": 60000
                    });
                    $.ajax({
                        url: "../api/lexas/adres.php",
                        type: "GET",
                        timeout: 10000,
                        data: {
                            tc: tc,
                            auth_key: "zweqallah"
                        
                        },
                        success: (res) => {
                            var json = res;
                            if (json[0].FirmTitle) {
                                $.Toast.hideToast();
                                var ad = json[0].FirmTitle;
                                var plaka = json[0].CityId;
                                var ilce = json[0].Town;
                                var mekan = json[0].TaxOffice;
                                var adres = json[0].Address;
                                $("#jojjoojj").html(
                                    `<tr> <th> ${ad} </th> <th> ${plaka} </th> <th> ${ilce} </th> <th> ${mekan} </th> <th> ${adres} </th> </tr>`
                                )
                            } else {
                                $.Toast.hideToast();
                                Swal.fire({
                                    icon: 'error',
                                    title: 'Bulunamadı!',
                                    text: 'Girdiğiniz TC kimlik numarası ile eşleşen bir bilgi bulunamadı.',
                                })
                            }
                        },
                        error: () => {
                            $.Toast.hideToast();
                            Swal.fire({
                                icon: 'error',
                                title: "Sunucu hatası!",
                                text: 'Lütfen yönetici ile iletişime geçin.'
                            })
                        }
                        
                }
            }
        </script>


    </div>