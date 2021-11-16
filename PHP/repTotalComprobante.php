<?php 
    include("conexion.php");
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSS/opAdmPromocion.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    <title>Gestionar Comprobante</title>
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
    <main>
        <div class="cabecera">
            <a class="volver" href="home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>
            </a>
            <h2>GESTIONAR COMPROBANTE</h2>
        </div>
        <div class="contenido">
            <div class="contenido-unico">
            <table class="lista" border=1>
                            <tbody>
                            <tr class="encabezado-tabla" style="text-align:center;">
                                            <td colspan="8" >LISTADO DE COMPROBANTES</td>
                                        </tr>
                                <?php
                                    $solicitud = "SELECT *  FROM det_venta_plato 
                                                INNER JOIN mesa on mesa.id_mesa = det_venta_plato.id_mesa
                                                INNER JOIN comprobante on comprobante.id_comprobante = det_venta_plato.id_comprobante
                                                GROUP BY det_venta_plato.id_comprobante";
                                    $resultado = mysqli_query($conexion, $solicitud);
                                    while ($Aux=mysqli_fetch_array($resultado)){
                                        $consulta = "SELECT SUM(cantidad_plato*costo_plato) as MontoTotal FROM det_venta_plato WHERE id_comprobante=".$Aux["id_comprobante"];
                                        $resultado2 = mysqli_query($conexion, $consulta);
                                        $fila2 = mysqli_fetch_array($resultado2);
                                        $monto_total = $fila2['MontoTotal'];
                                    
                                       
                                        echo '<tr>';
                                        echo '  <td>ID: '.$Aux["id_comprobante"].'</td>';
                                        echo '  <td>Nro Mesa: '.$Aux["id_mesa"].'</td>';
                                        echo '  <td>Estado: '.(($Aux["estado_comprobante"]==1)? "Cancelado":"Por Cancelar").'</td>';
                                        echo '  <td>Monto Total: '.$monto_total.'</td>';
                                           
                                    }
                                     
                                ?>
                            </tbody>
                        </table>
            </div>
