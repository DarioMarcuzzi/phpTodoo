<?php include_once('header.php') ?>


 <section class="show_tasks">
    <?php include('conexion.php');
    $consulta_db = mysqli_query($conexion ,'SELECT * FROM tasks');


    // $datos = mysqli_fetch_assoc($consulta_db);
    while($mostrar_datos = mysqli_fetch_assoc($consulta_db)){
        ?>
        <div class="container_card_task">
            <div> <?php echo $mostrar_datos['descripcion'] ?> </div>
            <img class="img_custom" src="img/<?php echo $mostrar_datos['imagen']?>" alt="IMG.JPG">
        </div>



        
    <?php }?>
    
  
    
    
    
</section>