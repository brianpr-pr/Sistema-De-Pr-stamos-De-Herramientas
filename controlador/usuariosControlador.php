<?php
/*
Crear: nombre y email. 
●  Listar: tabla simple. 
●  Editar: modificar nombre y email. 
●  Borrar: solo si no tiene préstamos activos
*/
include "./controlador/conexion.php";

function seleccionarUsuarios(){
    $conn = getPDO();
    $stmt = $conn->prepare("SELECT * FROM users");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function mostrarTabla(){
    $tabla = seleccionarUsuarios();
    $resultado = "";
    foreach($tabla as $fila){
        $resultado .= "
        <tr>
            <td>{$fila['fullname']}</td>
            <td>{$fila ['email']}</td>
        </tr>
        ";
    }
    return $resultado;
}

function insertarUsuario($nombre, $email){
    $conn = getPDO();
    $stmt = $conn->prepare("INSERT INTO users (fullname, email)
    VALUES 
    (:fullname, :email)");
    $stmt->execute(["fullname" => $nombre, "email" => $email]);
}

function actualizarUsuario($antiguoNombre, $antiguoEmail, $nuevoNombre, $nuevoEmail){
    $conn = getPDO();
    $stmt = $conn->prepare("UPDATE users SET fullname=:nuevoFullname, email=:nuevoEmail
    WHERE fullname=:antiguoFullname AND email=:antiguoEmail");
    $stmt->execute(["nuevoFullname" => $nuevoNombre, "nuevoEmail" => $nuevoEmail,
"antiguoFullname" => $antiguoNombre, "antiguoEmail" => $antiguoEmail]);
}

function eliminarUsuario($nombre, $email){
    $conn = getPDO();
    $stmt = $conn->prepare("DELETE FROM users 
    WHERE fullname=:fullname AND email=:email");
    $stmt->execute(["fullname" => $nombre, "email" => $email]);
}