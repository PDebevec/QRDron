<?php
include_once "..//lib//db.php";

$data = registracija_drona($db, $_GET['znamka'], $_GET['ime'], $_GET['serst'], $_GET['teza']);

echo $data;
?>