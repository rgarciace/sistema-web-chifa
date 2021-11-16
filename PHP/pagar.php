<?php
    session_start();
    include('conexion.php');
    if (isset($_POST['descuentos'])){
        
        $id_comprobante = $_POST['id_comprobante'];
        $descuento = $_POST['descuentos'];

        $solicitud = "UPDATE det_venta_plato set esta_det_venta = 1 WHERE id_comprobante=$id_comprobante";
        $resultado = mysqli_query($conexion, $solicitud);
        
        $solicitud2 = "UPDATE comprobante set estado_comprobante = 1, id_descuento = $descuento WHERE id_comprobante=$id_comprobante";
        $resultado2 = mysqli_query($conexion, $solicitud2);
                
        header("location:opAdmVenta.php");
    }
?>