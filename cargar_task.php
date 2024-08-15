<?php
include('conexion.php');

$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';

$fecha_actual = date('d/m/y');

if( empty($descripcion)){
    header("Location: index.php?error");
    exit;
}

// echo '<pre>';

// print_r($_FILES['archivo']);

// echo '</pre>';

//obtener la ruta temporal del archivo y su nombre

$rutaTemporal = $_FILES['archivo']['tmp_name'];
$nombreImage = $_FILES['archivo']['name'];

$nombreSinEspacios = str_replace(' ', '-', $nombreImage);

// abrir imagen
if($_FILES['archivo']['type'] == 'image/jpeg'){
    $original = imagecreatefromjpeg($rutaTemporal);
} else if($_FILES['archivo']['type'] == 'image/png'){
    $original = imagecreatefrompng($rutaTemporal);
} else {
    echo 'Formato no permitido, solo se permiten JPG y PNG.';
    exit;
}

// redimensionar la imagen
$anchoOriginal = imagesx($original);
$anchoOriginal = imagesy($original);

//crear lienzo vacio 

$nuevoAncho = 500;
$nuevoAlto = 300;

$nuevaImagen = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

//copiar original y redimensionar 

imagecopyresampled($nuevaImagen, $original, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $anchoOriginal);

//exportar a un fichero
$rutaImagen = 'img/' . $nombreSinEspacios;

imagejpeg($nuevaImagen, $rutaImagen , 100);


imagedestroy($original);
imagedestroy($nuevaImagen);




// Ejecuta la consulta INSERT
$query = "INSERT INTO tasks (descripcion ,imagen , fecha) VALUES ('$descripcion' , '$rutaImagen', '$fecha_actual')";
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


