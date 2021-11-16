<?php 
    session_start();
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