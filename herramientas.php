<?php 
include "./controlador/herramientasControlador.php";
include "./validaciones/validacionHerramientas.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$mensajeInsertar = "";
$mensajeActualizar = "";
$mensajeEliminar = "";

if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['nombre'], $_POST['sku'], $_POST['totalCopias'])){
            insertarHerramienta($_POST['nombre'], $_POST['sku'], $_POST['totalCopias'],$_POST['totalCopias']);
            $mensajeInsertar = "Herramienta insertada correctamente.";
        }

        
        if(isset($_POST['skuActualizar'], $_POST['nombreActualizar'], $_POST['cantidadTotalActualizar'])){
            actualizarHerramienta($_POST['nombreActualizar'], $_POST['skuActualizar'], $_POST['cantidadTotalActualizar']);
            $mensajeActualizar = "Herramienta se ha actualizado correctamente.";
        }

        
        if(isset($_POST['skuEliminar'])){
            eliminarHerramienta($_POST['skuEliminar']);
            $mensajeEliminar = "Herramienta eliminada correctamente.";
        }
        
}
?>

<body>
    <br>
    <!--Acabar tabla-->
    <table>
        <tr>
            <th>Nombre de la herramienta</th>
            <th>Sku</th>
            <th>Copias totales</th>
            <th>Copias disponibles</th>
        </tr>
        <?php echo mostrarTabla(); ?>
    </table>
    <br><br>

    <br>
    <h2>Insertar nueva herramienta</h2>
    <form method="POST">
        <label for="nombre">Nombre de la herramienta</label>
        <input type="text" id="nombre" name="nombre">

        <label for="sku">Nombre del sku</label>
        <input type="text" id="sku" name="sku">

        <label for="totalCopias">Total copias</label>
        <input type="number" id="totalCopias" name="totalCopias">

        <button type="submit">Enviar</button>
    </form>
    <br>
    <?php echo $mensajeInsertar;?>
    <br>

    <br>
    <h2>Actualizar herramienta</h2>
    <form method="POST">
        <label for="skuActualizar">Codigo sku de herramienta a actualizar</label>
        <input type="text" id="skuActualizar" name="skuActualizar">

        <label for="nombreActualizar">Nuevo nombre de herramienta</label>
        <input type="text" id="nombreActualizar" name="nombreActualizar">

        <label for="cantidadTotalActualizar">Nueva cantidad total de herramienta</label>
        <input type="number" id="cantidadTotalActualizar" name="cantidadTotalActualizar">

        <button type="submit">Enviar</button>
    </form>
    <br>
    <?php echo $mensajeActualizar;?>
    <br>

    <br>
    <h2>Eliminar herramienta</h2>
    <form method="POST">
        <label for="skuEliminar">Codigo sku para eliminar herramienta, en caso de que no halla un prestamo pendiente.</label>
        <input type="text" id="skuEliminar" name="skuEliminar">

        <button type="submit">Enviar</button>
    </form>
    <br>
    <?php echo $mensajeEliminar;?>
    <br>
</body>
</html>