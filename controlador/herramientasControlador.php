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

/*
function seleccionarHerramientas(){
    $conn = getPDO();
    $stmt = $conn->prepare("SELECT * FROM tools");
    $stmt 
}*/


function mostrarTabla(){
    $tabla = seleccionarHerramientas();
    $resultado ="";
    foreach($tabla as $fila){
        $resultado .= "
        <tr>
            <td>{$fila['name']}</td>
            <td>{$fila['sku']}</td>
            <td>{$fila['total_copies']}</td>
            <td>{$fila['available_copies']}</td>
        </tr>
        ";
    }
    return $resultado;
}

function seleccionarHerramientas(){
    $conn = getPDO();
    $stmt = $conn->prepare("SELECT name, sku, total_copies, available_copies FROM tools");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


function insertarHerramienta($nombre, $sku, $totalCopias, $copiasDisponibles){
    $conn = getPDO();
    $stmt = $conn->prepare("INSERT INTO tools (name, sku, total_copies, available_copies)
    VALUES (:name, :sku, :total_copies, :available_copies)");
    $stmt->execute(["name" => $nombre, "sku" => $sku, "total_copies" => $totalCopias, "available_copies" => $copiasDisponibles]);
}

function actualizarHerramienta($nombre, $sku,$totalCopias){
    $conn = getPDO();
    $stmt = $conn->prepare("UPDATE tools SET name=:nombre, total_copies=:totalCopias 
    WHERE sku=:sku");
    $stmt->execute(["nombre" => $nombre, "totalCopias" => $totalCopias, "sku" => $sku]);
}

//Borra si no hay prestamos activos
function eliminarHerramienta($sku){
    $conn = getPDO();
    $stmt = $conn->prepare("DELETE FROM tools WHERE sku=:sku AND id NOT IN 
    (SELECT tool_id FROM loans)");
    $stmt->execute(["sku" => $sku]);
}