<?php if (!isset($_SESSION['user'])) {
    header('Location: ?controller=login');
} else { ?>
    <?php
    if ($_SESSION['user']->role == 'Empleado') {
    ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">
                    <img src="assets/img/reciclaplus.png" alt="120" width="220">
                    <br>
                    <br>
                    <div class="row" id="asignacioneshoy">
                        <?php foreach ($asignacioneshoy as $asignacionh) : ?>
                            <div class="col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $asignacionh->Material ?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted">Cantidad: <?php echo $asignacionh->Cantidad ?></h6>
                                        <p class="card-text">Valor por unidad del material: <?php echo $asignacionh->Valor ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="row" id="historial">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Tabla</h4>
                                    <p class="card-category">Historial de Asignaciones</p>
                                </div>
                                <div class="card-body">
                                    <br>
                                    <br>
                                    <table class="table table-head-bg-success table-striped table-hover table-responsive">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Nombre del empleado</th>
                                                <th>Material a cargo</th>
                                                <th>Valor c/u</th>
                                                <th>Cantidad</th>
                                                <th>Fecha</th>
                                                <th>Valor Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($historial as $asignacion) : ?>
                                                <tr>
                                                    <td>
                                                        <?php echo $asignacion->Id ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Nombres ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Material ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Valor ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Cantidad ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Fecha ?>
                                                    </td>
                                                    <td>
                                                        <?php echo $asignacion->Valor * $asignacion->Cantidad ?>
                                                    </td>
                                                </tr>
                                            <?php endforeach ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php } else { ?>
        <div class="main-panel">
            <div class="content">
                <div class="container-fluid">

                    <br>
                    <br>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="card card-stats card-warning">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-users"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Empleados</p>
                                                <h4 class="card-title"><?php echo $numEmpleados[0]->Empleados ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-success">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-bar-chart"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Material</p>
                                                <h4 class="card-title"><?php echo $numMateriales[0]->Materiales ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-danger">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-newspaper-o"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Admini- stradores
                                                </p>
                                                <h4 class="card-title"><?php echo $numEmpleadosA[0]->Empleados ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card card-stats card-primary">
                                <div class="card-body ">
                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icon-big text-center">
                                                <i class="la la-check-circle"></i>
                                            </div>
                                        </div>
                                        <div class="col-7 d-flex align-items-center">
                                            <div class="numbers">
                                                <p class="card-category">Total de usuarios</p>
                                                <h4 class="card-title"><?php echo $numEmpleadosA[0]->Empleados + $numEmpleados[0]->Empleados ?></h4>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>





                </div>
            </div>
    <?php }
} ?>