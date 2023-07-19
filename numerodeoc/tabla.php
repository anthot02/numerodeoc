<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from estudiante");
    $estudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($estudiante);
?>
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grado: </label>
                        <input type="number" class="form-control" name="txtGrado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo: </label>
                        <input type="text" class="form-control" name="txtGrupo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnica: </label>
                        <input type="text" class="form-control" name="txtTecnica" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Año de nacimiento: </label>
                        <input type="number" class="form-control" name="txtNacimiento" autofocus required>
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="oculto" value="1">
                        <input type="submit" class="btn btn-primary" value="Registrar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>