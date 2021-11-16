<?php
    session_start();
    include('conexion.php');
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Reserva</title>
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
            <h2>ADMINISTRAR RESERVA</h2>
        </div>
        <div class="contenido">
            <div class="contenido-fila1">
                <div>
                    <form class="detalle" action="agregarReserva.php" method="POST">
                        <div class="contenedor-datos">
                            <div class="datos-columna1">
                                <div class="dato">
                                    <label for="mesa">Mesa</label>
                                    <select name="mesa" id="listaMesas">
                                        <?php
                                            $solicitud = "SELECT * FROM mesa";
                                            $resultado = mysqli_query($conexion, $solicitud);
                                            foreach ($resultado as $Aux){
                                                echo '<option value='.$Aux["id_mesa"].' selected >'.$Aux["nro_mesa"].'</option>';
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="dato">
                                    <label for="dni">DNI</label>
                                    <input name="dni" type="text">
                                </div>
                                <div class="dato">
                                    <label for="nombre">Nombre</label>
                                    <input name="nombre" type="text">
                                </div>
                            </div>
                            <div class="datos-columna2">
                                <div class="dato">
                                    <label for="fecha">Fecha</label>
                                    <input name="fecha" type="date">
                                </div>
                                <div class="dato">
                                    <label for="horas">Horas</label>
                                    <input name="horas" type="number">
                                </div>
                                <div class="dato">
                                    <label for="comensales">Comensales</label>
                                    <input name="comensales" type="number">
                                </div>
                                <div class="dato">
                                    <label for="celular">Celular</label>
                                    <input name="celular" type="tel">
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
                    <table class="lista" border=1>
                        <tbody>
                            <?php
                                echo '<tr class="encabezado-tabla"  style="text-align:center;">
                                <td  colspan="5">LISTADO DE RESERVAS</td>
                                </tr>';
                                $solicitud = "SELECT * FROM reserva";
                                    
                                $resultado = mysqli_query($conexion, $solicitud);
                                foreach ($resultado as $Aux){
                                    echo '<tr>';
                                    echo '  <td>ID: '.$Aux["id_reserva"].'</td>';
                                    echo '  <td>Fecha: '.$Aux["fecha_reserva"].'</td>';
                                    echo '  <td>Cliente: '.$Aux["nombre_cliente"].'</td>';
                                    echo '  <td>Celular: '.$Aux["celular"].'</td>';
                                    echo '  <td>';
                                    echo ' <form action="eliminarReserva.php" method="POST">';
                                    echo '   <input type="hidden" name="id_reserva" value='.$Aux['id_reserva'].'>';
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