<?php
if ( count($errors) > 0 ) { ?>
    <div class="alert alert-danger" role="alert">
        <?php
        foreach ($errors as $error) { ?>
            <?= $error; ?>
        <?php } ?>
    </div>
<?php } ?>


<?php
if ( count($infos) > 0 ) { ?>
    <div class="alert alert-info" role="alert">
        <?php
        foreach ($infos as $info) { ?>
            <?= $info ?>
        <?php } ?>
    </div>
<?php } ?>