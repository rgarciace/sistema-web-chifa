<?php 
    session_start();
    include("conexion.php");
    $dni_usuario = $_SESSION['dni_usuario'];
    $consulta = "SELECT * FROM usuario WHERE dni_usuario = $dni_usuario";
    $resultado = mysqli_query($conexion, $consulta);
    $fila = mysqli_fetch_array($resultado);
    
    $id_tipo_usuario  = 0 ;
    $nombre_completo = $fila['nombre_completo'];
    $nombre_usuario = $fila['nombre_usuario'];
    $contra_usuario = $fila['contra_usuario'];
    
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar perfil</title>
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
                echo"NO MANITO";
            break; 
        }

    ?>
    <main>
        <div class="cabecera">
            <a class="volver" href="home.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>
            </a>
            <h2>EDITAR PERFIL</h2>
        </div>
        <div class="contenido-unico">
            <form action="actualiza_datos.php" method="POST">
                <div class="contenido-datos">
                    <div class="dato">
                        <label for="nombre">Nombre completo</label>
                        <input name="nombre" class="nombre" type="text" value='<?php echo $nombre_completo ?>' requerid>
                    </div>
                    
                    <div class="dato">
                        <label for="dni">DNI</label>
                        <input name="dni" class="dni" type="text" value='<?php echo $dni_usuario ?>' requerid>
                    </div>
                    <div class="dato">
                        <?php $tipo_usuario =  $_SESSION['id_tipo_usuario'];?>
                        <label for="tipo_usuario">Tipo de usuario</label>
                        <select name="tipo_usuario" id="tipo_usuario">
                            <option value="<?php echo $tipo_usuario?>">Elegir...</option>
                            <option value="2">Gerente</option>
                            <option value="3">Administrador</option>
                            <option value="4">Maitre</option>
                            <option value="5">Cocinero</option>
                            <option value="6">Camarero</option>
                        </select>
                    </div>
                    <div class="dato">
                        <label for="nombre_usuario">Nombre de usuario</label>
                        <input name="nombre_usuario" class="nombre_usuario" type="text" value='<?php echo $nombre_usuario ?>' requerid>
                    </div>
                    <div class="dato">
                        <label for="contraseña">Contraseña</label>
                        <input name="contraseña" class="contraseña" type="password" value='<?php echo $contra_usuario ?>' requerid>
                    </div>
                </div>
                <div class="divboton">
                    <input type="submit" value="Actualizar">
                </div>
            </form>
        </div>
    </main>

</body>
</html>