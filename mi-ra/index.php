<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Alumnos</title>
    <!-- utilizar pequeño JavaScript que nos genere una pregunta Bolean-->
    <script type="text/javascript">
        function confirmar() {
            return confirm('¿Estas Seguro?, se eliminaran los datos');
        }
    </script>
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
</head>

<body>
    <?php
    include("conexion.php");        #llamamos la conexion
    $sql = "select * from alumnos";   #hacemos la consulta
    $resultado = mysqli_query($conexion, $sql);
    ?>
    <h1>Lista de Alumnos</h1>
    <a href="agregar.php">Nuevo Alumno</a><br><br>
    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Nombre</th>
                <th>Matricula</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <!-- hacemos uso de repeticion o estructura de repeticion -->
            <?php
            while ($filas = mysqli_fetch_assoc($resultado)) {
            ?>
                <tr>
                    <!--tr sive para la etiqueta de las filas -->
                    <td><?php echo $filas['id'] ?></td>
                    <td><?php echo $filas['nombre'] ?></td>
                    <td><?php echo $filas['matricula'] ?></td>
                    <td>
                        <!-- nos llevara al vinculo editar.php y eliminar.php -->
                        <?php echo "<a href='editar.php?id=" . $filas['id'] . "'>EDITAR</a> "; ?>
                        -
                        <?php echo "<a href='eliminar.php?id=" . $filas['id'] . "'
                        onclick='return confirmar()'>ELIMINAR</a> "; ?>
                        <!-- llamamos la funcion con: onclick='return confirmar() para ejucutar "verdadero o falso"-->

                    </td>
                </tr>
            <?php
            }
            ?>
        </tbody>
    </table>
    <!-- cierre de conexion de la base de datos -->
    <?php
    mysqli_close($conexion);
    ?>
</body>

</html>