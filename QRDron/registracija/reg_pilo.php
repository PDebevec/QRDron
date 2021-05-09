<?php
include_once "..//lib//db.php";

$data = registracija_pilot($db, $_GET["ime"], $_GET["priimek"], $_GET["mail"], $_GET["geslo_p"], $_GET["geslo_l"], $_GET["telefon"], $_GET["ime_d"]);

echo $data;
?>