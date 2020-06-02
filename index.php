<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Tareas Pendientes</title>
        <style>
            html
            {
                height: 100%;
            }
            body
            {
                height: 100%;
            }
            .seccion
            {
                height: 70%;
                background-color:#fdf1f1;
                border: whitesmoke solid 2px;
            }
            .header
            {
                height:20%
            }    
            .footer
            {
                height:10%
            }
        </style>
    </head>
    <body>
        <div class="header">
            <h1>Bienvenido al Portal de Tareas Pendientes</h1>
            <p>Acá usted nunca olvidará que tarea tiene pendiente, dele seguimiento a lo que le falta por realizar</p>
            <p>*Recuerda: No dejes para mañana lo que puedes hacer hoy*</p>
        </div>
        <div class="seccion">
            <h3>Ingrese acá el registro de sus Tareas Pendientes</h3>
            <form action="crearTarea.php" method="POST">
                <div class="item-form">
                    <label for="">Nombre de la Tarea:</label>
                    <input type="text" name="input_nombre" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Descripción de la Tarea:</label>
                    <input type="text" name="input_descripcion" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Fecha de Vencimiento:</label>
                    <input type="date" name="input_fecha" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Prioridad de la Tarea:</label>
                    <input type="text" name="input_prioridad" id="" required>
                </div>
                <div class="item-form">
                    <label for="">Responsable de la Tarea:</label>
                    <input type="text" name="input_responsable" id="" required>
                </div>
                <div class="item-form">
                    <input type="submit" value="Guardar">
                </div>                
            </form>
            <table border="1">
                <tr>
                    <th>Nombre de la Tarea</th>
                    <th>Descripción de la Tarea</th>
                    <th>Fecha de Vencimiento</th>
                    <th>Prioridad de la Tarea</th>
                    <th>Responsable de la Tarea</th>
                    <th>id</th>
                    <th></th>
                    <th></th>
                </tr>
                <?php
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
                //crear sentencia sql
                $sql = "SELECT * from tareas";
                //lanzar la sentencia sql
                $respuesta = $conn->query($sql);
                while($row=$respuesta->fetch_array())
                {
                ?>
                <tr>
                    <td> <?php echo $row['Nombre']; ?></td>
                    <td> <?php echo $row['Descripcion']; ?></td>
                    <td> <?php echo $row['Vencimiento']; ?></td>
                    <td> <?php echo $row['Prioridad']; ?></td>
                    <td> <?php echo $row['Responsable']; ?></td>
                    <td> <?php echo $row['id_pk']; ?></td>
                    <td><a href="verTareaParaEditar.php?id_para_editar=<?php echo $row['id_pk']; ?>">Editar</a></td>
                    <td><a href="eliminarTarea.php?id_para_borrar=<?php echo $row['id_pk']; ?>">Eliminar</a></td>
                </tr>
                <?php
                }
                // cierra la conexión
                $conn->close();
                ?>
            </table>
            
        </div>
        <div class="footer">
            Realizado por Christian R. Messa
        </div>
    </body>
</html>