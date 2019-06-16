<div class="panel panel-white">
    <div class="panel-heading clearfix">
        <h4 class="panel-title">Peringkat Terbaik</h4>
    </div>
    <div class="table-responsive">
    <table class="display table table-hover table-data-width table-condensed table-striped">
        <thead>
            <tr>
                <th class="text-center">Id Supplier</th>
                <th class="text-center">Nama Supplier</th>
                <th class="text-center">Nilai Akhir Prefensi</th>
                <th class="text-center">Rangking</th>
                <th class="text-center">Keputusan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            $sqls = mysqli_query($con, "SELECT t.id_supplier, t.nama_supplier, h.nilai FROM hasil_prefensi h, tb_supplier t WHERE t.id_supplier = h.id_supplier ORDER BY h.nilai DESC") or die(mysqli_error($con));
            foreach ($sqls as $sql) { ?>
                <tr>
                    <td class="text-center"><?= $sql['id_supplier'] ?></td>
                    <td class="text-center"><?= $sql['nama_supplier'] ?></td>
                    <td class="text-center"><?= $sql['nilai'] ?></td>
                    <td class="text-center">Peringkat ke- <?= $no ?></td>
                    <td class="text-center">
                    <?php
                    if ( $no <= 3 ) {
                        $ket = "Terbaik $no";
                    } else {
                        $ket = "-";
                    }
                    ?>
                    <?= $ket ?>
                    </td>
                </tr>
            <?php $no++ ?>
            <?php } ?>
        </tbody>
    </table>
    </div>
</div>

