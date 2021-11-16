<?php
    session_start();
    include('conexion.php'); 
    if($_SESSION['caja_activa'] !=  -1){
        header('location:dia_activo.php');
    }else{
        
        $fecha = $_POST['fecha'];
        $consulta = "INSERT INTO caja_x_dia(fecha_caja_dia) VALUE('$fecha')";
        $resultado = mysqli_query($conexion, $consulta);
        $consulta = "SELECT * FROM caja_x_dia WHERE estado_caja = 1";
        $resultado = mysqli_query($conexion,$consulta);
        $fila2=mysqli_fetch_array($resultado);
        $_SESSION['caja_activa'] = $fila2['estado_caja'];   
        $_SESSION['id_fecha'] = $fila2['id_caja_dia']; 
        header('location:cajaAbierta.php');
    }
?>