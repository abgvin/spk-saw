<div class="panel panel-white">
    <div class="panel-heading">
        <h4 class="panel-title">menghitung niali rating kinerja ternormalisasi </h4>
    </div>
<form action="" method="post">
<div class="row">
    <div class="col-md-3">
    <h4>Normalisasi C1</h4>
        <hr>
        <?php
        // mendapatkan Nilai Max dari C1
        $sqls = mysqli_query($con, "SELECT MIN(c1) AS min FROM fuzzy_supplier") or die(mysqli_error($con));
        $array = mysqli_fetch_array($sqls);
        $min = $array['min'];

        $no = 1;
        $sqls = mysqli_query($con, "SELECT c1, id_supplier FROM fuzzy_supplier") or die(mysqli_error($con));
        foreach ($sqls as $sql) { ?>
            <div class="form-group">
                <input type="number" name="R1<?= $no ?>" value="<?= round($min / $sql['c1'], 2) ?>" class="form-control input-sm" readonly>
                <input type="hidden" name="id-supplierke-<?= $no ?>" value=<?= $sql['id_supplier'] ?> class="form-control">
            </div>
            <?php $no++ ?>
        <?php } ?>
        <hr>
        <div class="form-group">
            <label for="">Bobot C1</label>
            <input type="text" name="bobot-c1" id="" class="form-control" value="0.4" required>
        </div>
    </div>

    <div class="col-md-3">
    <h4>Normalisasi C2</h4>
        <hr>
        <?php
        // mendapatkan Nilai Max dari C1
        $sqls = mysqli_query($con, "SELECT MAX(c2) AS max FROM fuzzy_supplier") or die(mysqli_error($con));
        $array = mysqli_fetch_array($sqls);
        $max = $array['max'];

        $no = 1;
        $sqls = mysqli_query($con, "SELECT c2 FROM fuzzy_supplier") or die(mysqli_error($con));
        foreach ($sqls as $sql) { ?>
            <div class="form-group">
                <?php round( $sql['c2'] / $max, 2) ?>
                <input type="number" name="R2<?= $no++ ?>" value="<?= round( $sql['c2'] / $max, 2)?>" class="form-control input-sm" readonly>
            </div>
        <?php } ?>
        <hr>
        <div class="form-group">
            <label for="">Bobot C2</label>
            <input type="text" name="bobot-c2" id="" class="form-control" value="0.3" required>
        </div>
    </div>

    <div class="col-md-3">
    <h4>Normalisasi C3</h4>
        <hr>
        <?php
        // mendapatkan Nilai Max dari C1
        $sqls = mysqli_query($con, "SELECT MAX(c3) AS max FROM fuzzy_supplier") or die(mysqli_error($con));
        $array = mysqli_fetch_array($sqls);
        $max = $array['max'];

        $no = 1;
        $sqls = mysqli_query($con, "SELECT c3 FROM fuzzy_supplier") or die(mysqli_error($con));
        foreach ($sqls as $sql) { ?>
            <div class="form-group">
                <?php round( $sql['c3'] / $max, 2) ?>
                <input type="number" name="R3<?= $no++ ?>" value="<?= round( $sql['c3'] / $max, 2)?>" class="form-control input-sm" readonly>
            </div>
        <?php } ?>
        <hr>
        <div class="form-group">
            <label for="">Bobot C3</label>
            <input type="text" name="bobot-c3" id="" class="form-control" value="0.2" required>
        </div>
    </div>

    <div class="col-md-3">
    <h4>Normalisasi C4</h4>
        <hr>
        <?php
        // mendapatkan Nilai Max dari C1
        $sqls = mysqli_query($con, "SELECT MAX(c4) AS max FROM fuzzy_supplier") or die(mysqli_error($con));
        $array = mysqli_fetch_array($sqls);
        $max = $array['max'];

        $no = 1;
        $sqls = mysqli_query($con, "SELECT c4 FROM fuzzy_supplier") or die(mysqli_error($con));
        foreach ($sqls as $sql) { ?>
        <div class="form-group">
            <?php round( $sql['c4'] / $max, 2) ?>
            <input type="number" name="R4<?= $no++ ?>" value="<?= round( $sql['c4'] / $max, 2)?>" class="form-control input-sm" readonly>
        </div>
        <?php } ?>
        <hr>
        <div class="form-group">
            <label for="">Bobot C4</label>
            <input type="number" name="bobot-c4" id="" class="form-control" value="0.1"  required>
        </div>
        <input type="hidden" name="jumlah" value="<?= $no - 1 ?>">
    </div>
    
    <div class="col-md-12">
        <input type="submit" value="Hitung Nilai Akhir Prefensi" name="simpan" class="btn btn-primary btn-rounded m-b-xxs">
    </div>
</div>


</form>
</div>
</div>

<?php 
if ( isset($_POST['simpan']) ) {
    mysqli_query($con, "DELETE FROM rating_kinerja") or die(mysqli_error($con));
    $jumlah = $_POST['jumlah'];
    for ( $i = 1; $i <= $jumlah; $i++ ) {
        $id_supplier = $_POST['id-supplierke-'.$i];
        $c1          = trim(mysqli_real_escape_string($con, $_POST['R1'.$i]));
        $c2          = trim(mysqli_real_escape_string($con, $_POST['R2'.$i]));
        $c3          = trim(mysqli_real_escape_string($con, $_POST['R3'.$i]));
        $c4          = trim(mysqli_real_escape_string($con, $_POST['R4'.$i]));

        mysqli_query($con, "INSERT INTO rating_kinerja (id_supplier, c1, c2, c3, c4) VALUES ('$id_supplier', '$c1', '$c2', '$c3', '$c4')") or die(mysqli_error($con));

    } 
}?>

<div class="panel panel-white">
    <div class="panel-heading">
        <h4 class="panel-title">hasil akhri prefensi </h4>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th> # </th>
                <th> # </th>
            </tr>
        </thead>
        <tbody>
        <form action="" method="post">
            <?php
            @$bobotc1 = $_POST['bobot-c1'];
            @$bobotc2 = $_POST['bobot-c2'];
            @$bobotc3 = $_POST['bobot-c3'];
            @$bobotc4 = $_POST['bobot-c4'];
            $no =1;
            $sqls = mysqli_query($con, "SELECT * FROM rating_kinerja") or die(mysqli_error($con));
            foreach ($sqls as $sql) { ?>
                <tr>
                    <td>V<?= $no ?></td>
                    <td>
                        <input type="text" name="nilai<?= $no ?>" id="" class="form-control" value="<?= ( $sql['c1'] * $bobotc1 ) + ( $sql['c2'] * $bobotc2 ) + ( $sql['c3'] * $bobotc3 ) + ( $sql['c4'] * $bobotc4 )?>" readonly>
                        <input type="hidden" name="id-supplier<?= $no ?>" id="" value="<?= $sql['id_supplier'] ?>" class="form-control">
                    </td>
                </tr>
                <?php  $no++ ?>
            <?php } ?>
        </tbody>
    </table>
   
    <input type="hidden" name="jumlah" value="<?= $no - 1 ?>">
    <input type="submit" value="Proses" name="proses" class="btn btn-info btn-rounded m-b-xxs">
    </form>
</div>
    <?php
    if ( isset($_POST['proses']) ) {
        mysqli_query($con, "DELETE FROM hasil_prefensi") or die($mysqli_error($con));
        $jumlah = $_POST['jumlah'];
        for ($i=1; $i <= $jumlah ; $i++) { 
            $id_supplier     = trim(mysqli_real_escape_string($con, $_POST['id-supplier'.$i]));
            $nilai           = trim(mysqli_real_escape_string($con, $_POST['nilai'.$i]));

        mysqli_query($con, "INSERT INTO hasil_prefensi (id_supplier, nilai) VALUES ('$id_supplier', '$nilai')") or die(mysqli_error($con));
        }
    echo "<script>
            window.location='admin.php?p=rangking'
        </script>";

    }

    ?>

