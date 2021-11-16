<?php 
    session_start();
    include('conexion.php');
        $id_mesa = $_POST['id_mesa'];
        $id_usuario=$_POST['id_usuario'];
        //Id del dia de la caja
        $id_caja_dia = $_SESSION['id_fecha'];

        $solicitud2="SELECT id_comprobante FROM comprobante WHERE id_usuario= $id_usuario AND id_mesa=$id_mesa";
        $resultado2 = mysqli_query($conexion, $solicitud2);
        $fila2=mysqli_fetch_array($resultado2);
        if($fila2==null){
            $solicitud="INSERT INTO comprobante(id_caja_dia,id_usuario,id_mesa)
                    VALUES ($id_caja_dia,$id_usuario,$id_mesa)";
            $resultado = mysqli_query($conexion, $solicitud);
        }
        
        $hora=new DateTime('now',new DateTimeZone('America/Lima'));
        $hora = $hora->format('H:i a');

        $solicitud="SELECT id_comprobante FROM comprobante WHERE id_usuario= $id_usuario AND id_mesa=$id_mesa";
        
        $resultado = mysqli_query($conexion, $solicitud);
        $fila=mysqli_fetch_array($resultado);
        $comprobante=$fila['id_comprobante'];
        
        $solicitud = "SELECT * FROM det_venta_plato where id_usuario = $id_usuario AND id_mesa=$id_mesa";
        $resultado = mysqli_query($conexion, $solicitud);
        
        while ($fila=mysqli_fetch_array($resultado)) {
            
            $solicitud2 = "UPDATE det_venta_plato SET id_comprobante=$comprobante,hora_atencion='$hora' WHERE id_vent_plat=".$fila['id_vent_plat']." ";
            
            $resultado2 = mysqli_query($conexion, $solicitud2);


            //echo $resultado2;
        }
        
        header("location:opGesPedido.php");
    
?>