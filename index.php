
<?php include_once('header.php');

$mensaje  = "";

if(isset($_GET['ok'])){
    $mensaje = "<p>Tarea creada correctamente</p>";
};
?>

<section class="seccion_body">
    <div class="">
        <h1 style="color: white;" >Bienvenidos</h1>
        <div>
            <form action="cargar_task.php" class="form" method="POST" enctype="multipart/form-data">
                <label for="descripcion">Descripción</label>
                <textarea class="custom_textarea" name="descripcion" id="descripcion" required> </textarea>
                <br>
                <label for="imagen">Imagen</label>
                <input type="text" name="imagen" id="imagen" required>
                <br>
                <button type="submit" class="">GO</button>
            </form>
            <?php
            echo $mensaje;
            ?>
        </div>
    </div>
</section>



    </body>

</html>