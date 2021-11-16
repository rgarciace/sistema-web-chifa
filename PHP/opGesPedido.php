<?php
    session_start();
    include('conexion.php'); 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestionar Pedido</title>
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
            <h2>GESTIONAR PEDIDO</h2>
        </div>
        <div class="contenido">
            <div class="contenido-fila1">
                <div >
                    <form class="detalle" action="opGesPedido.php#guardar" method="POST">
                        <div class="contenedor-datos">
                            <?php
                                
                            ?>
                            <div class="datos-columna1">
                            
                                <div class="dato">
                                    <label for="listaCamareros">Camarero</label>
                                    <select name="Camareros" id="listaCamareros">
                                        <?php
                                        $solicitud = "SELECT * FROM Usuario WHERE id_tipo_usuario = 6";
                                        
                                        $resultado = mysqli_query($conexion, $solicitud);
                                        foreach ($resultado as $Aux){
                                            if(isset($_POST['Platillos'])){
                                                $id_usuario=$_POST['Camareros'];
                                                if($id_usuario==$Aux["dni_usuario"]){
                                                    echo '<option value='.$Aux["dni_usuario"].' selected>'.$Aux["nombre_completo"].'</option>'; 
                                                    break;
                                                }
                                            }else{
                                                //Mostrar los camareros libres que atienden en ese momento
                                                echo '<option value='.$Aux["dni_usuario"].'>'.$Aux["nombre_completo"].'</option>'; 
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="dato">
                                        <label for="listaPlatillos">Platillo</label>
                                        <select name="Platillos" id="listarPlatillos">
                                            <?php
                                            $solicitud = "SELECT * FROM plato WHERE estado_plato = 1 AND estado_eliminado_plato = 1";
                                            //MUESTRA LOS PLATILLOS
                                            $resultado = mysqli_query($conexion, $solicitud);
                                            foreach ($resultado as $Aux){
                                                echo '<option value='.$Aux["id_plato"].'>'.$Aux["nombre_plato"].'</option>';
                                            }
                                            ?>
                                        </select>
                                </div>
                            </div>
                            <div class="datos-columna2">
                                <div class="dato">
                                    <label for="listaMesas">Mesa</label>
                                    <select name="Mesas" id="listaMesas">
                                        <?php
                                            $solicitud = "SELECT mesa.* FROM mesa 
                                            where mesa.estado_mesa=1";
                                            $resultado = mysqli_query($conexion, $solicitud);
                                            foreach ($resultado as $Aux){
                                                if(isset($_POST['Platillos'])){
                                                    $id_mesa=$_POST['Mesas'];
                                                    if($id_mesa==$Aux["id_mesa"]){
                                                        echo '<option value='.$Aux["id_mesa"].' selected >'.$Aux["nro_mesa"].'</option>';
                                                        break;
                                                    }
                                                }else{
                                                    echo '<option value='.$Aux["id_mesa"].' >'.$Aux["nro_mesa"].'</option>';
                                                }
                                                
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="dato">
                                    <label for="cantidad">Cant.</label>
                                    <input type="number" name="cantidad" id="cantidad" min="1" value="1">
                                </div>
                            </div>
                            <div class="datos-columna3">
                                <div class="boton-agregar">
                                    <button value="" type="submit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm4.393 7.5l-5.643 5.784-2.644-2.506-1.856 1.858 4.5 4.364 7.5-7.643-1.857-1.857z"/></svg></button>
                                </div>
                            </div>
                            
                        </div>
                    </form>
                    <div class="listado">
                        <div id="guardar" class="divtabla">
                            <table class="lista" border='1'>
                                <tbody>
                                    <table name="mitabla">
                                    <?php
                                        if(isset($_POST['Platillos'])){
                                            if(isset($_POST['Platillos'])){
                                                $id_camarero = $_POST['Camareros']; 
                                                $id_plato=$_POST['Platillos'];
                                                $cantidad=$_POST['cantidad'];
                                                $id_mesa = $_POST['Mesas'];
                                                $solicitud = "SELECT * FROM plato where id_plato = $id_plato";
                                                $resultado = mysqli_query($conexion, $solicitud);
                                                $fila=mysqli_fetch_array($resultado);
                                                $costo = $fila['costo'];
                                                $solicitud = "INSERT INTO det_venta_plato(id_mesa,id_usuario,id_plato,cantidad_plato,costo_plato)
                                                VALUES($id_mesa,$id_camarero,$id_plato,$cantidad,$costo)";  
                                                $resultado = mysqli_query($conexion, $solicitud);
                                            }

                                            $ID = 0;
                                            $id_camarero = $_POST['Camareros']; 
                                            $id_mesa = $_POST['Mesas'];
                                            $solicitud = "SELECT * FROM det_venta_plato where id_usuario = $id_camarero AND id_mesa=$id_mesa";
                                            $resultado = mysqli_query($conexion, $solicitud);
                                                while ($fila=mysqli_fetch_array($resultado)) {
                                                    $solicitud2 = "SELECT nombre_plato FROM plato where id_plato = ".$fila['id_plato']." ";
                                                    $resultado2 = mysqli_query($conexion, $solicitud2);
                                                    $fila2=mysqli_fetch_array($resultado2);
                                                    $nombrePlato = $fila2['nombre_plato'];
                                                    echo '<tr>
                                                        <td id="det1">Mesa: '.$fila['id_mesa'].'</td> 
                                                        <td class="celda-larga">Platillo: '.$nombrePlato.'</td>
                                                        <td>Cant.: '.$fila['cantidad_plato'].'</td>
                                                        
                                                    </tr>';
                                                    $solicitud2="";
                                                    //<td><a href="eliminarPlatilloDetalle.php?idPlato='.$fila['id_vent_plat'].'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 9v4.501c-.748.313-1.424.765-2 1.319v-5.82c0-.552.447-1 1-1s1 .448 1 1zm-4 0v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1s1 .448 1 1zm1.82 15h-11.82v-18h2v16h8.502c.312.749.765 1.424 1.318 2zm-6.82-16c.553 0 1 .448 1 1v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1zm14-4h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711v2zm-1 2v7.182c-.482-.115-.983-.182-1.5-.182l-.5.025v-7.025h2zm3 13.5c0 2.485-2.017 4.5-4.5 4.5s-4.5-2.015-4.5-4.5 2.017-4.5 4.5-4.5 4.5 2.015 4.5 4.5zm-3.086-2.122l-1.414 1.414-1.414-1.414-.707.708 1.414 1.414-1.414 1.414.707.708 1.414-1.414 1.414 1.414.708-.708-1.414-1.414 1.414-1.414-.708-.708z"/></svg></a></td>
                                                }
                                        }             
                                    ?>
                                    </table>
                                </tbody>
                            </table>
                        </div>
                        <div class=divboton>
                            <form action="registrarComprobante.php" method="post">
                                <?php 
                                    if(isset($_POST['Platillos'])){
                                        echo "<input type='hidden' name='id_mesa' value=".$_POST['Mesas'].">";
                                        echo "<input type='hidden' name='id_usuario' value=".$_POST['Camareros'].">";
                                        echo "<input type='submit' value='Aceptar'></input>";
                                    }
                                ?>      
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="contenido-fila2">
                <div class="divtabla">
                    <table class="lista" border="1">
                        <tbody>
                            <?php 
                                echo '<tr> 
                                        <td>IDPedido</td>
                                        <td>Mesa</td>
                                        <td>IDCamarero</td>
                                        <td class="celda-larga">Nombre camarero</td>
                                        <td>Hora</td>';
                                echo '  <td>Editar</td>';
                                echo'   <td>Eliminar</a></td> </tr>';
                            ?>
                        </tbody>
                        <?php
                            $solicitud = "SELECT comprobante.id_comprobante,mesa.nro_mesa as nroMesa,comprobante.id_usuario,usuario.nombre_completo,det_venta_plato.hora_atencion FROM comprobante  
                            INNER JOIN det_venta_plato  ON det_venta_plato.id_comprobante=comprobante.id_comprobante 
                            INNER JOIN usuario ON usuario.dni_usuario=comprobante.id_usuario
                            INNER JOIN mesa  ON mesa.id_mesa=comprobante.id_mesa
                            GROUP by comprobante.id_comprobante,comprobante.id_mesa,comprobante.id_usuario,det_venta_plato.hora_atencion";
                            
                            $resultado = mysqli_query($conexion, $solicitud);
                            while ($fila=mysqli_fetch_array($resultado)) {
                                echo '<tr>
                                    <td id="det1">'.$fila['id_comprobante'].'</td> 
                                    <td class="">'.$fila['nroMesa'].'</td>
                                    <td class="">'.$fila['id_usuario'].'</td> 
                                    <td class="">'.$fila['nombre_completo'].'</td> 
                                    <td class="">'.$fila['hora_atencion'].'</td>
                                    <td><a href="opGesPedido-Actualizar.php?idComp='.$fila['id_comprobante'].'&nroMesa='.$fila['nroMesa'].'&nombre='.$fila['nombre_completo'].'">🔃</td>';
                                echo '<td><a href="eliminarComprobante.php?idComp='.$fila['id_comprobante'].'"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M16 9v4.501c-.748.313-1.424.765-2 1.319v-5.82c0-.552.447-1 1-1s1 .448 1 1zm-4 0v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1s1 .448 1 1zm1.82 15h-11.82v-18h2v16h8.502c.312.749.765 1.424 1.318 2zm-6.82-16c.553 0 1 .448 1 1v10c0 .552-.447 1-1 1s-1-.448-1-1v-10c0-.552.447-1 1-1zm14-4h-20v-2h5.711c.9 0 1.631-1.099 1.631-2h5.316c0 .901.73 2 1.631 2h5.711v2zm-1 2v7.182c-.482-.115-.983-.182-1.5-.182l-.5.025v-7.025h2zm3 13.5c0 2.485-2.017 4.5-4.5 4.5s-4.5-2.015-4.5-4.5 2.017-4.5 4.5-4.5 4.5 2.015 4.5 4.5zm-3.086-2.122l-1.414 1.414-1.414-1.414-.707.708 1.414 1.414-1.414 1.414.707.708 1.414-1.414 1.414 1.414.708-.708-1.414-1.414 1.414-1.414-.708-.708z"/></svg></a></td>
                                </tr>';
                            }
                        ?>
                    </table>
                </div>
            </div>
        </div>
    </main>
</body>
</html>