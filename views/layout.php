<?php if (isset($_SESSION['user'])) { ?>
    <!DOCTYPE html>
    <html>

    <head>
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <title>Reciclaplus</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
        <link rel="stylesheet" href="assets/css/ready.css">
        <link rel="stylesheet" href="assets/css/demo.css">
        <link rel="stylesheet" href="assets/helpers/alertifyjs/css/alertify.css">
        <link rel="stylesheet" href="assets/helpers/alertifyjs/css/themes/default.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    </head>

    <body>
        <div class="main-header">
            <div class="logo-header">
                <a href="?controller=home" class="logo">
                    ReciclaPlus
                </a>
                <button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-controls="sidebar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <button class="topbar-toggler more"><i class="la la-ellipsis-v"></i></button>
            </div>
        </div>
        <div class="sidebar">
            <div class="scrollbar-inner sidebar-wrapper">
                <div class="user">
                    <div class="info">
                        <a class="" data-toggle="collapse" href="#collapseExample" aria-expanded="true">
                            <span>
                                <?php echo $_SESSION['user']->Nombres . " " . $_SESSION['user']->Apellidos ?>
                                <span class="user-level"><?php echo $_SESSION['user']->role ?></span>
                                <span class="caret"></span>
                            </span>
                        </a>
                        <div class="clearfix"></div>

                        <div class="collapse in" id="collapseExample" aria-expanded="true">
                            <ul class="nav">
                                <li>
                                    <a href="?controller=empleado&method=editEmpleados&IdEmpleados=<?php echo $_SESSION['user']->IdEmpleados ?>">
                                        <span class="link-collapse">Actualizar información personal</span>
                                    </a>
                                </li>

                                <li>
                                    <a href="?controller=login&method=logout">
                                        <span class="link-collapse">Cerrar Sesión</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <ul class="nav">

                    <?php if ($_SESSION['user']->role == "Administrador") { ?>
                        <li class="nav-item active">
                            <a id="empleadoli" href="?controller=empleado">
                                <i class="la la-dashboard"></i>
                                <p>Empleados</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>
                        <li id="asignacionesli" class="nav-item">
                            <a href="?controller=asignacion">
                                <i class="la la-table"></i>
                                <p>Asignaciones</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>
                        <li id="materialesli" class="nav-item">
                            <a href="?controller=material">
                                <i class="la la-keyboard-o"></i>
                                <p>Materiales</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>
                        <li id="rolesli" class="nav-item">
                            <a href="?controller=rol">
                                <i class="la la-th"></i>
                                <p>Roles</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>
                    <?php } else { ?>
                        <li class="nav-item">
                            <a href="?controller=home#asignacioneshoy">
                                <i class="la la-table"></i>
                                <p>Asignaciones de hoy</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="?controller=home#historial">
                                <i class="la la-table"></i>
                                <p>Historial de asignaciones</p>
                                <span class="badge badge-count"></span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </div>

        <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <div class="copyright ml-auto">
                        2020 TODOS LOS DERECHOS RESERVADOS A RECICLAPLUS
                    </div>
            </div>
        </footer>
    </body>
    <script src="assets/js/core/jquery.3.2.1.min.js"></script>
    <script src="assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="assets/js/core/popper.min.js"></script>
    <script src="assets/js/core/bootstrap.min.js"></script>
    <script src="assets/js/plugin/chartist/chartist.min.js"></script>
    <script src="assets/js/plugin/chartist/plugin/chartist-plugin-tooltip.min.js"></script>
    <script src="assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/jquery.mapael.min.js"></script>
    <script src="assets/js/plugin/jquery-mapael/maps/world_countries.min.js"></script>
    <script src="assets/js/plugin/chart-circle/circles.min.js"></script>
    <script src="assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <script src="assets/js/ready.min.js"></script>
    <script src="assets/js/demo.js"></script>
    <script src="assets/helpers/alertifyjs/alertify.js"></script>
    <script src="assets/helpers/funciones.js"></script>
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>

    </html>

<?php } else {
    header('Location: ?controller=login');
} ?>