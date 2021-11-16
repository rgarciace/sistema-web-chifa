<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abrir Caja</title>
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
            <h2>ABRIR LA CAJA</h2>
        </div>
        <div class="contenido-unico">
            <form action="abrirCaja.php" method="POST">
                <div class="contenido-datos">
                    <label for="fecha">Seleccione la fecha</label>
                    <input type="date" name="fecha">
                </div>
                <div class="divboton">
                    <input type="submit" value="Abrir la caja">
                </div>
                
            </form>
        </div>
        
  </main>
    
</body>
</html>