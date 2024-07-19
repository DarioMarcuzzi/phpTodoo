<?php
include('conexion.php');

$descripcion = $_POST['descripcion'];
$imagen = $_POST['imagen'];

// Ejecuta la consulta INSERT
$query = "INSERT INTO tasks (descripcion, imagen) VALUES ('$descripcion', '$imagen')";
$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    // Redirige a index.php si la consulta fue exitosa
    header("Location: index.php?ok");
} else {
    // Manejo de errores (puedes personalizarlo según tus necesidades)
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);
?>


