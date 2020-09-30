<?php if ($_SESSION['user']->role == 'Administrador') { ?>
    <div class="main-panel">
        <div class="content">
            <div class="container-fluid">
                <section class="row mt-5">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tabla</h4>
                            <p class="card-category">Roles</p>
                        </div>
                        <div class="card-body">
                            <table class="table table-head-bg-success table-striped table-hover table-responsive">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Nombre Rol</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($roles as $rol) : ?>
                                        <tr>
                                            <td>
                                                <?php echo $rol->idRol ?>
                                            </td>
                                            <td>
                                                <?php echo $rol->Nombre ?>
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
        

        $(document).ready(function () {
	$('li.nav-item').click(function () {
		// Add "active" to the clicked element and
		// get all siblings and remove "active" from them
		$(this).addClass('active').siblings().removeClass('active');
	});
});
    </script>

<?php } else {
    header('Location: ?controller=home');
} ?>