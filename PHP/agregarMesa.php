<?php 
    session_start();
    include('conexion.php');
        if (isset($_POST['nro_mesa'])){
            $nro_mesa = $_POST['nro_mesa'];
            $estado_mesa = $_POST['estado_mesa'];
            $solicitud = "INSERT INTO mesa (nro_mesa, estado_mesa)
                            VALUES ('$nro_mesa',$estado_mesa)";
            
            $resultado = mysqli_query($conexion, $solicitud);
            header("location:opGesMesa.php");
        }
?>