<?php if ($_SESSION['user']->role == 'Administrador') { ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <section class="row mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabla</h4>
                            <p class="card-category">Materiales</p>
                        </div>
                        <div class="card-body"><a href="?controller=material&method=new" class="btn btn-success">Agregar Material</a>
                            <br>
                            <br>
                            <table id="tablaMateriales" class="table table-head-bg-success table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Material</th>
                                        <th>Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($materiales as $material) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $material->idMaterial ?>
                                            </td>
                                            <td>
                                                <?php echo $material->Nombres ?>
                                            </td>
                                            <td>
                                                <a href="?controller=material&method=editMaterial&idMaterial=<?php echo $material->idMaterial ?>" class="btn btn-primary">Editar</a>
                                                <a href="?controller=material&method=deleteMaterial&idMaterial=<?php echo $material->idMaterial ?>" class="btn btn-danger">Eliminar</a>
                                            </td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
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