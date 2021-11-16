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
                <?php
                    $solicitud = "SELECT *FROM det_venta_plato";
                    $resultado = mysqli_query($conexion, $solicitud);
                    $costoTotal = "SELECT SUM(det_venta_platocantidad_plato*costo_plato) FROM det_venta_plato";
                    foreach($resultado as $Aux){
                         
                ?>

                <tr>
                    <td><?php echo 'Nro Venta: '.$Aux['id_comprobante']?></td>
                    <td><?php echo 'Mesa: '.$Aux['id_mesa']?></td>
                    <td><?php echo 'Costo Total: '.$array[$mesas['estado_mesa']]?></td> 
                </tr>

                <?php
                    }
                ?>
                <p>Total: <?php echo "" ?></p>
            </div>
        </div>
    </main>
</body> 
</html>