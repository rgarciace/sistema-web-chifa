<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['id_mesa'])){
        $estado = $_POST['nameEstado'];
        $id_mesa = $_POST['id_mesa'];
        $solicitud = "UPDATE mesa set estado_mesa=$estado  WHERE mesa.id_mesa='$id_mesa'";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opGesMesa.php");
    }
?>