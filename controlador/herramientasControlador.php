<?php
include "./controlador/conexion.php";
/*
    CREATE TABLE tools (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(150) NOT NULL,
    sku VARCHAR(50) UNIQUE NOT NULL,
    total_copies INT NOT NULL DEFAULT 1,
    available_copies INT NOT NULL DEFAULT 1
    );
*/

function seleccionarHerramientas(){
    $conn = getPDO();
    $stmt = $conn->prepare("SELECT * FROM tools");
    $stmt 
}

function insertarHerramienta($nombre, $sku, $totalCopias, $copiasDisponibles){
    $conn = getPDO();
    $stmt = $conn->prepare("INSERT INTO tools (name, sku, total_copies, available_copies)
    VALUES (:name, :sku, :total_copies, :available_copies)");
    $stmt->execute(["name" => $nombre, "sku" => $sku, "total_copies" => $totalCopias, "available_copies" => $copiasDisponibles]);
}

function actualizarHerramienta($nombre, $totalCopias){

}

//Borra si no hay prestamos activos
function eliminarHerramienta($sku){

}