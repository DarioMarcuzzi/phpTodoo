<?php 

include_once('conexion.php');

$id = $_POST["id"];
$descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : '';
$fecha_actual = date('d/m/y');

// Verificar si se subió una nueva imagen
if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
    // Obtener la ruta temporal del archivo y su nombre
    $rutaTemporal = $_FILES['archivo']['tmp_name'];
    $nombreImage = $_FILES['archivo']['name'];

    $nombreSinEspacios = str_replace(' ', '-', $nombreImage);

    // Abrir la imagen
    if ($_FILES['archivo']['type'] == 'image/jpeg') {
        $original = imagecreatefromjpeg($rutaTemporal);
    } elseif ($_FILES['archivo']['type'] == 'image/png') {
        $original = imagecreatefrompng($rutaTemporal);
    } else {
        echo 'Formato no permitido, solo se permiten JPG y PNG.';
        exit;
    }

    // Redimensionar la imagen
    $anchoOriginal = imagesx($original);
    $altoOriginal = imagesy($original);

    $nuevoAncho = 500;
    $nuevoAlto = 300;

    $nuevaImagen = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

    // Copiar y redimensionar la imagen original
    imagecopyresampled($nuevaImagen, $original, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $anchoOriginal, $altoOriginal);

    // Exportar a un fichero
    $rutaImagen = 'img/' . $nombreSinEspacios;

    if ($_FILES['archivo']['type'] == 'image/jpeg') {
        imagejpeg($nuevaImagen, $rutaImagen, 100);
    } elseif ($_FILES['archivo']['type'] == 'image/png') {
        imagepng($nuevaImagen, $rutaImagen);
    }

    imagedestroy($original);
    imagedestroy($nuevaImagen);

    // Actualizar el campo `imagen` en la base de datos
    $query = "UPDATE tasks SET descripcion = '$descripcion', imagen = '$rutaImagen', fecha = '$fecha_actual' WHERE id = '$id'";
} else {
    // Si no se sube una nueva imagen, solo se actualizan la descripción y la fecha
    $query = "UPDATE tasks SET descripcion = '$descripcion', fecha = '$fecha_actual' WHERE id = '$id'";
}

$resultado = mysqli_query($conexion, $query);

if ($resultado) {
    // Redirige a listar_tasks.php si la consulta fue exitosa
    header("Location: listar_tasks.php");
} else {
    echo "Error al guardar los datos: " . mysqli_error($conexion);
}

mysqli_close($conexion);

?>
