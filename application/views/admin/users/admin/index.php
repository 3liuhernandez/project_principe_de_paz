<?php $this->load->view('layout/admin/app_admin'); ?>

<div class="col-lg-12">
    <h1 class="page-header">Usuarios Administradores</h1>

    <div class="btn-group">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#register_member_modal">Agregar nuevo</button>
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
    <table class="table" id="table_users_admin">
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
        <tfoot>
            <tr>
                <th></th>
                <th></th>
                <th></th>
                <th></th>
            </tr>
        </tfoot>
    </table>
</div>

<?php $this->load->view('layout/admin/footer_admin'); ?>



<!-- Modal -->
<div class="modal fade" id="register_member_modal" role="dialog">
    <div class="modal-dialog modal-md">

        <!-- Modal content-->
        <div class="modal-content">
            <form class="form-horizontal" action="#" id="register_member" onsubmit="return handle_submit_register(event)">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Registrar Nuevos Usuarios Administradores</h4>
                </div>

                <div class="modal-body">

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Miembro:</label>
                        <div class="col-sm-10">
                        <select
                        name="list_members"
                        id="list_members"
                        class="form-control text-uppercase"
                        title="Seleccione un miembro de la lista"
                        onchange="change_list_members_modal()"></select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">DNI:</label>
                        <div class="col-sm-10">
                            <input type="num" class="form-control" id="dni_modal" name="dni_modal" title="Seleccione un miembro de la lista" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="control-label col-sm-2" for="email">Email:</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" id="email_modal" name="email_modal" title="Seleccione un miembro de la lista" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-2" for="pwd">Password:</label>
                        <div class="col-sm-10">
                        <input type="password" class="form-control" id="pwd" title="Asigne una contraseña" name="pwd">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <div class="row text-center">
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>

    </div>
</div>


<script>
    $(document).ready( function() {
        $('#table_users_admin').DataTable({
            responsive: true,
            scrollx: true,
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
                "sSearch": "Filtrar por:",
                "oPaginate": {
                    "sPrevious": "<i class='btn fa fa-arrow-left'> </i>",
                    "sNext": "<i class='btn fa fa-arrow-right'> </i>"
                },
                "sLengthMenu": "Mostrar _MENU_ registros"
            }
        });
    })
</script>

<script>
    $(document).ready( function() {
        get_members_to_select();
    })

    const get_members_to_select = () => {
        $.ajax({
            url: base_url + 'admin/members/members_to_user',
            method: 'POST',
            success: function(list_members) {
                const members = JSON.parse(list_members);
                $select_list = $('#list_members');
                $select_list.empty();

                $select_list.append('<option value="" disabled selected>Seleccione</option>');

                members.map( member => {
                    $select_list.append('<option value='+member.dni+' data-email="'+member.email+'" data-dni="'+member.dni+'" class="text-uppercase"> '+member.name+' '+member.last_name+' - '+member.type_name+' </option>');
                })
            },
            error: function(error) {
                console.log(`error`, error);
            }
        })
    }

    const change_list_members_modal = () => {
        const $select = $('#list_members');
        const value_selected = $select.val();

        const $option_selected = $select.children('option[value="'+value_selected+'"]');
        const email_member_selected = $option_selected.data('email');
        const dni_member_selected = $option_selected.data('dni');

        const $register_modal = $('#register_member_modal .modal-content .modal-body');
        $register_modal.find('#email_modal').val(email_member_selected);
        $register_modal.find('#dni_modal').val(dni_member_selected);
        $select.parents('.form-group').removeClass('has-error has-feedback')
        $select.parents('.form-group').addClass('has-success has-feedback')
    }

    const handle_submit_register = (e) => {
        e.preventDefault();
        const $form_register = $('#register_member');
        const data_form = $form_register.serialize();
        const check = validate_inputs($form_register);

        if ( check ) {
             
        }
        return false
    }

    const validate_inputs = ($form) => {
        let check = false
        $form.find('.form-control').each( function() {
            $input = $(this);
            if(!$input.val()) {
                $description = '';
                $description += $input.attr('title');
                swale('Complete el formulario', $description, 'ok')
                $input.parents('.form-group').addClass('has-error has-feedback')

                check = false
            } else {
                $input.parents('.form-group').removeClass('has-error has-feedback')
                check = true
            }
        })

        return check
    }
</script>