<?php $this->load->view('layout/admin/app_admin'); ?>

<div class="col-lg-12">
    <h1 class="page-header">Usuarios Administradores</h1>

    <div class="btn-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_modal">Agregar nuevo</button>
    </div>
</div>

<?php
    $usuarios = array(
        (object) [
            'id' => 1,
            'email' => '3liuhernandez@gmail.com',
            'position' => 'administrador',
            'last_name' => 'hernandez',
        ],
        (object) [
            'id' => 2,
            'email' => 'josue@gmail.com',
            'position' => 'lider',
            'last_name' => 'Ayala',
        ],
        (object) [
            'id' => 3,
            'email' => 'dairo@gmail.com',
            'position' => 'pastor',
            'last_name' => 'Ayala',
        ],
    );

?>

<!-- CONTAINER SECCION PAGE -->
<div class="container-fluid">
    <table class="table" id="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <!-- <th>Apellido</th> -->
                <th>Cargo</th>
                <th>Editar</th>
                <th>Eliminar</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($list_users as $user) { ?>
                <tr>
                    <td class="text-uppercase"> <?php echo $user->email ?> </td>
                    <td class="text-uppercase"> <?php echo $user->type_name ?> </td>
                    <td class="text-uppercase"> <button class="btn btn-warning"> editar </button>
                    <td class="text-uppercase"> <button class="btn btn-danger"> Eliminar </button>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php $this->load->view('layout/admin/footer_admin'); ?>



<!-- Modal -->
<div class="modal fade" id="add_modal" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Registrar Nuevos Usuarios Administradores</h4>
            </div>

            <div class="modal-body">
                <form class="form-horizontal" action="/action_page.php">
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="pwd">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                        <select name="list_members" id="list_members" class="form-control">
                            <option value=""></option>
                        </select>
                        </div>
                    </div>

                </form>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <div class="caja"></div>
            </div>
        </div>

    </div>
</div>


<script>
    $(document).ready( function() {
        $('#table').DataTable({
            dom: 'Bfrtip',
            buttons: ['excel'],
            responsive: true,
            /* scrollx: true, */
            "oLanguage": {
                "sProcessing": "Procesando...",
                "sLengthMenu": "Mostrar _MENU_ registros",
                "sZeroRecords": "No se encontraron resultados",
                "sEmptyTable": "Ningún dato disponible en esta tabla",
                "sInfo": "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
                "sInfoEmpty": "Mostrando registros del 0 al 0 de un total de 0 registros",
                "sInfoFiltered": "(filtrado de un total de _MAX_ registros)",
                "sInfoPostFix": "",
                "sSearch": "Buscar:",
                "sUrl": "",
                "sInfoThousands": ",",
                "sLoadingRecords": "Cargando...",
                "oAria": {
                    "sSortAscending": ": Activar para ordenar la columna de manera ascendente",
                    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
                },
                "sSearch": "Buscar:",
                "oPaginate": {
                    "sPrevious": "<",
                    "sNext": ">"
                },
                "sLengthMenu": "Mostrar _MENU_ registros"
            }
        });
    })
</script>

<script>
    $(document).ready( function() {
        $.ajax({
            url: base_url + 'admin/members/list',
            method: 'POST',
            success: function(list_members) {
                const members = JSON.parse(list_members)
                $select_list = $('#list_members');
                $select_list.empty();

                $select_list.append('<option value="" disabled selected>Seleccione un miembro</option>');

                members.map( member => {
                    $select_list.append('<option value='+member.dni+'> '+member.name+' '+member.last_name+' </option>')
                })
            },
            error: function(error) {
                console.log(`error`, error)
            }
        })
    })
</script>