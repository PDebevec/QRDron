<?php
	include "lib\\db.php";
	$ime = $_GET["ime"];
	$geslo = $_GET["geslo"];

	$db = odpriDB();
	$err1 = dbsql($db, "INSERT INTO uporabniki (id ,ime, geslo) VALUES ('" . NULL . "','".$ime."' , '".hash("sha256", $geslo)."');");
	if(!$err1)
		header("Location: prijava.html");
	else echo "<h1>Rederectiong</h1>";
	header("Location: prijava.html");
	// header(
	// 	"Location: https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=http://localhost/QRdron/urlid.php?id="
	// 	. (string)rand(100000, 999999)
	// );
?>