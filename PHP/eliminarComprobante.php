<?php
//UPDATE `det_venta_plato` SET `id_comprobante` = null WHERE `det_venta_plato`.`id_vent_plat` = 1
    session_start();
    include('conexion.php');
    if(isset($_GET['idComp'])){
        $idComp = $_GET['idComp'];
        $solicitud = "DELETE FROM comprobante  WHERE id_comprobante=$idComp";
        $resultado = mysqli_query($conexion, $solicitud);

        $solicitud = "SELECT * FROM det_venta_plato where id_comprobante=$idComp";
        $resultado = mysqli_query($conexion, $solicitud);
        
        while ($fila=mysqli_fetch_array($resultado)) {
            
            $solicitud2 = "DELETE FROM det_venta_plato WHERE id_vent_plat=".$fila['id_vent_plat']." ";
            
            $resultado2 = mysqli_query($conexion, $solicitud2);


            //echo $resultado2;
        }
        header("location:opGesPedido.php");
    }
?>