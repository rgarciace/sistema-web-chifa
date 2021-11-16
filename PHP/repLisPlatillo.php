<?php
    include('conexion.php'); 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrar Promoción</title>
    <link rel="stylesheet" href="../CSS/listas.css">
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
            <h2>LISTA DE PLATILLOS</h2>
        </div>
        <div class="contenido-tabla">
            <table class="lista" border="1">
            <tbody>
                    <tr class="encabezado-tabla">
                        <td>NOMBRE PLATILLO</td>
                        <td>COSTO </td>
                        <td>TIPO</td>
                        <td>ESTADO DEL DIA</td>
                        <td>DISCONTINUO</td>
                    </tr>
                    <?php 
                         $solicitud = "SELECT * FROM Plato ORDER BY nombre_plato AND estado_plato,estado_eliminado_plato DESC";
                        
                         $resultado = mysqli_query($conexion, $solicitud);
                        foreach($resultado as $platillos)
                        {
                    ?>
                    <tr>
                        <td><?php echo $platillos['nombre_plato']?></td>
                        <td><?php echo $platillos['costo']?></td>
                        <td><?php echo ($platillos['es_plato']==1)? "Plato":"Bebida"?></td>
                        <td><?php echo ($platillos['estado_plato']==1)? "Disponible":"Agotado"?></td>
                        <td><?php echo ($platillos['estado_eliminado_plato']==1)? "NO":"SI"?></td>
                    </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>