<?php 

    foreach ($_POST['ubicacion'] as $key => $value) {
        foreach ($_POST['ubicacion'][$key] as $k => $v) {
            echo $v+"</br>";
        }
    }

    //echo $_POST['ubicacion'][0]
    

?>