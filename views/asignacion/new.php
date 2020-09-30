
<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Agregar Asignación</h1>
            </div>

            <section class="row mt-5">
                <div class="card w-50 m-auto">
                    <div class="card-header container">
                        <h2 class="m-auto">Información de la asignación</h2>
                    </div>
                    <div class="card-body">
                        <form id="formAsignacion">
                            <div class="form-group">
                                <label>Empleado:</label>
                                <select name="empleados_id" class="form-control" required>
                                    <option>Seleccione...</option>
                                    <?php foreach ($empleados as $empleado) : ?>
                                        <option value="<?php echo $empleado->IdEmpleados ?>"><?php echo $empleado->Nombres ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Material:</label>
                                <select name="material_id" class="form-control" required>
                                    <option>Seleccione...</option>
                                    <?php foreach ($materiales as $material) : ?>
                                        <option value="<?php echo $material->idMaterial ?>"><?php echo $material->Nombres ?></option>
                                    <?php endforeach ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Cantidad:</label>
                                <input type="number" required class="form-control" placeholder="Digite la cantidad" name="Cantidad" id="Cantidad">
                            </div>
                            <div class="form-group">
                                <label>Valor:</label>
                                <input type="number" required class="form-control" placeholder="Digita el valor" name="Valor" id="Valor">
                            </div>
                            <div class="form-group">
                                <label>Fecha:</label>
                                <input min="<?php echo date("Y-m-d")  ?>" type="date" required class="form-control" placeholder="Digita la fecha de asignacion" name="Fecha" id="Fecha">
                            </div>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-primary btn-block" id="registrarAsignacion">Guardar Asignación</span>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#registrarAsignacion').click(function() {
            vacios = validarFormVacio('formAsignacion');

            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#formAsignacion').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "?controller=asignacion&method=saveAsignacion",
                success: function(r) {
                    if (r == 1) {
                        alertify.success("Asignación hecha con éxito");
                        window.location.href = "?controller=home#asignaciones";
                    } else {
                        alertify.error("Fallo al hacer la asignación ");
                    }
                }
            });
        });
    });
</script>
