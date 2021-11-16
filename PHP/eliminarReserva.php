<?php 
    session_start();
    include('conexion.php');
    if (isset($_POST['id_reserva'])){
        $id_reserva = $_POST['id_reserva'];
        $solicitud = "DELETE FROM reserva WHERE reserva.id_reserva=$id_reserva";
        $resultado = mysqli_query($conexion, $solicitud);
        echo $solicitud;header("location:opAdmReserva.php");
    }
?>