<?php
    print_r($_POST);
    if(!isset($_POST['id'])){
        header('Location: index.php?mensaje=error');
    }

    include 'model/conexion.php';
    $id = $_POST['id'];
    $nombre = $_POST['txtNombre'];
    $apellido = $_POST['txtApellido'];
    $grado = $_POST['txtGrado'];
    $grupo = $_POST['txtGrupo'];
    $genero = $_POST['txtGenero'];
    $tecnica = $_POST['txtTecnica'];
    $nacimiento = $_POST['txtNacimiento'];

    $sentencia = $bd->prepare("UPDATE estudiante SET nombre= ?, apellido= ?, grado= ?, grupo= ? , genero= ?, tecnica= ?, nacimiento= ? WHERE id=?");
    $resultado = $sentencia->execute([$id, $nombre, $apellido, $grado, $grupo, $genero, $tecnica, $nacimiento]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=editado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>