<?php
require_once '../models/pedido.php';
require_once '../config/database.php';

$pedido = json_decode($_POST['compras'], true);

$pedidoModel = new Pedido();

foreach ($pedido as $key => $value) {
    echo $key . "</br>";

    switch ($key) {
        case 'departamento':
            $pedidoModel->setProvincia($value);
            break;
        case 'distrito':
            $pedidoModel->setLocalidad($value);
            break;
        case 'direccion':
            $pedidoModel->setDireccion($value);
            break;
        case 'coste':
            $pedidoModel->setCoste($value);
            break;
        case 'id-usuario':
            $pedidoModel->setUsuarioId($value);
            break;
    }
}


$save = $pedidoModel->save();

if ($save) {
    echo  json_encode('complete');
} else {
    echo  json_encode('failed');
}
