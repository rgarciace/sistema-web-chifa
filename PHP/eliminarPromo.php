<?php
    session_start();
    include('conexion.php');
    if(isset($_POST['id_descuento'])){
        $id_descuento = $_POST['id_descuento'];
        $solicitud = 'DELETE FROM descuento WHERE descuento.id_descuento='.$id_descuento;
        $resultado = mysqli_query($conexion, $solicitud);
        header("location:opAdmPromocion.php");
    }
?>