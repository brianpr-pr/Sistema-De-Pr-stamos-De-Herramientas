<?php 
session_start();
include "./controlador/usuariosControlador.php";
include "./validaciones/validacionUsuarios.php"; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<?php
$mensajeInsertarUsuario = "";
$mensajeActualizarUsuario = "";
$mensajeEliminarUsuario = "";

    if($_SERVER['REQUEST_METHOD'] === "POST"){
        if(isset($_POST['nombre'], $_POST['email'])){
            insertarUsuario($_POST['nombre'], $_POST['email']);
            $mensajeInsertarUsuario = "Usuario ha sido insertado correctamente en la base de datos.";
        }

        if(isset($_POST['antiguoNombre'], $_POST['antiguoEmail'],$_POST['nuevoNombre'], $_POST['nuevoEmail'])){
            actualizarUsuario($_POST['antiguoNombre'], $_POST['antiguoEmail'],$_POST['nuevoNombre'], $_POST['nuevoEmail']);
            $mensajeActualizarUsuario = "Usuario actualizado correctamente.";
        }

        if(isset($_POST['nombreEliminar'], $_POST['emailEliminar'])){
            eliminarUsuario($_POST['nombreEliminar'], $_POST['emailEliminar']);
            $mensajeEliminarUsuario = "Usuario ha sido eliminado correctamente en la base de datos.";
        }
}
    ?>
<body>
    <br>
    <form method="POST">
        <label for="nombre">Nombre de usuario</label>
        <input type="text" id="nombre" name="nombre">
        <br><br>
        <label for="email">Email de usuario</label>
        <input type="text" id="email" name="email">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <?php echo "<br><h2>{$mensajeInsertarUsuario}</h2><br>"; ?>

    <table>
        <tr>
        <th>Nombre</th>
        <th>Email</th>
        </tr>
        <?php echo mostrarTabla();?>
    </table>

    <br><br>
    <form method="POST">
        <label for="antiguoNombre">Nombre de usuario a editar</label>
        <input type="text" id="antiguoNombre" name="antiguoNombre">
        <br><br>
        <label for="antiguoEmail">Email de usuario a editar</label>
        <input type="text" id="antiguoEmail" name="antiguoEmail">
        <br><br>

        <label for="nuevoNombre">Nuevo nombre de usuario</label>
        <input type="text" id="nuevoNombre" name="nuevoNombre">
        <br><br>
        <label for="nuevoEmail">Nuevo email de usuario</label>
        <input type="text" id="nuevoEmail" name="nuevoEmail">
        <br><br>
        <button type="submit">Enviar</button>
    </form>
    <?php echo "<br><h2>{$mensajeActualizarUsuario}</h2><br>"; ?>

    
    <br>
    <form method="POST">
        <h2>Eliminar usuario</h2>
        <label for="nombreEliminar">Nombre de usuario</label>
        <input type="text" id="nombreEliminar" name="nombreEliminar">
        <br><br>
        <label for="emailEliminar">Email de usuario</label>
        <input type="text" id="emailEliminar" name="emailEliminar">
        <br><br>
        <button type="submit">Enviar</button>
        <button type="reset">Cancelar</button>
    </form>
    <?php echo "<br><h2>{$mensajeEliminarUsuario }</h2><br>"; ?>

</body>
</html>