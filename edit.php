<?php
include('conexion.php');

$id        = $_POST['id'];
$nombre    = $_POST['nombre'];
$paterno   = $_POST['paterno'];
$materno   = $_POST['materno'];
$direccion = $_POST['direccion'];
$telefono  = $_POST['telefono'];
$rfc       = $_POST['rfc'];

echo $_POST['nombre'];

$query = "UPDATE clientes SET nombre = '$nombre',paterno = '$paterno',
                              materno = '$materno',direccion = '$direccion',
                              telefono = '$telefono',rfc = '$rfc' WHERE id = '$id'";
$result = mysqli_query($connection,$query);

if (!$result) {
    # code...
    die('Oops! Ha ocurrido un error.');
}
echo 'Se actualizo la información del contribuyente.';
?>