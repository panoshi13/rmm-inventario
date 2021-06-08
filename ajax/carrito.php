<?php
require_once '../models/pedido.php';
require_once '../config/database.php';

$productos = json_decode($_POST['data'], true);

$pedidoModel = new Pedido();

foreach ($productos as $key => $value) {

    $id_pedido = $pedidoModel->lastPedido()->id;

    $save = $pedidoModel->insert_save_linea($id_pedido, $value['id'], $value['unidad']);

    
    echo $save;
    if ($save) {
        echo json_encode("carrito");
    } else {
        echo json_encode("no carrito");
    }

}
