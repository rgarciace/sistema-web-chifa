<?php 
    session_start();
    include('conexion.php');
        if (isset($_POST['nombre_plato'])){
            $nombre_plato = $_POST['nombre_plato'];
            $costo = $_POST['precio'];
            $tipo = $_POST['tipo_plato'];
            $disponible = $_POST['estado_plato'];
            $discontinuo = $_POST['estado_eliminado_plato'];
            $solicitud = "INSERT INTO plato (nombre_plato, costo,es_plato,estado_plato,estado_eliminado_plato)
                            VALUES ('$nombre_plato',$costo,$tipo,$disponible,$discontinuo)";
            
            $resultado = mysqli_query($conexion, $solicitud);
            header("location:opGesPlatillo.php");
        }
?>