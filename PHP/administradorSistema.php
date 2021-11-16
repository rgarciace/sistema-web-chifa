<?php 
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrador</title>
    <link rel="stylesheet" href="../CSS/administrador.css">
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
        <div class="bienvenida-centrar">
            <h1>BIENVENIDO A</h1>
            <img class="logoprincipal" src="../img/logotipo.svg" alt="Logotipo Terra System">
            <h1>SYSTEM</h1>
        </div>
    </main>

</body>
</html>