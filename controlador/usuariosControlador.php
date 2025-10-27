<?php
/*
Crear: nombre y email. 
●  Listar: tabla simple. 
●  Editar: modificar nombre y email. 
●  Borrar: solo si no tiene préstamos activos
*/

function getPDO(){
    $conn = new PDO('mysql:host=localhost;dbname=tools_db', "root", "");
    $conn->setAttribute(PDO::ATTR_ERRMODE,true);
    return $conn;
}

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
            <td><button type='button'>Editar</button></td>
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