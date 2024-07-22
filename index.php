
<?php include_once('header.php');
include_once('autoImageWhid.php');
include_once('conexion.php');

$mensaje  = "";

if(isset($_GET['ok'])){
    $mensaje = "<p>Tarea creada correctamente</p>";
};


if(isset($_GET['id'])){
    $id = $_GET['id'];
    $query = "SELECT * FROM tasks WHERE id = $id";
    $resultado = mysqli_query($conexion, $query);
    $task = mysqli_fetch_assoc($resultado);

    // var_dump($task);

}


?>

<section class="seccion_body">
    <div class="">
        <h1 style="color: white;" >Bienvenidos</h1>
        <div>

            <?php 
                if(isset($_GET['id'])){
                  ?>
                <form action="editar_task.php" class="form" method="POST" enctype="multipart/form-data">
                    <label for="descripcion">Descripción</label>
                    <textarea  class="custom_textarea" name="descripcion" id="descripcion" required><?php echo $task['descripcion']; ?></textarea>
                    <br>
                    <label for="imagen">Imagen</label>
                    <input style="display: none;" value="<?php echo $id; ?>" type="text" name="id" id="id" >
                    <input style="display: none;" value="<?php echo $task['imagen']; ?>" type="text" name="imagen" id="imagen" >
                    <?php 
                     mostrarImagenConTamanos($task['imagen'])
                    ?>

                    <br>
                    <button type="submit" class="">EDITAR</button>
                </form>


            <?php } else {
                ?>
                <form action="cargar_task.php" class="form" method="POST" enctype="multipart/form-data">
                    <label for="descripcion">Descripción</label>
                    <textarea class="custom_textarea" name="descripcion" id="descripcion" required> </textarea>
                    <br>
                    <label for="imagen">Imagen</label>
                    <input type="text" name="imagen" id="imagen" >
                    <input type="file" name="imagen" />
                    <br>
                    <button type="submit" class="">GO</button>
                </form>
            <?php  } ?>


            
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
</section>



    </body>

</html>