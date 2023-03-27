<?php

require 'constantes.php';

date_default_timezone_set('UTC');

function getOrders($mysqli) {
    $sql = "SELECT * FROM orders WHERE dispachedAt is NULL ORDER BY special DESC, createdAt ASC";
    return $mysqli->query($sql);
}

function setOrder($mysqli, $post){
    if (isFullKitchen($mysqli)) {
        return 'Full Kitchen, eat your own brain!';
    }
    $ntable = $post['mesa']??0;
    $createdAt = date('Y-m-d\TH:i:sp');
    // Proceso de seguridad antihackers
    $datehash = base64_encode($createdAt);
    $dishes = parseDishes($post);
    if(empty($dishes)){
        return 'No hay platos en esta comanda';
    }
    $dishes_json = json_encode($dishes);
    $special = hasSpecialDish($dishes)?1:0;
    $sql = "INSERT INTO orders (ntable, createdAt, dishes, special, datehash) VALUES ($ntable, '$createdAt', '$dishes_json', $special, '$datehash')";
    if($mysqli->query($sql)){
        $id = $mysqli->insert_id;
        // Llamada a TrollApi
        $troleado = aTrollInTheKitchen($mysqli, $id);
        if(false === $troleado){
            return 'Marchando!';
        } else {
            return $troleado;
        }
    } else {
        return 'Espera... What?? Ha habido un error al almacenar';
    }
}

function showDatetime($time){
    $timestamp = strtotime($time);
    return date('H:i:s', $timestamp) . ' (' . date('Y-m-d', $timestamp) . ')';
}

function deleteorders($mysqli){
    $sql = "TRUNCATE TABLE orders";
    return $mysqli->query($sql);
}

function showDishes($dishes){
    $return = '<ul class="disheslist">';
    foreach(json_decode($dishes) as $dish){
        $return .= '<li>' . $dish->quantity . ' x ' . $dish->name . '</li>';
    }
    return $return.'</ul>';
}

function hasSpecialDish($dishes){
    // Prefiero no usar booleanos por si en el futuro tengo distintas prioridades
    foreach($dishes as $dish){
        if(isSpecialDish($dish)){
            return 1;
        }
    }
    return 0;
}

function parseDishes($arraydishes){
    $dishes = [];
    foreach($arraydishes as $key => $value){
        if(str_starts_with($key, 'plato-') && $value > 0){
            $dish['name'] = CARTA[$key];
            $dish['quantity'] = (int)$value;
            $dishes[] = $dish;
        }
    }
    return $dishes;
}

function isSpecialDish($dish){
    return SPECIAL_DISH == $dish['name'];
}

function isFullKitchen($mysqli){
    return MAX_ORDERS <= mysqli_num_rows(getOrders($mysqli));
}

function dispachorder($mysqli, $post){
    if (isset($post['id'])) {
        $dispachedAt = date('Y-m-d\TH:i:sp');
        $sql = "UPDATE orders SET dispachedAt='$dispachedAt' WHERE id=" . $post['id'];
        if ($mysqli->query($sql)) {
            return 'Comanda despachada';
        } else {
            return 'Error al intentar despachar la comanda';
        }
    }
    return 'Error al borrar. ID no válido.';
}

function aTrollInTheKitchen($mysqli, $id){

    $url = 'https://zombie-entrando-cocina.vercel.app/api/zombie/1';

    // Hacer la llamada a la URL y obtener el resultado
    $resultado = file_get_contents($url);
    $datos = json_decode($resultado);
    $response = $datos->sw45sdf??'';
    if($response){
        $start_string = 'ZOMBIEEEEEEE____';
        $response = str_replace($start_string, '', $response);
        $new_date = str_replace('$', '', $response);
        $sql = "SELECT createdAt FROM orders WHERE id=$id";
        $result = $mysqli->query($sql);
        $queryitem = $result->fetch_assoc();
        $createdAt = substr_replace($queryitem['createdAt'], $new_date, 0, strlen($new_date));
        $sql = "UPDATE orders SET createdAt='$createdAt' WHERE id=$id";
        if ($mysqli->query($sql)) {
            return "El troll hacker manda un UPDATE a la tabla con el valor: $createdAt";
        }
    }
    return false;
}

function hacked($row){
    $originaldate = base64_decode($row['datehash']);
    if(0 == strcmp($originaldate, $row['createdAt'])){
        return false;
    }
    return $originaldate;
}

function unhack($mysqli, $post){
    if (isset($post['id']) && isset($post['createdAt'])) {
        $id = $post['id'];
        $createdAt = $post['createdAt'];
        $sql = "UPDATE orders SET createdAt='$createdAt' WHERE id=$id";
        if ($mysqli->query($sql)) {
            return "Comanda $id destrolleada";
        } else {
            return 'Error al intentar destrollear la comanda';
        }
    }
    return 'Error al intentar destrollear comanda (por lo que sea).';

}
