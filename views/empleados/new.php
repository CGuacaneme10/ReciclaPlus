<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Agregar Empleado</h1>
            </div>

            <section class="row mt-5">
                <div class="card w-50 m-auto">
                    <div class="card-header container">
                        <h2 class="m-auto">Información del Empleado</h2>
                    </div>
                    <div class="card-body">
                        <form id="formEmpleado">
                            <div class="form-group">
                                <label>Nombres:</label>
                                <input type="text" required class="form-control" placeholder="Digita el nombre" name="Nombres" id="Nombres">
                            </div>
                            <div class="form-group">
                                <label>Apellidos:</label>
                                <input type="text" required placeholder="Digita el apellido" class="form-control" name="Apellidos" id="Apellidos">
                            </div>
                            <div class="form-group">
                                <label>Identidad:</label>
                                <input type="number" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el numero de documento" name="Identidad" id="Identidad">
                            </div>
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input type="text" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita la dirección" name="Direccion" id="Direccion">
                            </div>
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="number" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el teléfono" name="Telefono" id="Telefono">
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el correo" name="username" id="username">
                            </div>
                            <div class="form-group">
                                <label>Rol:</label>
                                <select name="rol_id" id="rol_id" class="form-control" required>
                                    <?php foreach ($roles as $rol) : ?>
                                        <option value="<?php echo $rol->idRol ?>"><?php echo $rol->Nombre ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-primary btn-block" id="registrarEmpleado">Guardar Empleado</span>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#registrarEmpleado').click(function() {
            vacios = validarFormVacio('formEmpleado');

            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#formEmpleado').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "?controller=empleado&method=saveEmpleado",
                success: function(r) {
                    if (r == 1) {
                        alertify.success("Empleado agregado con éxito");
                        $('#formEmpleado').reset();
                    } else {
                        alertify.error("Fallo al agregar :(");
                    }
                }
            });
        });
    });
</script>