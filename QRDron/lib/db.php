<?php
function odpriDB(){
    $povezava = new mysqli("127.0.0.1", "dronsi", "geslo", "qrdron");
    if($povezava == false)
        die("neki je narobe error:" . $povezava->connect_error);
    else return $povezava;
}
function dronId($povezava, $params){
    return $povezava->query("select * from piloti where qrid=" . (int)$params["id"]);
}
?>