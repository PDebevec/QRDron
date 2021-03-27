<?php
function odpriDB(){
    $povezava = new mysqli("localhost", "root", "", "qrdron");
    if($povezava->connect_error)
        die("neki je narobe " . $povezava->connect_error);
    else return $povezava;
}
function dronId($povezava, $params){
    return $povezava->query("select * from piloti where dron=" . (int)$params["id"]);
}
function prijava($povezava, $ime){
    return $povezava->query("select * from piloti where ime=" . $ime);
}
?>