<?php

include('conexion.php');

$query = "SELECT * FROM clientes";
$result = mysqli_query($connection,$query);

if (!$result) {
    # code...
    die('Oops! ocurrio un error'.mysqli_error($connection));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
    # code...
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
$jsonResult = json_encode($json);
echo $jsonResult;

?>