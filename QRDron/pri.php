<?php
include "lib//db.php";
$db = odpriDB();
$ime = $_GET["ime"];
$geslo = $_GET["geslo"];

if(dbsql($db, "select ime from uporabniki where ime=" . $ime)){
    if(dbsql($db, "select geslo from uporabniki where geslo=" . hash("sha256", $geslo)))
    else header("Location: prijava.html");
}else header("Location: prijava.html");
?>

<html>
    <head>
        <title>admin</title>
    </head>
    <body>
        <?php

        dbsql($db, "select * from piloti where ");

        ?>
    </body>
</html>