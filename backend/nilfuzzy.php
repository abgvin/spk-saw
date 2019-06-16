<div class="panel panel-white">
        <div class="panel-heading">
            <h4 class="panel-title">Alternatif dan kriteria dengan nilai Fuzzy</h4>
        </div>
        <div class="panel-body">

            <div class="table-responsive">
                <table id="example" class="display table table-hover table-data-width">
                    <thead>
                        <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">Suplier</th>
                            <th class="text-center">C1</th>
                            <th class="text-center">C2</th>
                            <th class="text-center">C3</th>
                            <th class="text-center">C4</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $no = 1;
                    $suppliers = mysqli_query($con, "SELECT * FROM fuzzy_supplier INNER JOIN tb_supplier ON fuzzy_supplier.id_supplier = tb_supplier.id_supplier") or die(mysqli_error($con));
                    foreach ($suppliers as $supplier) { ?>
                        <tr>
                            <td class="text-center"><?= $no++ ?></td>
                            <td><?= $supplier['id_supplier'] ?> - <?= $supplier['nama_supplier'] ?></td>
                            <td class="text-center"><?= $supplier['c1'] ?></td>
                            <td class="text-center"><?= $supplier['c2'] ?></td>
                            <td class="text-center"><?= $supplier['c3'] ?></td>
                            <td class="text-center"><?= $supplier['c4'] ?></td>
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



