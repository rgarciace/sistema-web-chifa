<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['id_plato'])){
        $id_plato = $_POST['id_plato'];
        $solicitud = "UPDATE plato SET estado_eliminado_plato=0, estado_plato=0 WHERE plato.id_plato='$id_plato'";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opGesPlatillo.php");
    }
?>