<?php
session_start();
if ( empty($_SESSION['user']) ) { ?>
    <script>
        window.location='login/index.html'
    </script>
<?php } else { ?>
    <script>
        window.location='backend/index.html'
    </script>
<?php } ?>

