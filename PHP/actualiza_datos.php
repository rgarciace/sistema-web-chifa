<?php 
    //nombre,dni,tipo_usuario,nombre_usuario,contraseña
    session_start();
    include('conexion.php');
    if(isset($_POST['nombre'])){
        $nombre= $_POST['nombre'];
        $dni = $_POST['dni'];
        $tipo_usuario = $_POST['tipo_usuario'];
        $nombre_usuario = $_POST['nombre_usuario'];
        $contraseña = $_POST['contraseña'];
        $dniAnterior = $_SESSION['dni_usuario'];

        $consulta = "UPDATE usuario SET 
            id_tipo_usuario = $tipo_usuario,
            dni_usuario = '$dni',
            nombre_completo = '$nombre',
            nombre_usuario = '$nombre_usuario',
            contra_usuario = '$contraseña'
        WHERE dni_usuario = '$dniAnterior'
        ";
        $resultado = mysqli_query($conexion, $consulta);
       // echo $consulta;
        $_SESSION['dni_usuario'] = $dni;
        $_SESSION['contraseña'] = $contrase;
        $_SESSION['nombre_completo'] = $nombre;
        $_SESSION['nombre_usuario'] = $nombre_usuario;
        $_SESSION['id_tipo_usuario'] = $tipo_usuario;

        $consulta = "SELECT nombre_tipo_usuario FROM tipo_usuario WHERE id_tipo = $tipo_usuario";
        $resultado = mysqli_query($conexion, $consulta);
        $fila2=mysqli_fetch_array($resultado);

        //$_SESSION['tipo_usuario']  = '';
        $_SESSION['tipo_usuario'] = $fila2['nombre_tipo_usuario'];
        
       
       header("location:repLisTrabajador.php");
    }
?>