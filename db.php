<?php
function odpriDB(){
    return new mysqli("localhost", "root", "", "qrdron");
}
function dobiPod($povezava, $params){
    return $povezava->query("select * from piloti where dron=" . (int)$params["id"]);
}
?>