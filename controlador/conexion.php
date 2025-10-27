<?php
function getPDO(){
    $conn = new PDO('mysql:host=localhost;dbname=tools_db', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE,true);
    return $conn;
}