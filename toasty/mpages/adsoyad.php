<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="discord.gg/wscheck">WS Global</a></li>
                        <li class="breadcrumb-item active">Ad Soyad Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">Ad Soyad Sorgu</h4>
                </div>
                <div class="card-body">
                    <form action="#">
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiters" class="form-label">Ad</label>
                                        <input type="text" class="form-control" id="adInput" id="cleave-delimiters">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiter" class="form-label">Soyad</label>
                                        <input type="text" class="form-control" id="soyadInput" id="cleave-delimiter">
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiters" class="form-label">İl</label>
                                        <input type="text" class="form-control" id="ilInput" id="cleave-delimiters">
                                    </div>
                                </div>

                                <div class="col-xl-6">
                                    <div class="mb-3">
                                        <label for="cleave-delimiter" class="form-label">İlçe</label>
                                        <input type="text" class="form-control" id="ilceInput" id="cleave-delimiter">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xl-6">
                                <div class="mt-0">
                                    <button onclick="kontrolEt();" type="button" class="btn w-sm btn-primary waves-effect waves-light">Sorgula</button>
                                    <button type="button" onclick="clearAdSoyad('#adInput', '#soyadInput', '#ilInput', '#ilceInput', '#adSoyadTable');" class="btn w-sm btn-light waves-effect waves-light">Temizle</button>
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
                                <th>ID</th>
                                <th>TCKN</th>
                                <th>AD</th>
                                <th>SOYAD</th>
                                <th>Doğum Tarihi</th>
                                <th>Anne Adı</th>
                                <th>Anne TCKN</th>
                                <th>Baba Adı</th>
                                <th>Baba TCKN</th>
                                <th>İl / İlçe</th>
                            </tr>
                        </thead>
                        <tbody id="adSoyadTable">
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function kontrolEt() {
        checkAdSoyad();
        $.ajax({
            url: "api/adsoyad/api.php",
            type: "POST",
            data: {
                ad: $('#adInput').val(),
                soyad: $('#soyadInput').val(),
                il: $('#ilInput').val(),
                ilce: $('#ilceInput').val(),
            },
            success: (res) => {
                if(res.success == true) {
                    hideToast();
                    showAlert("Sonuç bulundu!", "primary");
                    let array = [];
                    for(let i = 0; i < res.number; i++) {
                        if(i == 200) {
                            showAlert("En fazla 200 kişiyi görüntüleyebilirsiniz!", "primary", 5000);
                            break;
                        }
                        let data = res.data[i];
                        var numara = i + 1;
                        var tc = data.TC || "Bulunamadı";
                        var ad = data.ADI || "Bulunamadı";
                        var soyad = data.SOYADI || "Bulunamadı";
                        var anneadi = data.ANNEADI || "Bulunamadı";
                        var annetc = data.ANNETC || "Bulunamadı";
                        var babaadi = data.BABAADI || "Bulunamadı";
                        var babatc = data.BABATC || "Bulunamadı";
                        var dogumtarihi = data.DOGUMTARIHI || "Bulunamadı";
                        var il = data.NUFUSIL || "Bulunamadı";
                        var ilce = data.NUFUSILCE || "Bulunamadı";
                        var ililce = `${il} / ${ilce}`;
                        var result = `<tr >
                            <td>${numara.toString()}</td>
                            <td>${tc}</td>
                            <td>${ad}</td>
                            <td>${soyad}</td>
                            <td>${dogumtarihi}</td>
                            <td>${anneadi}</td>
                            <td>${annetc}</td>
                            <td>${babaadi}</td>
                            <td>${babatc}</td>
                            <td>${ililce}</td>
                        </tr>`
                        array.push(result);
                    }
                    $('#adSoyadTable').html(array);
                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "primary");
                }
            },
            error: (res) => {
                hideToast();
                showAlert("Bir hata oluştu! Lütfen yetkili ile iletişime geçin!", "primary");
            }
        })
    }
</script>

<script>
        console.log("makima");
    </script>