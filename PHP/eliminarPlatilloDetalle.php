<?php
    session_start();
    include('conexion.php');
    if(isset($_GET['idPlato'])){
        $idPlato = $_GET['idPlato'];
        $idComp=$_GET['idComp'];
        $nroMesa=$_GET['nroMesa'];
        $mesero=$_GET['nombre'];
        $solicitud = "DELETE FROM det_venta_plato  WHERE id_vent_plat='$idPlato'";
        $resultado = mysqli_query($conexion, $solicitud);
        
        header("location:opGesPedido-Actualizar.php?idComp=".$idComp."&nroMesa=".$nroMesa."&nombre=".$mesero." ");
       
    }
?>