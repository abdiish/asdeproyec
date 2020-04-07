<?php
include('conexion.php');

$response = $_POST['search'];

if (!empty($response)) {
    # code...
    $query = "SELECT * FROM clientes WHERE rfc LIKE '$response%'";
    $result = mysqli_query($connection, $query);

    if (!$result) {
        # code...
        die('Oops!, Ocurrio un error' . mysqli_error($connection));
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

    $jsonString = json_encode($json);
    echo $jsonString;
}
 