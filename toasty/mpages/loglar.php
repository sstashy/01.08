<?php include "ayar.php";  ?>

<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                <h4 class="mb-sm-0">
                    <?= $title ?>
                </h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="https://t.me/wsglobal">WS Global</a></li>
                        <li class="breadcrumb-item active">
                            <?= $title ?>
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- end page title -->
    <!-- content -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">LOG'lar</h5>
                </div>

                <?php
                global $db;
                $kullanici = kullanicirol();

                $sorgu = $db->prepare("SELECT COUNT(*) FROM log");
                $sorgu->execute();
                $say = $sorgu->fetchColumn();
                if ($say == 0) {
                    echo "";
                } else {
                    $id = 1;
                    echo '<table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Kullanıcı Adı</th>
                                    <th>Yaptığı İşlem</th>
                                    <th>IP</th>
                                    <th>İşlem Tarihi</th>
                                    <th>İşlem Yaptığı Link</th>
                                    <th>Tarayıcı Bilgisi</th>
                                </tr>
                            </thead>
                            <tbody>';

                    $query = $db->query("SELECT * FROM log ORDER BY id DESC", PDO::FETCH_ASSOC);
                    if ($query->rowCount()) {
                        foreach ($query as $row) {
                            echo '
                                <tr class="odd gradeX">
                                    <td>' . $id . '</td>
                                    <td>' . $row["kadi"] . '</td>
                                    <td>' . $row["islem"] . '</td>
                                    <td>' . $row["ip"] . '</td>
                                    <td>' . date("d.m.Y H:i:s", strtotime($row["tarih"])) . '</td>
                                    <td>' . $row["link"] . '</td>
                                    <td>' . $row["tarayici"] . '</td>
                                </tr>';
                            $id++;
                        }
                    }

                    echo '</tbody>
                        </table>';
                }

                ?>

            </div>
        </div>
    </div>
</div>

<!-- end content -->

<script src="https://code.jquery.com/jquery-3.6.0.min.js"
    integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

<!--datatable js-->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>

<script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable();
    });
</script>