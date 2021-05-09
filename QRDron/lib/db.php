<?php
$db = new mysqli("127.0.0.1", "qrdron", "geslo", "qrdron") or
die("neki je narobe error:" . $db->connect_error);
///// GET ID /////
//una stvar
function dronId($db, $num){
	$data = $db->query("SELECT * FROM qrid WHERE qrurl = " . (int)$num . " ");

    return $data;
}

///// PRIJAVA /////
//prijava
function prijava($db, $mail, $geslo){
	$geslo = hash("sha256", $geslo);
	if(
		$db->query("SELECT id_l FROM lastnik WHERE mail = '" . $mail . "' AND geslo = '" . $geslo . "' ")->num_rows > 0
	){
		return $db->query("SELECT * FROM lastnik WHERE mail = '" . $mail . "' AND geslo = '" . $geslo . "' ");
	}else { return FALSE; }
}

///// REGISTRACIJA /////
//registracija lastnika dorna
function registracija_lastnik($db, $ime, $priimek, $podjetje, $mail, $geslo, $tel){
	if (empty($ime) && empty($priimek) && empty($mail) && empty($geslo) && empty($tel)){
		return FALSE;
	}
	else if(
		$db->query("SELECT id FROM lastniki WHERE telefon = '" . $tel ."'") ||
		$db->query("SELECT id FROM lastniki WHERE mail = '" . $mail ."'")
	){
		return FALSE;
	}
	if(empty($podjetje)){ $podjetje = "NULL"; }
	$geslo = hash("sha256", $geslo);

	$db->query("INSERT INTO lastnik (id_l, ime, priimek, podjetje, mail, geslo, telefon) VALUES ('" . NULL . "', '" . $ime . "', '" . $priimek . "', '" . $podjetje . "', '" . $mail . "', '" . $geslo . "', '" . $tel . "')");
	$id_l = $db->query("SELECT id_l FROM lastnik WHERE geslo = '" . $geslo ."'");
	$iid_l = mysqli_fetch_array($id_l);
	$iiid_l = end($iid_l);
	$rurl = rand(999999, 9999999);
	$db->query("INSERT INTO qrid (id_q, id_l, id_p, id_d, qrurl) VALUES ('" . NULL . "', '" . $iiid_l . "', '" . NULL . "', '" . NULL . "', '" . $rurl . "')");
}
//registracija pilota
function registracija_pilot($db, $ime, $priimek, $mail, $geslo_p, $geslo_l, $tel, $ime_d){
	if($db->query("SELECT id FROM pilot WHERE mail = '" . $mail ."'")){
		return FALSE;
	}
	$geslo_l = hash("sha256", $geslo_l);
	$id_l = $db->query("SELECT id_l FROM lastnik WHERE geslo = '" . $geslo_l ."'");
	$id_d = $db->query("SELECT id_d FROM dron WHERE ime = '" . $ime_d ."'");
	if($id_l) {
		$geslo_p = hash("sha256", $geslo_p);
		$iid_l = mysqli_fetch_array($id_l);
		$iiid_l = $iid_l["id_l"];
		$iid_d = mysqli_fetch_array($id_d);
		$iiid_d = $iid_d["id_d"];
		return $db->query("INSERT INTO pilot (id_p, id_l, id_d, ime, priimek, mail, geslo, telefon) VALUES ('" . NULL . "','" . $iiid_l . "','" . $iiid_d . "','" . $ime . "', '" . $priimek . "', '" . $mail . "', '" . $geslo_p . "', '" . $tel . "')");
	
	}else { return FALSE; }
}
//registracija drona
function registracija_drona($db, $znamka, $ime, $seriska_st, $teza){
	$res = $db->query("SELECT id_z FROM znamka_d WHERE ime_z = '" . $znamka ."'");
	$z = mysqli_fetch_array($res);
	$id_z = $z['id_z'];
	return $db->query("INSERT INTO dron (id_d, id_z, ime, serst, teza) VALUES ('" . NULL . "','" . $id_z . "', '" . $ime . "', '" . $seriska_st . "', '" . $teza . "')");
}
?>