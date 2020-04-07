<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="main.css">
    <title>Contribuyentes</title>
</head>

<body>
    <section class="container-search">
        <form action="" class="form-search">
            <input type="search" name="" id="search" placeholder="Buscar por RFC">
            <button type="submit">Buscar</button>
        </form>
    </section>
    <br><br>
    <div class="container">
        <form action="" id="form-contribuyente">
            <input type="hidden" name="" id="clientId">
            <table border="1">
                <tr>
                    <td colspan="3" class="title-form">REGISTRAR CONTRIBUYENTE</td>
                </tr>
                <tr>
                    <td>Nombre</td>
                    <td colspan="2"><input type="text" name="" id="txt-nombre" required></td>
                </tr>
                <tr>
                    <td>Apellido Paterno</td>
                    <td colspan="2"><input type="text" name="" id="txt-paterno" required></td>
                </tr>
                <tr>
                    <td>Apellido Materno</td>
                    <td colspan="2"><input type="text" name="" id="txt-materno" required></td>
                </tr>
                <tr>
                    <td>Dirección</td>
                    <td colspan="2"><input type="text" name="" id="txt-direccion" required></td>
                </tr>
                <tr>
                    <td>Telefono</td>
                    <td colspan="2"><input type="tel" name="" id="txt-telefono" required></td>
                </tr>
                <tr>
                    <td>RFC</td>
                    <td colspan="2"><input type="text" name="" id="txt-rfc" required> </td>
                </tr>
                <tr>
                    <td colspan="3">
                        <button type="submit">Guardar</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
    <table border="1" class="table-contribuyentes">
        <thead>
            <tr>
                <td colspan="9" class="title-form">LISTA DE CONTRIBUYENTES</td>
            </tr>
            <tr>
                <td>Id</td>
                <td>RFC</td>
                <td>Nombre</td>
                <td>Apellido Paterno</td>
                <td>Apellido Materno</td>
                <td>Telefono</td>
                <td>Direccion</td>
                <td colspan="2">Acciones</td>
            </tr>
        </thead>
        <tbody id="data"></tbody>
    </table>
    <section>
        <div id="container-result-search" class="results">
            <h2>Resultado de la Busqueda</h2>
            <ul id="search-list"></ul>
        </div>
    </section>
    <h5>Imprimir 10 números consecutivos de cada renglón y 10 de cada columna</h5>
    <table class="cuadro">
        <?php
        $filas = 10;
        $columnas = 10;
        for ($idx = 1; $idx < $filas; $idx++) {
            # code...
            $tr = '<tr>';
            $contador = $idx;
            for ($jdx=1; $jdx < $columnas; $jdx++) { 
                # code...
                $tr .= '<td>'.$contador.'</td>';
                $contador++;
            }
            $tr .= '</tr>';
            echo $tr;
        }
        ?>
    </table>
    <script src='jquery.min.js'></script>
    <script src='crud.js'></script>
</body>

</html> 