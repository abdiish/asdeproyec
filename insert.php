<?php
include('conexion.php');

if (isset($_POST['nombre'])) {
    # code...
    $nombre    = $_POST['nombre'];
    $paterno   = $_POST['paterno'];
    $materno   = $_POST['materno'];
    $direccion = $_POST['direccion'];
    $telefono  = $_POST['telefono'];
    $rfc       = $_POST['rfc'];

    $query = "INSERT INTO clientes (nombre,paterno,materno,direccion,telefono,rfc) 
              VALUES ('$nombre','$paterno','$materno','$direccion','$telefono','$rfc')";
    
    $result = mysqli_query($connection,$query);

    if (!$result) {
        # code...
        die('Oops!Ha ocurrido un error...');
    }else{
        echo 'Se agrego un nuevo registro.';
    }
}
 