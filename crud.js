$(document).ready(function(){
    
    $('#container-result-search').hide();
    tableContribuyes();
    let edit= false;
    
    $('#search').keyup(function (e) {
        if ($('#search').val()) {
            let search = $('#search').val();
            $.ajax({
                url: 'search.php',
                type: 'POST',
                data: {
                    search: search
                },
                success: function (data) {
                    let clients = JSON.parse(data);
                    console.info(clients);
                    let template = '';
                    clients.forEach(client=>{
                        template += `<li>${client.nombre} ${client.paterno}
                                         ${client.materno} ${client.telefono}
                                         ${client.rfc}</li>`
                    });
                    $('#search-list').html(template);
                    $('#container-result-search').show();
                }
            });
        }else{
            $('#container-result-search').hide();
        }
    });

    $('#form-contribuyente').submit(function(e){
        e.preventDefault();
        const DatosContribuyente = {
            nombre:    $('#txt-nombre').val().trim(),
            paterno:   $('#txt-paterno').val().trim(),
            materno:   $('#txt-materno').val().trim(),
            direccion: $('#txt-direccion').val().trim(),
            telefono:  $('#txt-telefono').val().trim(),
            rfc:       $('#txt-rfc').val().trim(),
            id:        $('#clientId').val()
        };

        const url =  edit === false ? 'insert.php' : 'edit.php';
        console.log(DatosContribuyente,url); 
        /*if ( edit === true){
            confirm('Se realizarán cambios,¿Desea guardarlos?');
        }else{
            $('#form-contribuyente').trigger('reset');
        }*/
        $.post(url,DatosContribuyente,function(data){
            console.log(data);
            tableContribuyes();
            $('#form-contribuyente').trigger('reset');
            tableContribuyes();
        });
        e.preventDefault();
    });

    function tableContribuyes() {
        $.ajax({
            url: 'table.php',
            type: 'GET',
            success: function (data) {
                let clients = JSON.parse(data);
                console.info(clients);
                let template = '';
                clients.forEach(client=>{
                    template += `<tr id-client="${client.id}"><td>${client.id}</td>
                                     <td>${client.rfc}</td>
                                     <td>${client.nombre}</td>
                                     <td>${client.paterno}</td>
                                     <td>${client.materno}</td>
                                     <td>${client.telefono}</td>
                                     <td>${client.direccion}</td>
                                     <td><button class="delete-reg">Eliminar</button></td>
                                     <td><button class="edit-reg">Editar</button></td>
                                </tr>`
                                     
                });
                $('#data').html(template);
            } 
        });
    }

    $(document).on('click','.delete-reg',function () {
        if (confirm('¿Está seguro de querer eliminar el registro?')) {
            let reg = $(this)[0].parentElement.parentElement;
            let id = $(reg).attr('id-client');
            console.log(id);
            $.post('delete.php',{id},function(data){
                console.log(data);
                tableContribuyes();
            });   
        }
    });


    $(document).on('click','.edit-reg',function (e) {
            let reg = $(this)[0].parentElement.parentElement;
            let id = $(reg).attr('id-client');
            console.log(id);
            $.post('update.php',{id},function(data){
                console.log(data);
                const client = JSON.parse(data);
                $('#txt-nombre').val(client.nombre),
                $('#txt-paterno').val(client.paterno),
                $('#txt-materno').val(client.materno),
                $('#txt-direccion').val(client.direccion),
                $('#txt-telefono').val(client.telefono),
                $('#txt-rfc').val(client.rfc),
                $('#clientId').val(client.id)
                edit = true;
            });
            e.preventDefault();
    });


});