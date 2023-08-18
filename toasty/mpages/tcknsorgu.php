<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">TCKN Sorgu</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title mb-0">TCKN Sorgu</h4>
                </div>

                <div class="card-body">
                    <form action="#">
                        <div class="mt-0">
                            <div class="row">
                                <div class="col-xl-6">
                                    <div class="mb-2">
                                        <input type="text" id="tcInput" maxlength="11" class="form-control" id="cleave-delimiters">
                                    </div>
                                </div>

                                <div class="col-xl-12">
                                    <div class="mt-0">
                                        <button type="button" onclick="kontrolEt()"
                                            class="btn w-sm btn-primary waves-effect waves-light">Sorgula</button>
                                        <button type="button" onclick="clearRow('#tcInput', '#tbody')"
                                            class="btn w-sm btn-light waves-effect waves-light">Temizle</button>
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
                                <th>TCKN</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Doğum Tarihi</th>
                                <th>Anne Adı</th>
                                <th>Baba Adı</th>
                                <th>Baba Adı</th>
                                <th>Baba TCKN</th>
                                <th>İl / İlçe</th>
                            </tr>
                        </thead>
                        <tbody id="tbody">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function kontrolEt() {
        checkRow('tcInput');
        $.ajax({
            url: "api/tcknsorgu/api.php",
            type: "POST",
            data: {
                tc: $('#tcInput').val(),
            },
            success: (res) => {
                if(res.success == true) {
                    $.ajax({
                        url: "",
                        type: "POST",
                        timeout: 3000,
                        data: {
                            tc: $('#tcInput').val(),
                        },
                        success: (r) => {
                            let adres;
                            let d = r[0];
                            adres = d.Address || "Bulunamadı";

                            showAlert("Sonuç bulundu.", "primary");
                            hideToast();
                            let array = [];
                            let data = res.data[0];
                            var numara = 1;
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
                            <td>${$('#tcInput').val()}</td>
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
                            $('#tbody').html(array);
                    },
                        error: (ee) => {

                        }
                    })
                } else {
                    hideToast();
                    showAlert("Bir sonuç bulunamadı!", "primary");
                }
            },
            error: (res) => {
                hideToast();
                showAlert("Bir hata oluştu! Lütfen yetkili ile iletişime geçin.", "primary");
            }
        })
    }
</script>