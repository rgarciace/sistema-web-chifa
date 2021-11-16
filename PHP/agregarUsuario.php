<?php 
    session_start();
    include('conexion.php');
        if (isset($_POST['nombreUsario'])){
            $id_tipo = $_POST['Usuarios'];
            $nombre_usuario = $_POST['nombreUsario'];
            $dni_usuario = $_POST['dniUsuario'];
            $usuario = $_POST['usuario'];
            $contraseña_usuario = $_POST['contraseña'];
            $solicitud = "INSERT INTO Usuario (id_tipo_usuario,dni_usuario, nombre_completo,nombre_usuario,contra_usuario)
                            VALUES ('$id_tipo', '$dni_usuario','$nombre_usuario','$usuario','$contraseña_usuario')";
            $resultado = mysqli_query($conexion, $solicitud);
            header("location:opGesUsuario.php");
        }
?>