<?php
include("conexion.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EDITAR</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        // nos mostrara si el usuario a presionando el boton enviar o si no lo ha hecho
        $id = $_POST['id'];
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];

        $sql = "update alumnos set nombre='" . $nombre . "', matricula='" . $matricula . "' where id='" . $id . "'";
        // le enviamos a parametros de conexion
        $resultado = mysqli_query($conexion, $sql);
        // verificando el resultado de la variable resultado

        if ($resultado) {
            echo "<script language='JavaScript'>
                alert('Los datos se actualizaron correctamente'); 
                location.assign('index.php');
                </script>";
        } else {
            echo "<script language='JavaScript'>
                alert('Los datos NO se actualizaron correctamente'); 
                location.assign('index.php');
                </script>";
        }
        // cerramos la conexion
        mysqli_close($conexion);
    } else {
        // aqui entra si no se ha presionando el boton enviar
        $id = $_GET['id']; #recuperamos el id  que esta siendo enviado desde el archivo index.php
        $sql = "select * from alumnos where id='" . $id . "'"; #mandar a traer el registro del alumno cuyo id sea la que estamos presionando
        $resultado = mysqli_query($conexion, $sql);

        $fila = mysqli_fetch_assoc($resultado); #se le envia la variable resultado
        $nombre = $fila["nombre"]; #datos obtenidos de la siguiente operacion
        $matricula = $fila["matricula"]; #recuperar el matricula

        mysqli_close($conexion); #cerramos la conexion

    ?>
        <!-- creamos formulario -->
        <h1>Editar Alumno</h1>
        <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
            <!--utilizamos el campo-->
            <label>Nombre:</label>
            <input type="text" name="nombre" value="<?php echo $nombre; ?>"> <br>

            <label>Matricula</label>
            <input type="text" name="matricula" value="<?php echo $matricula; ?>"> <br>
            <!-- para que se visualizen en los campos de texto que estan asignado al archivo editar.php -->


            <!-- almacenar id que estoy manipulando -->
            <input type="hidden" name="id" value="<?php echo $id; ?>">

            <!-- creamos boton para enviar datos -->
            <input type="submit" name="enviar" value="ACTUALIZAR">
            <!-- creamos vinculo, para regresar a la pagina principal -->
            <a href="index.php">Regresar</a>
        </form>
    <?php
    }
    ?>
</body>

</html>