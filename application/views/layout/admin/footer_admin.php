
            </div>
        </div>

        <!-- <div id="modal_spinner" class="w3-modal w3-display-container">
            <strong class="w3-text-white w3-xxlarge w3-margin-top w3-display-middle w3-center">
                Hagios I.F.I <b class="fa fa-spinner fa-spin w3-xxxlarge"></b>
            </strong>
            <p class="w3-medium w3-text-white w3-margin-top w3-display-bottommiddle">
                [Si la pantalla persiste por más de 3 minutos: recargue la página]
            </p>
        </div> -->

    </div>
</body>



    <!-- jQuery -->
    <script src="<?php echo base_url()?>lib/js/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="<?php echo base_url()?>lib/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="<?php echo base_url()?>lib/js/metisMenu.min.js"></script>

    <!-- Morris Charts JavaScript -->
    <script src="<?php echo base_url()?>lib/js/raphael.min.js"></script>
    <script src="<?php echo base_url()?>lib/js/morris.min.js"></script>
    <script src="<?php echo base_url()?>lib/js/morris-data.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="<?php echo base_url()?>lib/js/startmin.js"></script>



    <!-- DATA TABLES -->
    <!-- <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/data_tables/jquery.dataTables.min.css') ; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/data_tables/select.dataTables.min.css') ; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/data_tables/responsive.dataTables.min.css') ; ?>"> -->

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dataTables/dataTables.bootstrap.css') ; ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/dataTables/dataTables.responsive.css') ; ?>">

    <!-- Datatables requires -->
    <!-- <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script> -->

    <script src="<?php echo base_url('lib/js/dataTables/dataTables.bootstrap.min.js')?>"></script>
    <script src="<?php echo base_url('lib/js/dataTables/jquery.dataTables.min.js')?>"></script>

    <script>
        $(document).ready(function(){
        
            $('.data-table').DataTable({
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

</html>