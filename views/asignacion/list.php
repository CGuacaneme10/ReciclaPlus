<?php if ($_SESSION['user']->role == 'Administrador') { ?>

    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <section class="row mt-5">


                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabla</h4>
                            <p class="card-category">Asignaciones</p>
                        </div>
                        <div class="card-body"><a href="?controller=asignacion&method=new" class="btn btn-success">Agregar Asignación</a>
                            <br>
                            <br>
                            <div class="filterable">


                                <table id="tablaAsignaciones" class="table table-head-bg-success table-striped table-hover table-responsive">
                                    <thead>
                                        <tr class="filters">
                                            <th>Id</th>
                                            <th>Nombre del empleado</th>
                                            <th>Material a cargo</th>
                                            <th>Valor c/u</th>
                                            <th>Cantidad</th>
                                            <th>Fecha</th>
                                            <th>Valor Total</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($asignaciones as $asignacion) : ?>
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
                                                <td>
                                                    <a href="?controller=asignacion&method=deleteasignacion&Id=<?php echo $asignacion->Id ?>" class="btn btn-danger">Eliminar</a>
                                                </td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </section>
            </div>
        </div>
    </div>




    <script>
        $(document).ready(function() {
            $('li.nav-item').click(function() {
                // Add "active" to the clicked element and
                // get all siblings and remove "active" from them
                $(this).addClass('active').siblings().removeClass('active');
            });
        });
    </script>

<?php } else {
    header('Location: ?controller=home');
} ?>