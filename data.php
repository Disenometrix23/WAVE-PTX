<?php 
    include("include/functions.php");
    include("include/conn.php");
    include("include/get_data.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Data :: MOBILINK WAVE PTX ™</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.4/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Varela+Round" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet" />
        <link href="assets/css/datatables.min.css" rel="stylesheet"/>
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="assets/css/styles.css" rel="stylesheet" />

        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="assets/js/dataTables.min.js"></script>
        <script src="assets/js/dataTables.buttons.min.js"></script>
        <script src="assets/js/jszip.min.js"></script>
        <script src="assets/js/buttons.html5.min.js"></script>

    </head>
    <body id="page-top">
        
        <section class="page-heading-area over-layer-black p-0 mt-5">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="default-title text-center">
                            <div class="flx">
                                <h3>LISTA DE LEADS</h3>
                            </div>
                            <div class="col-md-12 text-center mb-4">
                                <hr style="background: #fff;">
                                <div class="table-responsive">
                                    <table id="table-leads" class="display nowrap" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Fecha</th>
                                                <th>Nombre</th>
                                                <th>Teléfono</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach ($leads as $key => $lead) { ?>
                                                <tr style="font-family: Arial;">
                                                    <td><?= formatoFecha($lead['fecha'], 'm-d-y') ?></td>
                                                    <td><?= $lead['nombre'] ?></td>
                                                    <td><?= $lead['tel'] ?></td>
                                                    <td><?= $lead['email'] ?></td>
                                                </tr>
                                            <?php } ?>
                                            
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        
        
        <script type="text/javascript">
        
            $(document).ready(function() {
                $('#table-leads').DataTable( {
                    dom: 'Bfrtip',
                    buttons: [
                        'excel'
                    ],
                    "order": [[ 0, 'desc' ]]
                } );
            } );

        </script>



    </body>
</html>
