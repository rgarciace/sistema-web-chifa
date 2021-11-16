<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['id_mesa'])){
        $id_mesa = $_POST['id_mesa'];
        $solicitud = "DELETE FROM mesa  WHERE mesa.id_mesa='$id_mesa'";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opGesMesa.php");
    }
?>