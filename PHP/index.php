<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Logueo</title>
    <link rel="stylesheet" href="../CSS/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Cabin&display=swap" rel="stylesheet">
    
</head>
<body class="body-login">
    <div class="divprincipal">
        <div class="img-center"><img class="logoprincipal" src="../img/logotipo.svg" alt=""></div>
        <div class="form">
            <form  class="frm-usuario" action="login.php" method="POST">
                <div class="contenedor-datos">
                    <div class="dato">
                        <input class="casilla" id="usuario" autocomplete="off" type="text" name="usuario" required>
                        <label for="usuario" class="dato">USUARIO</label>
                    </div>
                    <div class="dato">
                        <input class="casilla" id="contraseña" autocomplete="off" type="password" name="contraseña" required>
                        <label for="contraseña" class="dato">CONTRASEÑA</label>
                    </div>
                </div>
                <div class="contenedor-boton">
                    <input class="boton" type="submit" value="INICIAR">
                </div>
            </form>
        </div>
    </div>
</body>
</html>