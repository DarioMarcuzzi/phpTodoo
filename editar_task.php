<?php 

include_once('conexion.php');

$id = $_POST["id"];
$descripcion = $_POST["descripcion"];
$imagen = $_POST["imagen"];

$fecha_actual = date('d/m/y');

$query = "UPDATE tasks SET descripcion = '$descripcion' , imagen= '$imagen' , fecha = '$fecha_actual' WHERE id = '$id'";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    // Redirige a index.php si la consulta fue exitosa
    header("Location: listar_tasks.php");
} else {
    // Manejo de errores (puedes personalizarlo según tus necesidades)
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);



