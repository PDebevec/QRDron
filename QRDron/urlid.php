<?php
if($_REQUEST["id"] != ""){
    include 'lib//url.php';
    include 'lib//db.php';
    $db = odpriDB();

    $table = dronId($db, $params);
    $row = array();
    if($table->num_rows > 0){
        $row = $table->fetch_assoc();
    }else{
        echo "<h1>Nobenega drona s id: " . $params["id"] . "</h1><br><br>";
        $row["ime"] = $row["priimek"] = $row["lastnik"] = $row["dron"] = "/"; }

    $db->close();
}
?>
<html>
    <head>
        <title>QRdroni</title>
        <meta charset="utf-8">
    </head>
    <body>
    <h2>Pilot</h2>
    <b><?php echo $row["ime"] ?></b><br><br>
    <b><?php echo $row["priimek"] ?></b>

    <h2>Lastnik</h2>
    <b><?php echo $row["lastnik"] ?></b>

    <h2>Dron</h2>
    <b><?php echo $row["dron"] ?></b>

    </body>
</html>