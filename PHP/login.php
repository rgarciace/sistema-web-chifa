<?php
    include('conexion.php'); 
    
    $usuario = $_POST['usuario'];
    $contraseña = $_POST['contraseña'];  

    $usuario=$_POST["usuario"];
    $contraseña=$_POST["contraseña"];
    
    $solicitud="SELECT * FROM usuario AS u 
        INNER JOIN tipo_usuario  as tu ON u.id_tipo_usuario = tu.id_tipo 
     WHERE u.nombre_usuario='$usuario' AND u.contra_usuario='$contraseña'";
    $resultado=mysqli_query($conexion,$solicitud);
    $fila=mysqli_fetch_array($resultado);
    session_start();
    $_SESSION['dni_usuario'] = $fila['dni_usuario'];
    $_SESSION['contraseña'] = $fila['contra_usuario'];
    $_SESSION['nombre_completo'] = $fila['nombre_completo'];
    $_SESSION['nombre_usuario'] = $fila['nombre_usuario'];
    $_SESSION['id_tipo_usuario'] = $fila['id_tipo_usuario'];
    $_SESSION['tipo_usuario']  = '';
    $_SESSION['tipo_usuario'] = $fila['nombre_tipo_usuario'];
    $consulta = "SELECT * FROM caja_x_dia WHERE estado_caja = 1";
    $resultado = mysqli_query($conexion,$consulta);
    
    $_SESSION['caja_activa'] = -1;
    while($fila2=mysqli_fetch_array($resultado)){
        $_SESSION['caja_activa'] = $fila2['estado_caja'];   
        $_SESSION['id_fecha'] = $fila2['id_caja_dia']; 
    }
    switch($_SESSION['tipo_usuario']){
        case 'Administrador del Sistema':
            header('location:administradorSistema.php');
        break;
        case 'Gerente':
            header('location:gerente.php');
        break;
        case 'Administrador':
            header('location:administrador.php');
        break;
        case 'Maitre':
            header('location:maitre.php');
        break;
        case 'Cocinero':
            header('location:cocinero.php');
        break;
        case 'Camarero':
            header('location:camarero.php');
        break;
        default:
            header('location:logout.php');
        break; 
    }
    
?>