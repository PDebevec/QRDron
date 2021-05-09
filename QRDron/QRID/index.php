<?php
if($_GET["id"] != ""){
    include_once '..//lib//db.php';
    
    $data = dronId($db, $_GET["id"]);
    $arr = mysqli_fetch_array($data);

    $id_l = $arr["id_l"];
    $id_p = $arr["id_p"];
    $id_d = $arr["id_d"];

    $data_l = $db->query("SELECT * FROM lastnik WHERE id_l = '". $id_l ."'");
    $data_p = $db->query("SELECT * FROM pilot WHERE id_p = '". $id_p ."'");
    $data_d = $db->query("SELECT * FROM dron WHERE id_d = '". $id_d ."'");
    $arr_d = mysqli_fetch_array($data_d);
    $id_d = $arr_d["id_z"];
    $data_z = $db->query("SELECT * FROM znamka_d WHERE id_z = '". $id_d ."'");

    $arr_l = mysqli_fetch_array($data_l);
    $arr_p = mysqli_fetch_array($data_p);
    $arr_z = mysqli_fetch_array($data_z);

    //vec je pilotu sam pokaze sam enga
    $html = "<b>Lastnik</b><br>
    <b>ime: </b>".$arr_l["ime"]."<br>
    <b>priimek: </b>".$arr_l["priimek"]."<br>
    <b>mail: </b>".$arr_l["mail"]."<br>
    <b>telefon: </b>".$arr_l["telefon"]."<br><br>
    <b>Pilot</b><br>
    <b>ime: </b>".$arr_p["ime"]."<br>
    <b>priimek: </b>".$arr_p["priimek"]."<br>
    <b>mail: </b>".$arr_p["mail"]."<br>
    <b>telefon: </b>".$arr_p["telefon"]."<br><br>
    <b>Dron</b><br>
    <b>znamka: </b>".$arr_z["ime_z"]."<br>
    <b>ime: </b>".$arr_d["ime"]."<br>
    <b>seriska številka: </b>".$arr_d["serst"]."<br>
    <b>teža: </b>".$arr_d["teza"]."<br><br>";
}else { $html = "URL doesn't have id"; }
?>
<html>
    <head>
        <title>QRdron</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="..//css.css">
    </head>
    <body>
        <!--navbar-->
        <nav class="navbar navbar-fixed-top bg-c">
            <div class="container">
                <a class="navbar-brand" href="http://localhost/QRDron">QRDron</a>
                <ul class="nav">
                    <li><a href="http://localhost/QRDron/prijava" class="btn btn-outline-primary m-1">Prijava</a></li>
                    <li><a href="http://localhost/QRDron/registracija" class="btn btn-outline-info m-1">Registracija</a></li>
                </ul>
            </div>
        </nav>
        <!--content-->
        <div class="d-flex justify-content-center align-items-center bg-ts h-75" id="bodyid">
            <div class="tc-tm container">
                <?php
                echo $html;
                ?>
            </div>
        </div>
        <!--footer-->
        <footer>
            <div class="tc-tm">
                <h1 style="font-size: 4vh;">Kontakti</h1>
            </div>
        </footer>
    </body>
</html>