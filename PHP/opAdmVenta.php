<?php
    session_start();
    include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Venta</title>
    <link rel="stylesheet" href="../CSS/opAdmPromocion.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
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
            <h2>ADMINISTRAR VENTA</h2>
        </div>
        <div class="contenido">
            <div class="contenido-tabla">
                <table class="lista" border="1">
                <tbody>
                        <tr class="encabezado-tabla">
                            <td colspan=4 style="text-align:center;">Listado de Ventas</td>
                        </tr>
                        <?php 
                            $solicitud = "SELECT C.id_comprobante, DVP.id_mesa, SUM(DVP.cantidad_plato*DVP.costo_plato) AS monto_total FROM Comprobante AS C 
                                INNER JOIN det_venta_plato AS DVP 
                                ON C.id_comprobante = DVP.id_comprobante 
                                WHERE C.estado_comprobante='0'
                                GROUP BY C.id_comprobante";
                            $resultado = mysqli_query($conexion, $solicitud);
                            foreach($resultado as $ventas)
                            { 
                        ?>
                        <tr>
                            <td>ID: <?php echo $ventas['id_comprobante']?></td>
                            <td>Nro. Mesa:<?php echo $ventas['id_mesa']?></td>
                            <td>Monto Total: <?php echo ($ventas['monto_total'])?></td>
                            <td>
                                <form action="opAdmVenta2.php" method="POST">
                                    <input type="hidden" name="id_comprobante" value='<?php echo $ventas['id_comprobante']?>'>
                                    <button>💲</button>
                                </form>
                            </td>
                        </tr>
                        <?php
                            }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
</body>
</html>
    </main>
</body>
</html>