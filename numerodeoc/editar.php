<?php include 'template/header.php' ?>

<?php
    if(!isset($_GET['id'])){
        header('Location: index.php?mensaje=error');
        exit();
    }

    include_once 'model/conexion.php';
    $id = $_GET['id'];

    $sentencia = $bd->prepare("select * from estudiante where id = ?;");
    $sentencia->execute([$id]);
    $estudiante = $sentencia->fetch(PDO::FETCH_OBJ);
    //print_r($estudiante);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Editar datos:
                </div>
                <form class="p-4" method="POST" action="editarProceso.php">
                    <div class="mb-3">
                        <label class="form-label">Nombre: </label>
                        <input type="text" class="form-control" name="txtNombre" required 
                        value="<?php echo $estudiante->nombre; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Apellido: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required
                        value="<?php echo $estudiante->apellido; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grado: </label>
                        <input type="number" class="form-control" name="txtGrado" autofocus required
                        value="<?php echo $estudiante->grado; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Grupo: </label>
                        <input type="text" class="form-control" name="txtGrupo" autofocus required
                        value="<?php echo $estudiante->grupo; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Genero: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required
                        value="<?php echo $estudiante->genero; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tecnica: </label>
                        <input type="text" class="form-control" name="txtTecnica" autofocus required
                        value="<?php echo $estudiante->tecnica; ?>">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Nacimiento: </label>
                        <input type="text" class="form-control" name="txtNacimiento" autofocus required
                        value="<?php echo $estudiante->nacimiento; ?>">
                    </div>
                    <div class="d-grid">
                        <input type="hidden" name="id" value="<?php echo $estudiante->id; ?>">
                        <input type="submit" class="btn btn-primary" value="Editar">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include 'template/footer.php' ?>