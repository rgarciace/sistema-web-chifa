<?php 
    session_start();
    include('conexion.php');
    if (isset($_POST['mesa'])){
        $id_mesa = $_POST['mesa'];
        $fecha_reserva = $_POST['fecha'];
        $nombre_cliente = $_POST['nombre'];
        $dni_cliente = $_POST['dni'];
        $horas = $_POST['horas'];
        $cantidad = $_POST['comensales'];
        $celular = $_POST['celular'];
        $solicitud = "INSERT INTO reserva (id_mesa, fecha_reserva, cantidad_horas_reseva, dni_cliente, nombre_cliente, celular, cantidad_comesales)
                    VALUES ($id_mesa, '$fecha_reserva', $horas, '$dni_cliente', '$nombre_cliente', '$celular',$cantidad)";
        $resultado = mysqli_query($conexion, $solicitud);
        $solicitud2 = "UPDATE mesa
                        SET estado_mesa = 2
                        WHERE id_mesa = $id_mesa"; 
        $resultado2 = mysqli_query($conexion, $solicitud2);       
        header("location:opAdmReserva.php");
    }
?>