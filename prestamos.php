<?php 
include "./controlador/prestamosControlador.php";
include "./validaciones/validacionPrestamos.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$mensajeInsertar ="";
$mensajeActualizar ="";

if($_SERVER['REQUEST_METHOD'] === "POST"){
    if(isset($_POST['herramientaId'], $_POST['usuarioId'],$_POST['fechaLimiteDevolucion'],$_POST['status']) ){
        insertarPrestamo($_POST['herramientaId'], $_POST['usuarioId'],$_POST['fechaLimiteDevolucion'],$_POST['status']);
        $mensajeInsertar="Se ha introducido un nuevo usuario correctamente.";
    }

    if(isset($_POST['herramientaIdActualizacion'], $_POST['usuarioIdActualizacion'])){
        actualizarPrestamo($_POST['herramientaIdActualizacion'], $_POST['usuarioIdActualizacion']);
        $mensajeActualizar = "Se ha devuelto la herramienta correctamente.";
    }
}
?>

<body>
    <br><br>
    <table>
        <tr>
            <th>Herramienta id</th>
            <th>Usuario id</th>
            <th>Fecha de realización de prestamo</th>
            <th>Fecha maxima para entregar</th>
            <th>Status</th>
        </tr>
        <tr>
            <?php echo mostrarTabla();?>
        </tr>
    </table>
    <br><br>

    <br><br>
    <h2>Añadir un nuevo prestamo</h2>
    <form method="POST">
        <label for="herramientaId">Herramienta id</label>
        <input type="number" id="herramientaId" name="herramientaId">
        <br><br>
        <label for="usuarioId">Usuario Id</label>
        <input type="number" id="usuarioId" name="usuarioId">
        <br><br>
        <label for="fechaLimiteDevolucion">Fecha limite devolución</label>
        <input type="date" id="fechaLimiteDevolucion" name="fechaLimiteDevolucion">
        <br><br>
        <label for="status">Status</label>
        <select id="status" name="status">
            <option>ongoing</option>
            <option>returned</option>
        </select>
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <h2><?php echo $mensajeInsertar?></h2>
    <br><br>

    <br><br>
    <h2>Devolver herramienta</h2>
    <form method="POST">
        <label for="herramientaIdActualizacion">Id de la herramienta</label>
        <input type="number" id="herramientaIdActualizacion" name="herramientaIdActualizacion">
        <br><br>
        <label for="usuarioIdActualizacion">Id del usuario</label>
        <input type="number" id="usuarioIdActualizacion" name="usuarioIdActualizacion">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <h2><?php echo $mensajeActualizar;?></h2>
    <br><br>
</body>
</html>