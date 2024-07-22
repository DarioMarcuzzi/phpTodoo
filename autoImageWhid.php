<?php

function mostrarImagenConTamanos($imagen_path) {
    if (!empty($imagen_path)) {
        list($ancho, $alto, $tipo) = getimagesize('img/' . $imagen_path);

        switch (true) {
            case ($ancho > 800 && $alto > 400):
                echo '<img class="img_customC" src="img/' . $imagen_path . '" alt="not Found" />';
                break;
            case ($ancho > 500 && $alto > 250):
                echo '<img class="img_customB" src="img/' . $imagen_path . '" alt="not Found" />';
                break;
            case ($ancho > 300 && $alto > 150):
                echo '<img class="img_customA" src="img/' . $imagen_path . '" alt="not Found" />';
                break;
            default:
                echo '<img class="img_custom" src="img/' . $imagen_path . '" alt="not Found" />';
                break;
        }
    } else {
        echo "No se encontró ninguna imagen.";
    }
}

