<?php

$id= $_POST['input_id'];
$nombre = $_POST['input_nombre'];
$descripcion = $_POST['input_descripcion'];
$fecha = $_POST['input_fecha'];
$prioridad = $_POST['input_prioridad'];
$responsable = $_POST['input_responsable'];

// echo $id;
// echo "</br>";
// echo $nombre;
// echo "</br>";
// echo $descripcion;
// echo "</br>";
// echo $fecha;
// echo "</br>";
// echo $prioridad;
// echo "</br>";
// echo $responsable;
// echo "</br>";

//1. conexión entre nuestra app(php) y el servidor de bases de datos(mysql)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tareapend_bd";

$conn = new mysqli($servername, $username, $password, $dbname);
if($conn->connect_error)
{
    echo "Ha fallado la conexión con la Base de Datos Mysql";
    die("Ha fallado la conexión " . $conn->connect_error);
}
else
{
    echo "Conexión establecida entre PHP y Mysql";
    echo "<br>";
}

//2. sentencia sql (CRUD: Create, Read, Update, Delete)
$sql = "UPDATE tareas SET Nombre='{$nombre}', Descripcion='{$descripcion}', Vencimiento='{$fecha}', Prioridad='{$prioridad}', Responsable='{$responsable}' WHERE id_pk='{$id}'";

 //se lanza la consulta en la base de datos
$respuesta = $conn->query($sql);

//3. procesa la respuesta
if($respuesta === TRUE) {
    echo "Registro actualizado correctamente";
} else {
    echo "El error al actualizar es o está en: " . $conn->error;
}

//4. cierra la conexión
$conn->close();
header("Location: index.php");

?>