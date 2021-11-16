<?php 
    session_start();
    include('conexion.php'); 
    $idCaja = $_SESSION['id_fecha'];
    $consulta = "UPDATE caja_x_dia SET 
    estado_caja = 0
    WHERE id_caja_dia = $idCaja
    ";
    $resultado=mysqli_query($conexion,$consulta);
    $_SESSION['caja_activa'] = -1;
    header('location: home.php');

?>