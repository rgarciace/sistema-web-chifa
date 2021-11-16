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
    <title>Modificar Pedido</title>
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
            <a class="volver" href="opGesPedido.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>
            </a>
            <h2>MODIFICAR PEDIDO</h2>
        </div>
        <div class="contenido">
            <?php 
               if(isset($_GET['idComp'])){
                   $idComp=$_GET['idComp'];
                   $nroMesa=$_GET['nroMesa'];
                   $mesero=$_GET['nombre'];
                    echo '<div class="contenido-fila1">
                    <div class="datos">
                    <p>Camarero: <span>'.$mesero.'</span></p>
                    <p>Mesa: <span>'.$nroMesa.'</span></p>
                    </div>
                    </div>';
               }
               if(isset($_POST['cantidad1'])){
                $cantidad=$_POST['cantidad1'];
                $id_venta=$_POST['idVenta'];
                $solicitud3="UPDATE det_venta_plato SET cantidad_plato=$cantidad WHERE id_vent_plat=$id_venta";
                $resultado3 = mysqli_query($conexion, $solicitud3);
                }
            ?>
           
            <div class="contenido-fila2">
                <div class="divtabla">
                        <table class="lista" border=1>
                            <tbody>
                            <tr class="encabezado-tabla" style="text-align:center;">
                                            <td colspan="6" >DETALLES DEL PEDIDO</td>
                                        </tr>
                                <?php
                                    $solicitud = "SELECT * FROM det_venta_plato where id_comprobante=$idComp";
                                    $array=array('Bebida','Comida');
                                    $resultado = mysqli_query($conexion, $solicitud);
                                   
                                    foreach ($resultado as $Aux){
                                        $solicitud2 = "SELECT nombre_plato,es_plato FROM plato where id_plato = ".$Aux['id_plato']." ";
                                        $resultado2 = mysqli_query($conexion, $solicitud2);
                                        $fila2=mysqli_fetch_array($resultado2);
                                        $nombrePlato = $fila2['nombre_plato'];
                                        $plato=$fila2['es_plato'];
                                        echo '<tr>';
                                        
                                        echo '  <td>Platillo: '.$nombrePlato.'</td>';
                                        echo '  <td>Tipo: '.$array[$plato].'</td>';
                                        echo '  <td>Cant.: '.$Aux['cantidad_plato'].'</td>';
                                        echo '  <td>Costo: '.$Aux['costo_plato'].'</td>';

                                        echo '  <td>';
                                        echo '  <a href="eliminarPlatilloDetalle.php?idPlato='.$Aux['id_vent_plat'].'&idComp='.$idComp.'&nroMesa='.$nroMesa.'&nombre='.$mesero.'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 9v4.501c-.748.313-1.424.765-2 1.319v-5.82c0-.552.447-1 1-1s1 .448 1 1zm-4 0v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1s1 .448 1 1zm1.82 15h-11.82v-18h2v16h8.502c.312.749.765 1.424 1.318 2zm-6.82-16c.553 0 1 .448 1 1v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1zm14-4h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711v2zm-1 2v7.182c-.482-.115-.983-.182-1.5-.182l-.5.025v-7.025h2zm3 13.5c0 2.485-2.017 4.5-4.5 4.5s-4.5-2.015-4.5-4.5 2.017-4.5 4.5-4.5 4.5 2.015 4.5 4.5zm-3.086-2.122l-1.414 1.414-1.414-1.414-.707.708 1.414 1.414-1.414 1.414.707.708 1.414-1.414 1.414 1.414.708-.708-1.414-1.414 1.414-1.414-.708-.708z"/></svg></a>';
                                        echo '  </td>';
                                        
                                        
                                        echo '  <td>';
                                        echo ' <form action="opGesPedido-Actualizar.php?idComp='.$idComp.'&nroMesa='.$nroMesa.'&nombre='.$mesero.'" method="POST">';
                                        echo '   <input type="hidden" name="nameEstado" value=1>';
                                        echo '   <input type="hidden" name="id_plato1" value='.$Aux['id_plato'].'>';
                                        echo '   <input type="hidden" name="id_venta" value='.$Aux['id_vent_plat'].'>';
                                        echo '   <input type="hidden" name="cantidad" value='.$Aux['cantidad_plato'].'>';
                                        echo '   <button>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.979 3.055c4.508.489 8.021 4.306 8.021 8.945.001 2.698-1.194 5.113-3.075 6.763l-1.633-1.245c1.645-1.282 2.709-3.276 2.708-5.518 0-3.527-2.624-6.445-6.021-6.923v2.923l-5.25-4 5.25-4v3.055zm-1.979 15.865c-3.387-.486-6-3.401-6.001-6.92 0-2.237 1.061-4.228 2.697-5.509l-1.631-1.245c-1.876 1.65-3.066 4.061-3.065 6.754-.001 4.632 3.502 8.444 8 8.942v3.058l5.25-4-5.25-4v2.92z"/></svg></button>';
                                        echo ' </form>';
                                        echo '  </td>';
                                        
                                        echo '</tr>';
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
                <?php
                    
                   if(isset($_POST['id_plato1'])){
                    $solicitud2 = "SELECT nombre_plato FROM plato where id_plato = ".$_POST['id_plato1']." ";
                    $resultado2 = mysqli_query($conexion, $solicitud2);
                    $fila2=mysqli_fetch_array($resultado2);
                    $nombrePlato = $fila2['nombre_plato'];
                    $id_venta=$_POST['id_venta'];
                    echo '<div class="contenido-fila3">
                    <div>';
                    echo   '<form action="opGesPedido-Actualizar.php?idComp='.$idComp.'&nroMesa='.$nroMesa.'&nombre='.$mesero.'" method="POST">';
                    
                    echo        '<div class="contenido-datos">';
                    echo            '<div class="dato">';
                    echo                '<label for="nombre">Nombre Platillo </label>';
                    echo                '<input name="nombre" id="nombre" type="text" value="'.$nombrePlato.'" readonly>';
                    echo            '</div>';
                    echo            '<div class="dato">';
                    echo                '<label for="cantidad1">Cant.</label>';
                    echo                '<input name="cantidad1" id="nombre" type="number" min=1>';
                    echo                '<input type="hidden" name="idVenta" value='.$id_venta.'>';
                    echo            '</div>';
                    echo        '</div>';
                    echo         '<div class="divboton">';
                    echo            '<input type="submit" value="Actualizar">';
                    echo        '</div>';
                    echo    '</form>';
                    echo    '</div>';
                    echo  '</div>';
                   }
                    
                ?>
            </div>        
        </div>
    </main>
</body>
</html>