<div class="container-fluid">
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">Aile Sorgu</li>
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
                    <h4  class="card-title mb-4">
                        Aile Sorgu
                    </h4>
                    <h4 class="card-title mb-4"></h4>
                    <p class="mb-1">
                    <p>
                    </p>
                    </p>
                    <div class="block-content tab-content">
                        <div class="tab-pane active" id="tc" role="tabpanel">
                            <input class="form-control" type="text" id="tcno" maxlength="11" placeholder="TCKN"><br>

                        </div>
                        <div class="col-xl-12">
                                    <div class="mt-0">
                            <button onclick="checkNumber()" id="sorgula" name="yolla" class="btn w-sm btn-primary waves-effect waves-light" ><i class="fas fa-search"></i> Sorgula <span id="sorgulanumber"></span></button>
                            <button onclick="clearAll()" id="durdurButon" type="button" class="btn w-sm btn-light waves-effect waves-light" ><i class="fas fa-trash-alt"></i> Sıfırla </button>
                            </div>
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

<th>Yakınlık</th>
<th>TCKN</th>
<th>Ad</th>
<th>Soyad</th>
<th>Doğum Tarihi</th>
<th>Nüfus İl</th>
<th>Nüfus İlçe</th>
<th>GSM</th>

</tr>
                        </thead>
                        <tbody id="sonuccc">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script>
        function clearResults() {

        }

        function clearValues() {
            document.getElementById("tcno").value = "";
            document.getElementById("sorgulanumber").innerHTML = "";
        }

        function clearAll() {
            clearResults()
            clearValues()
        }

        function checkNumber() {
            var tcno = $("#tcno").val();

            if (tcno === "") {
        return;
    }
            $.Toast.showToast({
                "title": "Sorgulanıyor...",
                "icon": "loading",
                "duration": 60000
            });
            $.ajax({
                url: "../api/aile/api.php",
                type: "POST",
                data: {
                    tc: tcno,
                },
                success: (res) => {
                    clearResults();
                    $.Toast.hideToast();
                    let x = JSON.parse(res)
                    document.getElementById('sonuccc').innerHTML = ''
                    x.forEach(el=>{
                        document.getElementById('sonuccc').innerHTML += 
                    `
                        <tr>
                            <td>${el.Yakınlık}</td>
                            <td>${el.KimlikNo}</td>
                            <td>${el.Isim}</td>
                            <td>${el.Soyisim}</td> 
                            <td>${el.DogumTarihi}</td>    
                            <td>${el.NufusIl}</td> 
                            <td>${el.NufusIlce}</td>
                            <td>${el.GSM}</td>

                        </tr>

                    `
                })
                    

                },
                error: () => {
                    $.Toast.hideToast();
                    Swal.fire({
                        icon: 'error',
                        title: "",
                        text: ''
                    })
                }
            })
        }
    </script>