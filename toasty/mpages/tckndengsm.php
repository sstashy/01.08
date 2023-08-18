<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">WS Global</h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">TCKN->GSM Sorgu</li>
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
                    <h4 class="card-title mb-4">TCKN->GSM Sorgu</h4>
                    <p class="mb-1">
                    <p>
                    </p>
                    </p>
                    <div class="block-content tab-content">
    <div class="tab-pane active" id="tc" role="tabpanel">
        <input class="form-control" type="text" id="tcxx" maxlength="11" placeholder="TCKN"><br>
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
                                <th>TCKN</th>
                                <th>GSM</th>
                            </tr>
                        </thead>
                        <tbody id="jojjoojj">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
    function clearResults() {

        $("#jojjoojj").html(
            '<tr class="odd"><td valign="top" colspan="21" class="dataTables_empty"></td></tr>'
        );

        $("#tcxx").val("");
    }
</script>
     <script>
                error_reporting(0);

                                            function checkNumber() {
                                                
                                                
                                        
                                                    $.Toast.showToast({
                                                        "title": "Sorgulanıyor...",
                                                        "icon": "loading",
                                                        "duration": 3
                                                    });
                                                    $.ajax({
                                                    url: "../api/tckngsm/api.php",
                                                    type: "POST",
                                                    data: {										
                                                        tc: $("#tcxx").val(),				
                                                    },
                                                    success: (res) => {
                                                        if (res) {
                                                            var json = JSON.parse(res);
                                                            
                                                            $('tbody').html("");
                                                    $.each(json, function(key, value) {
                                                        
                                                        $('tbody').append('<tr>' +
                                                     
                                                            '<td>' + value.TC + '</td>' +
                                                            '<td>' + value.GSM + '</td>' +
                                                           
                                                                '</tr>');
                                                    });
                                                        } else {
                                                            alert("Hata oluştu!");
                                                            return;
                                                        }
                                                    },
                                                    error: () => {
                                                        alert("Hata oluştu!");
                                                    }
                                                    
                                                });
                                            }
                                        
                                        </script>