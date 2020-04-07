<?php

include('conexion.php');

$id = $_POST['id'];
$query = "SELECT * FROM clientes WHERE id = $id";
$result = mysqli_query($connection,$query);

if (!$result) {
    # code...
    die('Oops! Ha ocurrido un error.');
}

$json = array();
    while ($row = mysqli_fetch_array($result)) {
        $json[] = array(
            'nombre'   => $row['nombre'],
            'paterno'  => $row['paterno'],
            'materno'  => $row['materno'],
            'telefono' => $row['telefono'],
            'direccion'=> $row['direccion'],
            'rfc'      => $row['rfc'],
            'id'       => $row['id']
        );
    }

    $jsonString = json_encode($json[0]);
    echo $jsonString;

?>