<?php 
include_once('header.php');
include_once('autoImageWhid.php');
require 'vendor/autoload.php'; 
$icons = new Feather\IconManager();



$miArray = array(
    "clave1" => "valor1",
    "clave2" => "valor2",
    "clave3" => "valor3"
);










?>

<!--  -->





<section class="show_tasks">
    <?php include('conexion.php');
    $consulta_db = mysqli_query($conexion ,'SELECT * FROM tasks');


    // while($mostrar_datos = mysqli_fetch_array($consulta_db)){
    //     echo $mostrar_datos['descripcion']."<br>";




    // }

    
    while($mostrar_datos = mysqli_fetch_array($consulta_db)){

        ?>
        <div class="container_card_task">
            <div class="header_card_task">
                <a style="color: black;" href="index.php?id=<?php echo $mostrar_datos['id'];"desctipcion="?>"><?php echo $icons->getIcon('edit') ?></a>
                    <div><?php echo $mostrar_datos['fecha']?></div>
                <a style="color: black;" href="eliminar_task.php?id=<?php echo $mostrar_datos['id']; ?>"><?php echo $icons->getIcon('trash-2') ?></a>
            </div>
            <div> <?php echo $mostrar_datos['descripcion'] ?> </div>
            <?php   
             $imagen_path =  $mostrar_datos['imagen'];


             mostrarImagenConTamanos($imagen_path);
            //  if (!empty($imagen_path)) {
            //     list($ancho, $alto, $tipo) = getimagesize('img/'.$imagen_path);
            
            //     switch (true) {
            //         case ($ancho > 800 && $alto > 400):  // esto ocupa 4/4 de grid
            //             echo '<img class="img_customC" src="img/'.$imagen_path.'" alt="not Found" />';
                        
            //             break;
            //         case ($ancho > 500 && $alto > 250): // esto ocupa 3/4 de grid
            //             echo '<img class="img_customB" src="img/'.$imagen_path.'" alt="not Found" />';
            //             break;

            //         case ($ancho > 300 && $alto > 150): // esto ocupa 2/4 de grid
            //             echo '<img class="img_customA" src="img/'.$imagen_path.'" alt="not Found" />';
            //             break;
            //         default:                            // esto ocupa 1/4 de grid
            //             echo '<img class="img_custom" src="img/'.$imagen_path.'" alt="not Found" />';
            //             break;
            //     }
            // } 
            ?>
            
        </div>
        
    <?php }?>

    
  
    
    
    
</section>