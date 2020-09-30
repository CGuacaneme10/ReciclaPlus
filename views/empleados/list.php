<?php if ($_SESSION['user']->role == 'Administrador') { ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <section class="row mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabla</h4>
                            <p class="card-category">Empleados</p>
                        </div>
                        <div class="card-body"><a href="?controller=empleado&method=new" class="btn btn-success">Agregar Empleado</a>
                            <br>
                            <br>
                            <div class="filterable">
                                <table id="tablaEmpleados" style=" text-align: center;  margin:90 auto;" class="table table-head-bg-success table-striped table-hover table-responsive">
                                    <thead>
                                        <tr class="filters">
                                            <th>Id</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Identidad</th>
                                            <th>Dirección</th>
                                            <th>Telefono</th>
                                            <th>Correo</th>
                                            <th>Rol</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($empleados as $empleado) : ?>
                                            <tr>
                                                <td>
                                                    <?php echo $empleado->IdEmpleados ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Nombres ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Apellidos ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Identidad ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Direccion ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Telefono ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->username ?>
                                                </td>
                                                <td>
                                                    <?php echo $empleado->Nombre ?>
                                                </td>
                                                <td>
                                                    <a href="?controller=empleado&method=editEmpleados&IdEmpleados=<?php echo $empleado->IdEmpleados ?>" class="btn btn-primary">Editar</a>
                                                    <a href="?controller=empleado&method=deleteempleado&IdEmpleados=<?php echo $empleado->IdEmpleados ?>" class="btn btn-danger">Eliminar</a>
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