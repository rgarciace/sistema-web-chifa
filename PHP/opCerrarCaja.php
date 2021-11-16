<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/opAdmPromocion.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <title>Cerra Caja</title>
</head>
<body>
<?php 
    
        switch($_SESSION['tipo_usuario']){
            case 'Administrador del Sistema':
                include("headerAdmSistema.php");
            break;
            case 'Gerente':
                include("headerGerente.php");
            break;
            case 'Administrador':
                include("headerAdministrador.php");
            break;
            case 'Maitre':
                include("headerMaitre.php");
            break;
            case 'Cocinero':
                include("headerCocinero.php");
            break;
            case 'Camarero':
                include("headerCamarero.php");
            break;
            default:
                echo"Error 404";
            break; 
        }

    ?>
<?php 
    include('conexion.php'); 
    if($_SESSION['caja_activa'] != -1){
        $id_caja = $_SESSION['id_fecha'];
         $consulta = "SELECT sum(subTotal) as TOTAL FROM caja_x_dia INNER JOIN (SELECT (det_venta_plato.cantidad_plato * det_venta_plato.costo_plato) as subTotal,comprobante.id_comprobante,comprobante.id_caja_dia FROM det_venta_plato INNER JOIN comprobante ON comprobante.id_comprobante = det_venta_plato.id_comprobante 
         WHERE comprobante.estado_comprobante = 1 AND det_venta_plato.esta_det_venta = 1)  as T ON T.id_caja_dia = caja_x_dia.id_caja_dia where caja_x_dia.id_caja_dia = $id_caja
         GROUP BY T.id_caja_dia";
         $resultado=mysqli_query($conexion,$consulta);
         $fila=mysqli_fetch_array($resultado);
        ?>
<main>
        <div class="contenido-unico">
            <form action="cerrar_caja.php" method="POST">
                <div class="contenido-datos">
                    <h1>Las ventas totales el día de hoy ascienden a: <?php echo $fila['TOTAL']; ?> </h1>
                </div>
                <div class="divboton">
                    <input type="submit" value ="Cerrar la caja">
                </div>
            </form>
        </div>
            
    
    <?php
    
    } else{
        echo "<div class='contenido-unico'>
                <form action='cerrar_caja.php' method='POST'>
                    <div class='contenido-datos'>
                        <h1>No hay ninguna caja abierta, por lo tanto usted no puede cerrar la caja.</h1> 
                    </div>
                    <div class='divboton'>
                        <input type='submit' value ='Cerrar la caja'>
                 </div>
                </form>
            </div>";
    } ?>
    </main>
</body>
</html>