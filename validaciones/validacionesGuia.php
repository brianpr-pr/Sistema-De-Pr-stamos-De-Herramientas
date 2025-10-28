<?php
/*

Tipo	Descripción	Ejemplo
Obligatoriedad	Campo no puede estar vacío.	if (empty($_POST['nombre'])) ...
Tipo de dato	Asegurar que sea texto, número, fecha, etc.	
is_numeric($_POST['edad'])


Longitud mínima/máxima	Controlar tamaño de cadenas.	
strlen($usuario) >= 3 && strlen($usuario) <= 20


Formato de email	Validar estructura de correo.	
filter_var($email, FILTER_VALIDATE_EMAIL)


Rango numérico	Limitar valores.	
$edad >= 0 && $edad <= 120


Coincidencia de contraseñas	Confirmar dos campos iguales.	
$pass === $pass2


Tipo	Descripción	Ejemplo
Escape de caracteres especiales	Evita inyección SQL o XSS.	
htmlspecialchars($_POST['nombre'])


Evitar código HTML en campos de texto	Limpieza de input.	
strip_tags($comentario)


Preparar sentencias SQL	Usar prepare() y bind_param() en PHP o 
cursor.execute con parámetros.	


Validar archivos subidos	Comprobar tipo y tamaño de archivos.	
$_FILES['foto']['type'] == 'image/jpeg'


Teléfono	Solo números y longitudes correctas.	
preg_match('/^[0-9]{9}$/', $telefono)


DNI / ID	Formato exacto según país.	
preg_match('/^[0-9]{8}[A-Za-z]$/', $dni)


Fecha	Fecha válida y lógica.	
strtotime($fecha) !== false


Contraseña segura	Mínimo 8 caracteres, una mayúscula, un número, etc.	
preg_match('/^(?=.*[A-Z])(?=.*\d).{8,}$/', $pass)
*/