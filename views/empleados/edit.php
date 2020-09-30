<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Editar Empleado</h1>
            </div>

            <section class="row mt-5">
                <div class="card w-50 m-auto">
                    <div class="card-header container">
                        <h2 class="m-auto">Información del Empleado</h2>
                    </div>
                    <div class="card-body">
                        <form id="formEmpleadoU" >
                            <input type="hidden" name="IdEmpleados" value="<?php echo $data[0]->IdEmpleados ?>">
                            <div class="form-group">
                                <label>Nombres:</label>
                                <input type="text" value="<?php echo $data[0]->Nombres ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el nombre" name="Nombres" id="Nombres">
                            </div>
                            <div class="form-group">
                                <label>Apellidos:</label>
                                <input type="text" value="<?php echo $data[0]->Apellidos ?>" required placeholder="Digite el apellido" class="form-control" name="Apellidos" id="Apellidos">
                            </div>
                            <div class="form-group">
                                <label>Identidad:</label>
                                <input type="number" value="<?php echo $data[0]->Identidad ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el numero de identidad" name="Identidad" id="Identidad">
                            </div>
                            <div class="form-group">
                                <label>Dirección:</label>
                                <input type="text" value="<?php echo $data[0]->Direccion ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digite la dirección" name="Direccion" id="Direccion">
                            </div>
                            <div class="form-group">
                                <label>Telefono:</label>
                                <input type="number" value="<?php echo $data[0]->Telefono ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el numero de telefono" name="Telefono" id="Telefono">
                            </div>
                            <div class="form-group">
                                <label>E-mail:</label>
                                <input type="email" value="<?php echo $data[0]->username ?>" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el correo del empleado" name="username" id="username">
                            </div>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-primary btn-block" id="actualizarEmpleado">Guardar Cambios</span>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>

    <script>
    $(document).ready(function() {
        $('#actualizarEmpleado').click(function() {
            vacios = validarFormVacio('formEmpleadoU');

            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#formEmpleadoU').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "?controller=empleado&method=update",
                success: function(r) {
                    if (r == 1) {
                        alertify.success("El Empleado se ha actualizado con éxito");
                        $('#formEmpleadoU').reset();
                    } else {
                        alertify.error("Fallo al actualizar :(");
                    }
                }
            });
        });
    });
</script>