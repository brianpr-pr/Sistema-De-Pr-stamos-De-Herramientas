<?php
include "./controlador/conexion.php";

function insertarPrestamo($herramientaId, $usuarioId, $fechaLimiteDevolucion, $status){
    $conn = getPDO();
    $stmt = $conn->prepare("INSERT INTO loans (tool_id, user_id, due_at, status)
    VALUES (:tool_id, :user_id, :due_at, :status)");
    $stmt->execute([":tool_id" => $herramientaId, 
    ":user_id" => $usuarioId, 
    ":due_at" => $fechaLimiteDevolucion, 
    ":status" => $status]);
}


/*
Listar: mostrar préstamos activos y devueltos con columnas: herramienta, usuario, 
loaned_at, due_at, status.

*/
function seleccionarPrestamos(){
    $conn = getPDO();
    $stmt = $conn->prepare("SELECT * FROM loans");
    $stmt->execute();
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function mostrarTabla(){
    $tabla = seleccionarPrestamos();
    $resultado = "";
    foreach($tabla as $fila){
        $resultado .=  
        "
        <tr>
            <td>{$fila['tool_id']}</td>
            <td>{$fila['user_id']}</td>
            <td>{$fila['loaned_at']}</td>
            <td>{$fila['due_at']}</td>
            <td>{$fila['status']}</td>
        </tr>      
        ";
    }
    return $resultado;      
}

function actualizarPrestamo($herramientaId, $usuarioId){
    $conn = getPDO();
    $stmt = $conn->prepare("UPDATE loans SET returned_at=CURRENT_DATE, status='returned' 
    WHERE tool_id=:herramientaId AND user_id=:usuarioId");
    $stmt->execute(["herramientaId" => $herramientaId, "usuarioId" => $usuarioId]);
}