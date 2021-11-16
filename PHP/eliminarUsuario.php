<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['dniUsuario'])){
        $dniUsuario = $_POST['dniUsuario'];
        $solicitud = "DELETE FROM usuario WHERE usuario.dni_usuario='$dniUsuario'";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opGesUsuario.php");
    }
?>