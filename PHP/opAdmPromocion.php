<?php
    session_start();
    include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Promoción</title>
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
            <h2>ADMINISTRAR PROMOCION</h2>
        </div>
        <div class="contenido">
            <div class="contenido-fila1">
                
                <div>
                    <form class="detalle" action="agregarPromo.php" method="POST">
                        <div class="contenedor-datos">
                            <div class="datos-columna1">
                                <div class="dato">
                                    <label for="nombreDescuento">Nombre</label>
                                    <input name="nombre" type="text" required>
                                </div>
                            </div>
                            <div class="datos-columna2">
                                <div class="dato">
                                    <label for="nombreDescuento">Porcentaje</label>
                                    <input name="porcentaje" type="number" min="5" max="90" required>
                                </div>
                            </div>
                            <div class="datos-columna3">
                                <!-- <div class="divboton">
                                    <form action="">
                                        <input type="submit" value=Aceptar"></input>
                                    </form>
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
                    <table class="lista" border=none>
                        <tbody>
                            <?php
                            echo '<tr class="encabezado-tabla"  style="text-align:center;">
                            <td  colspan="4">LISTADO DE PROMOCIONES</td>
                            </tr>';
                                $solicitud = "SELECT * FROM descuento";
                                    
                                $resultado = mysqli_query($conexion, $solicitud);
                                foreach ($resultado as $Aux){
                                    echo '<tr>';
                                    echo '  <td>ID: '.$Aux["id_descuento"].'</td>';
                                    echo '  <td>Nombre: '.$Aux["nombre_descuento"].'</td>';
                                    echo '  <td>Porcentaje: '.$Aux["porcenta_descuento"].'%</td>';
                                    
                                    
                                    echo '  <td>';
                                    echo ' <form action="eliminarPromo.php" method="POST">';
                                    echo '   <input type="hidden" name="id_descuento" value='.$Aux['id_descuento'].'>';
                                    echo '   <button>❌</button>';
                                    echo ' </form>';
                                    echo '  </td>';
                                    echo '</tr>';
                                }
                                
                            ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </main>
</body>
</html>