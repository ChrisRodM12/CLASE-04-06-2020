<?php

    $id_denuncia_para_editar = $_GET['id_para_editar'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "tareapend_bd";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_error){
        echo "Ha fallado la conexión con la Base de Datos Mysql";
        die("Ha fallado la conexión " . $conn->connect_error);
    }else{
        echo "Conexión establecida entre PHP y Mysql";
        echo "<br>";
    }
    
    //crear sentencia sql
    $sql = "SELECT * from tareas where id_pk={$id_denuncia_para_editar}";
    //lanzar la sentencia sql
    $respuesta = $conn->query($sql);
    //die($respuesta);
    while($row=$respuesta->fetch_array())
    {
        $nombre = $row['Nombre'];
        $descripcion = $row['Descripcion'];
        $fecha = $row['Vencimiento'];
        $prioridad = $row['Prioridad'];
        $responsable = $row['Responsable'];
    }

?>
<form action="editarTarea.php" method="POST">
    <input type="hidden" name="input_id" value="<?php echo $id_denuncia_para_editar ?>">
    <div class="item-form">
        <label for="">Nombre de la Tarea:</label>
        <input value="<?php echo $nombre; ?>" type="text" name="input_nombre" id="" required>
    </div>
    <div class="item-form">
        <label for="">Descripción de la Tarea:</label>
        <input value="<?php echo $descripcion; ?>" type="text" name="input_descripcion" id="" required>
    </div>
    <div class="item-form">
        <label for="">Fecha de Vencimiento:</label>
        <input value="<?php echo $fecha; ?>" type="date" name="input_fecha" id="" required>
    </div>
    <div class="item-form">
        <label for="">Prioridad de la Tarea:</label>
        <input value="<?php echo $prioridad; ?>" type="text" name="input_prioridad" id="" required>
    </div>
    <div class="item-form">
        <label for="">Responsable de la Tarea:</label>
        <input value="<?php echo $responsable; ?>" type="text" name="input_responsable" id="" required>
    </div>
    <div class="item-form">
        <input type="submit" value="Actualizar">
    </div>                
</form>
