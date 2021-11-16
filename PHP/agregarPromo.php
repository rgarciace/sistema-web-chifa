<?php 
session_start();
include('conexion.php');
    if (isset($_POST['nombre'])){
        $nombre_Desc = $_POST['nombre'];
        $porcentaje = $_POST['porcentaje'];
        $solicitud = "INSERT INTO descuento (nombre_descuento, porcenta_descuento)
                        VALUES ('$nombre_Desc', $porcentaje)";
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opAdmPromocion.php");
    }
?>