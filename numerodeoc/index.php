<?php include 'template/header.php' ?>

<?php
    include_once "model/conexion.php";
    $sentencia = $bd -> query("select * from estudiante");
    $estudiante = $sentencia->fetchAll(PDO::FETCH_OBJ);
    //print_r($estudiante);
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-9">
            <!-- inicio alerta -->
            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Rellena todos los campos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Registrado!</strong> Se agregaron los datos.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   
            
            

            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
            ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Error!</strong> Vuelve a intentar.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?>   



            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
            ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Cambiado!</strong> Los datos fueron actualizados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 


            <?php 
                if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
            ?>
            <div class="alert alert-warning alert-dismissible fade show" role="alert">
            <strong>Eliminado!</strong> Los datos fueron borrados.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            <?php 
                }
            ?> 

            <!-- fin alerta -->
            <div class="card">
                <div class="card-header">
                    DATOS
                </div>
                <div class="p-4">
                    <table class="table align-middle">
                        <thead>
                            <tr>
                                <th scope="col">Numero OC/TTP</th>
                                <th scope="col">Resumen/Summary</th>
                                <th scope="col">Descripción</th>
                                <th scope="col">Fecha y hora de aplicación</th>
                                <th scope="col">Estado/Status</th>
                                <th scope="col">Aprobado</th>
                                <th scope="col">Solicitante</th>
                                <th scope="col">Tarea en cola Pendiente</th>
                                <th scope="col" colspan="2">Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php 
                                foreach($estudiante as $dato){ 
                            ?>

                            <tr>
                                <td scope="row"><?php echo $dato->id; ?></td>
                                <td><?php echo $dato->nombre; ?></td>
                                <td><?php echo $dato->apellido; ?></td>
                                <td><?php echo $dato->grado; ?></td>
                                <td><?php echo $dato->grupo; ?></td>
                                <td><?php echo $dato->genero; ?></td>
                                <td><?php echo $dato->tecnica; ?></td>
                                <td><?php echo $dato->nacimiento; ?></td>
                                <td><a class="text-success" href="editar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-pencil-square"></i></a></td>
                                <td><a onclick="return confirm('Estas seguro de eliminar?');" class="text-danger" href="eliminar.php?id=<?php echo $dato->id; ?>"><i class="bi bi-trash"></i></a></td>
                            </tr>

                            <?php 
                                }
                            ?>

                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    Ingresar datos:
                </div>
                <form class="p-4" method="POST" action="registrar.php">
                    <div class="mb-3">
                        <label class="form-label">Numero OC/TTP: </label>
                        <input type="text" class="form-control" name="txtNombre" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Resumen/Summary: </label>
                        <input type="text" class="form-control" name="txtApellido" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Descripción: </label>
                        <input type="number" class="form-control" name="txtGrado" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Fecha y hora de aplicación: </label>
                        <input type="text" class="form-control" name="txtGrupo" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Estado/Status: </label>
                        <input type="text" class="form-control" name="txtGenero" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Solicitante: </label>
                        <input type="text" class="form-control" name="txtTecnica" autofocus required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Tarea en cola Pendiente: </label>
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