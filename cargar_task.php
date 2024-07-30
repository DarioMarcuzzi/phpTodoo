<?php
include('conexion.php');

$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
$imagen = isset($_POST['imagen']) ? trim($_POST['imagen']) : '';

$fecha_actual = date('d/m/y');

if( empty($descripcion)){
    header("Location: index.php?error");
    exit;
}



// Ejecuta la consulta INSERT
$query = "INSERT INTO tasks (descripcion, imagen , fecha) VALUES ('$descripcion', '$imagen' , '$fecha_actual')";
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


