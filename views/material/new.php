<div class="main-panel">
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <h1>Agregar Material</h1>
            </div>

            <section class="row mt-5">
                <div class="card w-50 m-auto">
                    <div class="card-header container">
                        <h2 class="m-auto">Información del material</h2>
                    </div>
                    <div class="card-body">
                        <form id="formMaterial">
                            <div class="form-group">
                                <label>Nombres:</label>
                                <input type="text" required class="form-control" pattern="[A-Za-z]{2, 25}" placeholder="Digita el nombre del material" name="Nombres" id="Nombres">
                            </div>
                    </div>
                    <div class="form-group">
                        <span class="btn btn-primary btn-block" id="registrarMaterial">Guardar Material</span>
                    </div>
                    </form>
                </div>
            </section>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $('#registrarMaterial').click(function() {
            vacios = validarFormVacio('formMaterial');

            if (vacios > 0) {
                alertify.alert("Debes llenar todos los campos!!");
                return false;
            }

            datos = $('#formMaterial').serialize();
            $.ajax({
                type: "POST",
                data: datos,
                url: "?controller=material&method=saveMaterial",
                success: function(r) {
                    if (r == 1) {
                        alertify.success("Material agregado con éxito");
                    } else {
                        alertify.error("Fallo al agregar :(");
                    }
                }
            });
        });
    });
</script>