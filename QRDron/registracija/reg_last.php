<?php
include_once "..//lib//db.php";

$data = registracija_lastnik($db, $_GET["ime"], $_GET["priimek"], $_GET["podjetje"], $_GET["mail"], $_GET["geslo"], $_GET["telefon"]);

echo $data;
?>