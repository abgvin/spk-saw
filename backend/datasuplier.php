<div class="panel panel-white">
        <div class="panel-heading">
            <h4 class="panel-title">Data Supplier</h4>
        </div>
        <div class="panel-body">
            <button type="button" class="btn btn-success m-b-sm" data-toggle="modal" data-target="#myModal">Import Data</button>
            <!-- Modal -->
            <form action="" enctype="multipart/form-data" id="form-import" method="POST">
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Import Data Supplier</h4>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <input type="file" class="form-control" name="file" id="file" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <a href="../file/sample/data-supplier.xlsx" class="btn btn-info">Download Template</a>
                            <!-- <button type="submit" id="add-row" class="btn btn-success" name="import">Import</button> -->
                            <input type="submit" value="Import" name="import" class="btn btn-success">
                        </div>
                    </div>
                </div>
            </div>
            </form>
            <div class="table-responsive">
                <table id="example" class="display table table-hover table-data-width">
                    <thead>
                        <tr>
                            <th class="text-center" rowspan="2">#</th>
                            <th class="text-center" rowspan="2">Suplier</th>
                            <th class="text-center" colspan="2">Harga</th>
                            <th class="text-center" rowspan="2">Bahan</th>
                            <th class="text-center" rowspan="2">Waktu</th>
                            <th class="text-center" rowspan="2">Komunikasi</th>
                        </tr>
                        <tr>
                            <th class="text-center">Min</th>
                            <th class="text-center">Max</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $suppliers = mysqli_query($con, "SELECT * FROM data_supplier INNER JOIN tb_supplier ON data_supplier.id_supplier = tb_supplier.id_supplier") or die(mysqli_error($con));
                    foreach ($suppliers as $supplier) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td class=""><?= $supplier['id_supplier'] ?> - <?= $supplier['nama_supplier'] ?></td>
                            <td class="text-center">Rp. <?= number_format($supplier['min_harga']) ?></td>
                            <td class="text-center">Rp. <?= number_format($supplier['max_harga']) ?></td>
                            <td class="text-center"><?= $supplier['bahan'] ?></td>
                            <td class="text-center"><?= $supplier['waktu'] ?> Hari</td>
                            <td class="text-center"><?= $supplier['komunikasi'] ?></td>
                        </tr>
                    <?php } ?>

                    </tbody>
                    <!-- <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </tfoot> -->
                </table>
            </div>
        </div>
    </div>
</div>

<?php
if ( isset($_POST['import']) ) {
    mysqli_query($con, "DELETE FROM tb_supplier") or die(mysqli_error($con));
    mysqli_query($con, "DELETE FROM data_supplier") or die(mysqli_error($con));
    mysqli_query($con, "DELETE FROM fuzzy_supplier") or die(mysqli_error($con));

    $file = $_FILES['file']['name'];
    $ekstensi = explode(".", $file);
    $file_name = "file-".round(microtime(true)).".".end($ekstensi);
    $sumber = $_FILES['file']['tmp_name'];
    $target_dir = "../file/";
    $target_file = $target_dir.$file_name;
    move_uploaded_file($sumber, $target_file);

    $obj = PHPExcel_IOFactory::load($target_file);
    $all_data = $obj->getActiveSheet()->toArray(null, true, true, true);

    $sql = 'INSERT INTO tb_supplier (id_supplier, nama_supplier) VALUES';
    for ( $i=3; $i <= count($all_data); $i++ ) {
        $id_supplier   = trim(mysqli_real_escape_string($con, $all_data[$i]['B']));
        $nama_supplier = trim(mysqli_real_escape_string($con, $all_data[$i]['C']));
        $sql .= "('$id_supplier', '$nama_supplier'),"; 
    }
    $sql = substr($sql, 0, -1);
    // echo $sql;
    // echo "<br>";
    mysqli_query($con, $sql) or die(mysqli_error($con));

    $sql = "INSERT INTO data_supplier (id_supplier, min_harga, max_harga, bahan, waktu, komunikasi) VALUES";
    for ( $x=3; $x <= count($all_data); $x++ ) {
        $id_supplier = trim(mysqli_real_escape_string($con, $all_data[$x]['B']));
        $min_harga   = trim(mysqli_real_escape_string($con, $all_data[$x]['D']));
        $max_harga   = trim(mysqli_real_escape_string($con, $all_data[$x]['E']));
        $bahan       = trim(mysqli_real_escape_string($con, $all_data[$x]['F']));
        $waktu       = trim(mysqli_real_escape_string($con, $all_data[$x]['G']));
        $komunikasi  = trim(mysqli_real_escape_string($con, $all_data[$x]['H']));
        $sql .= "('$id_supplier', '$min_harga', '$max_harga', '$bahan', '$waktu', '$komunikasi' ),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die(mysqli_error($con));
    // echo $sql;

    $sql = "INSERT INTO fuzzy_supplier (id_supplier, c1, c2, c3, c4) VALUES";
    for ( $x=3; $x <= count($all_data); $x++ ) {
        $id_supplier = trim(mysqli_real_escape_string($con, $all_data[$x]['B']));

        $min_harga   = trim(mysqli_real_escape_string($con, $all_data[$x]['D']));
        $max_harga   = trim(mysqli_real_escape_string($con, $all_data[$x]['E']));
        if ( $min_harga <= 50000 && $max_harga <= 50000) { 
            $C1 = 1;
        } else if ( $min_harga >= 51000 && $max_harga <=89000 ) {
            $C1 = 2;
        } else if ( $min_harga >= 90000 && $max_harga >= 90000 ) {
            $C1 = 3;
        }

        $bahan       = trim(mysqli_real_escape_string($con, $all_data[$x]['F']));
        if ( $bahan == 'Katun') {
            $C2 = 3;
        } else if ( $bahan == 'Jeans' ) {
            $C2 = 2;
        } else if ( $bahan == 'Twiscone' ) {
            $C2 = 1;
        } else if ( $bahan == 'Kaos' ) {
            $C2 = 0;
        }

        $waktu       = trim(mysqli_real_escape_string($con, $all_data[$x]['G']));
        if ( $waktu == 1) {
            $C3 = 3;
        } else if ( $waktu == 2 ) {
            $C3 = 2;
        } else if ( $waktu == 3) {
            $C3 = 1;
        }

        $komunikasi  = trim(mysqli_real_escape_string($con, $all_data[$x]['H']));
        if ( $komunikasi == 'Cepat' ) {
            $C4 = 3;
        } else if ( $komunikasi== 'Normal' ) {
            $C4 = 2;
        } else if ( $komunikasi == 'Lambat' ) {
            $C4 = 1;
        }

        $sql .= "('$id_supplier', '$C1', '$C2', '$C3', '$C4' ),";
    }
    $sql = substr($sql, 0, -1);
    mysqli_query($con, $sql) or die(mysqli_error($con));

    unlink($target_file);

    echo "<script>
            window.location='admin.php?p=datasuplier';
            </script>";

}

?>

