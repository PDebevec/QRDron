<?php
function odpriDB(){
    $povezava = new mysqli("127.0.0.1", "dronsi", "geslo", "qrdron");
    if($povezava->connect_error)
        die("neki je narobe " . $povezava->connect_error);
    else return $povezava;
}
function dronId($povezava, $params){
    return $povezava->query("select * from piloti where dron=" . (int)$params["id"]);
}
function prijava($povezava, $ime){
    return $povezava->query("select * from piloti where ime=" . (string)$ime);
}
function dbsql($povezava, $sql){
    return $povezava->query($sql);
}
?>