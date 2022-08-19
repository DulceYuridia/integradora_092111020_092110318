<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AGREGAR</title>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <?php
    if (isset($_POST['enviar'])) {
        $nombre = $_POST['nombre'];
        $matricula = $_POST['matricula'];
        // mandamos a traer la conexion.php
        include("conexion.php");
        // insertar la tabla de bd
        $sql = "insert into alumnos(nombre,matricula) values('" . $nombre . "', '" . $matricula . "')";

        $resultado = mysqli_query($conexion, $sql);

        if ($resultado) {
            // los datos ingresaron a la bd
            echo "<script language='JavaScript'>
                alert('Los datos fueron ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
        } else {
            // los datos no ingresados a la BD
            echo "<script language='JavaScript'>
                alert('ERROR: Los datos NO fueron ingresados correctamente a la BD');
                location.assign('index.php');
                </script>";
        }
        // cierre de la conexion de la BD
        mysqli_close($conexion);
    } else {
    }
    ?>
    <h1>Agregar Nuevo Alumno</h1>
    <!-- creamos formulario -->
    <form action="<?= $_SERVER['PHP_SELF'] ?>" method="post">
        <!-- envio de los datos en el mismo archivo -->
        <label>Nombre:</label>
        <input type="text" name="nombre"> <br>
        <label>Matricula</label>
        <input type="text" name="matricula"> <br>
        <input type="submit" name="enviar" value="AGREGAR"> <!-- sirve para boton -->
        <a href="index.php">Regresar</a>
    </form>
</body>

</html>