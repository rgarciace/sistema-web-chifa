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
    <title>Gestionar Platillo</title>
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
            <h2>GESTIONAR PLATILLO</h2>
        </div>
        <div class="contenido">
            <div class="contenido-fila1">
                <div>
                    <form class="detalle" action="agregarPlato.php" method="POST">
                        <div class="contenedor-datos">
                            <div class="datos-columna1">
                                <div class="dato">
                                    <label for="listaPlatillos">Platillos</label>
                                    <select name="tipo_plato" id="listaPlatillos">
                                       <option value='0'>Bebida</option>';
                                       <option value='1'>Comida</option>';
                                    </select>
                                </div>
                                <div class="dato">
                                    <label for="">Nombre</label>    
                                    <input name="nombre_plato" type="text">
                                </div>
                            </div>
                            <div class="datos-columna2">
                                <div class="dato">
                                    <label for="">Costo</label>    
                                    <input name="precio" type="number" step=".01">
                                    <input name="estado_plato" type="hidden" value="1">
                                    <input name="estado_eliminado_plato" type="hidden" value="1">
                                </div>
                            </div>
                            <div class="datos-columna3">
                                <!-- <div class="boton-agregar">
                                    <button value="" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.393 7.5l-5.643 5.784-2.644-2.506-1.856 1.858 4.5 4.364 7.5-7.643-1.857-1.857z"/></svg></button>
                                </div> -->
                            </div>
                            
                        </div>
                        <div class="listado">
                            <div class=divboton>
                                <input type="submit" value="Aceptar"></input>
                            </div>
                        </div>
                    </form>
                    
                </div>
            </div>
            <div class="contenido-fila2">
                <div class="divtabla">
                        <table class="lista" border=1>
                            <tbody>
                            <tr class="encabezado-tabla" style="text-align:center;">
                                            <td colspan="8" >LISTADO DE PLATILLOS</td>
                                        </tr>
                                <?php
                                    $solicitud = "SELECT * FROM plato";
                                    $array=array('Bebida','Comida');
                                    $resultado = mysqli_query($conexion, $solicitud);
                                   
                                    foreach ($resultado as $Aux){
                                        echo '<tr>';
                                        echo '  <td>Nombre: '.$Aux["nombre_plato"].'</td>';
                                        echo '  <td>Costo: '.$Aux["costo"].'</td>';
                                        echo '  <td>Tipo: '.$array[$Aux["es_plato"]].'</td>';
                                        echo '  <td>Estado: '.(($Aux["estado_plato"]==1)? "Disponible":"Agotado").'</td>';
    
                                        
                                        echo '  <td>';
                                        echo ' <form action="eliminarPlato.php" method="POST">';
                                        echo '   <input type="hidden" name="id_plato" value='.$Aux['id_plato'].'>';
                                        echo '   <button>
                                        ???</button>';
                                        echo ' </form>';
                                        echo '  </td>';
                                        
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo ' <form action="actualizarEstadoPlato.php" method="POST">';
                                        echo '   <input type="hidden" name="nameEstado" value=1>';
                                        echo '   <input type="hidden" name="id_plato" value='.$Aux['id_plato'].'>';
                                        echo '   <button>
                                        ??????</button>';
                                        echo ' </form>';
                                        echo '  </td>';
                                        echo '  <td>';
                                        echo ' <form action="actualizarEstadoPlato.php" method="POST">';
                                        echo '   <input type="hidden" name="id_plato" value='.$Aux['id_plato'].'>';
                                        echo '   <input type="hidden" name="nameEstado" value=0>';
                                        echo '   <button>
                                        ???</button>';
                                        echo ' </form>';
                                        echo '</tr>';
                                    }
                                    
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>