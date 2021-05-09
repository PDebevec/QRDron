<?php
include_once "..//lib//db.php";

if(isset($_GET["mail"])){
    $data = prijava($db, $_GET["mail"], $_GET["geslo"]);
    if($data->num_rows != 0){
        $_GET["geslo"] = hash("sha256", $_GET["geslo"]);
        //ne vem ce dela
        if(isset($_GET["zapomni"])){
            setcookie("mail", $_GET["mail"], time() + ( 30 * 24 * 60 * 60 ));
            setcookie("geslo", $_GET["geslo"], time() + ( 30 * 24 * 60 * 60 ));
            setcookie("zapomni", $_GET["zapomni"], time() + ( 30 * 24 * 60 * 60 ));
        }
        $arr_l = mysqli_fetch_array($data);
        $id_l = (int)$arr_l["id_l"];
        $data_p = $db->query("SELECT * FROM pilot WHERE id_l = " . $id_l);
        $arr_p = mysqli_fetch_array($data_p);
        
        $id_p = $arr_p["id_p"];
        $id_d = $arr_p["id_d"];
        $db->query("UPDATE qrid SET id_p = '". $id_p ."', id_d = '". $id_d ."'");

        //ne vem kaku tu naredt buls in tudi ne da se mi
        $html = "<div class=\"w-100 container\"><b>Lastnik ime: </b> ".$arr_l["ime"]."<br>
        <b>Lastnik priimek: </b>".$arr_l["priimek"]."<br>
        <b>Lastnik mail: </b> ".$arr_l["mail"]."<br>
        <b>Lastnik telefon: </b>".$arr_l["telefon"]."<br><br>
        <b>pilota ime: </b> ".$arr_p["ime"]."<br>
        <b>pilota priimek: </b>".$arr_p["priimek"]."<br>
        <b>pilota mail: </b> ".$arr_p["mail"]."<br>
        <b>pilot telefon: </b>".$arr_p["telefon"]."<br></div>";

        echo $html;
    }else{
        echo "<h1>mail or password are incorect</h1><br>" . file_get_contents("bodyli.html");
    }
}else if(!isset($_GET["mail"])){//ne vem ce dela
    if(array_key_exists("remmember", $_COOKIE)){
        $data = prijava($db, $_COOKIE["mail"], $_COOKIE["geslo"]);
        if($data->num_rows != 0){
            $arr_l = mysqli_fetch_array($data);
            $id_l = (int)$arr_l["id_l"];
            $data_p = $db->query("SELECT * FROM pilot WHERE id_l = " . $id_l);
            $arr_p = mysqli_fetch_array($data_p);

            $id_p = $arr_p["id_p"];
            $id_d = $arr_p["id_d"];
            $db->query("UPDATE qrid SET id_p = '". $id_p ."', id_d = '". $id_d ."'");

            $html = "<div class=\"w-100 container\"><b>Lastnik ime: </b> ".$arr_l["ime"]."<br>
            <b>Lastnik priimek: </b>".$arr_l["priimek"]."<br>
            <b>Lastnik mail: </b> ".$arr_l["mail"]."<br>
            <b>Lastnik telefon: </b>".$arr_l["telefon"]."<br><br>
            <b>pilota ime: </b> ".$arr_p["ime"]."<br>
            <b>pilota priimek: </b>".$arr_p["priimek"]."<br>
            <b>pilota mail: </b> ".$arr_p["mail"]."<br>
            <b>pilot telefon: </b>".$arr_p["telefon"]."<br></div>";

            echo $html;
        }else{
            echo "<h1>mail or password are incorect</h1><br>" . file_get_contents("bodyli.html");
        }
    }else{
        echo file_get_contents("bodyli.html");
    }
}

?>