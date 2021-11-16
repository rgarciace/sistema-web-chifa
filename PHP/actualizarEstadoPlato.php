<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['id_plato'])){
        $estado = $_POST['nameEstado'];
        $id_plato = $_POST['id_plato'];
        $solicitud = "UPDATE plato set estado_plato=$estado  WHERE plato.id_plato='$id_plato'";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opGesPlatillo.php");
    }
?>