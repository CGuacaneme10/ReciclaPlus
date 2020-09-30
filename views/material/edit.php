<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Editar Material</h1>
            </div>

            <section class="row mt-5">
                <div class="card w-50 m-auto">
                    <div class="card-header container">
                        <h2 class="m-auto">Información del Material</h2>
                    </div>
                    <div class="card-body">
                        <form action="?controller=material&method=update" method="post">
                            <input type="hidden" name="idMaterial" value="<?php echo $data[0]->idMaterial ?>">
                            <div class="form-group">
                                <label>Nombre:</label>
                                <input type="text" value="<?php echo $data[0]->Nombres ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el nombre del material" name="Nombres">
                            </div>
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block">Guardar Cambios</button>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>