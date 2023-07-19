<?php
    //print_r($_POST);
    if(empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtGrado"]) || empty($_POST["txtGrupo"]) || empty($_POST["txtGenero"]) || empty($_POST["txtTecnica"]) || empty($_POST["txtNacimiento"])){
        header('Location: index.php?mensaje=falta');
        exit();
    }

    include_once 'model/conexion.php';
    $nombre = $_POST["txtNombre"];
    $apellido = $_POST["txtApellido"];
    $grado = $_POST["txtGrado"];
    $grupo = $_POST["txtGrupo"];
    $genero = $_POST["txtGenero"];
    $tecnica = $_POST["txtTecnica"];
    $nacimiento = $_POST["txtNacimiento"];
    
    $sentencia = $bd->prepare("INSERT INTO estudiante(nombre,apellido,grado,grupo,genero,tecnica,nacimiento) VALUES (?,?,?,?,?,?,?);");
    $resultado = $sentencia->execute([$nombre,$apellido,$grado,$grupo,$genero,$tecnica,$nacimiento]);

    if ($resultado === TRUE) {
        header('Location: index.php?mensaje=registrado');
    } else {
        header('Location: index.php?mensaje=error');
        exit();
    }
    
?>