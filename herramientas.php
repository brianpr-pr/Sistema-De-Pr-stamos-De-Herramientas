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

        if(isset($_POST[''])){
            actualizar($_POST['']);
            $mensajeActualizar = "";
        }

        if(isset($_POST[''])){
            eliminar($_POST['']);
            $mensajeEliminar = "";
        }
}
?>


<body>
    <br>
    <table>
        <tr>
            <th>Nombre de la herramienta</th>
            <th>Sku</th>
            <th>Copias totales</th>
            <th>Copias disponibles</th>
        </tr>
        <?php echo seleccionarHerramientas()?>
    </table>



    <br>
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
    <form method="POST">
        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <button type="submit">Enviar</button>
    </form>
    <br>
    <?php echo $mensajeActualizar;?>
    <br>


    <br>
    <form method="POST">
        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <label for=""></label>
        <input type="" id="" name="">

        <button type="submit">Enviar</button>
    </form>
    <br>
    <?php echo $mensajeEliminar;?>
    <br>

</body>
</html>