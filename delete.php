<?php

include('conexion.php');

if (isset($_POST['id'])) {
    # code...
    $id = $_POST['id'];
    $query = "DELETE FROM clientes WHERE id = $id";
    $result = mysqli_query($connection,$query);

    if (!$result) {
        # code...
        die('Oops! Ha ocurrido un error.');
    }
    echo 'Se ha eliminado el elemento.';
}


?>