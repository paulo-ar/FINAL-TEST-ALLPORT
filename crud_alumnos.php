<?php
session_start();
require_once __DIR__ . '/connection.php';

// Verificar si hay sesión iniciada
if (!isset($_SESSION['id_alumno'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Alumnos</title>
    <link rel="stylesheet" href="css/estiloUniversalCss.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css">
</head>
<body>
    <button onclick="history.back()" aria-label="Regresar" style="position:fixed; left:16px; top:16px; transform:none; background:#009688; color:#fff; border:none; width:44px; height:44px; border-radius:50%; cursor:pointer; font-size:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1); z-index:1101;">←</button>
    <div class="container mt-5">
        <h2>Lista de Alumnos</h2>
        <a class="btn btn-primary" href="/crear_alumnos.php" role="button">Agregar</a>
        <br>
        <table class="table">
            <thread>    
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Email</th>
                </tr>
            </thread>
            <tbody>
                <?php
                $servername = "db";
                $username = "usuario";
                $password = "12345";
                $database = "servicioSocial";

                // Crear conexión
                $connection = new mysqli($servername, $username, $password, $database);

                // Verificar conexión
                if ($connection->connect_error) {
                    die("Conexión fallida: " . $connection->connect_error);
                }

                // Consulta SQL para obtener los datos de la tabla alumnos
                $sql = "SELECT id, nombre, email FROM alumnos";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Error en la consulta: " . $connection->error);
                }

                // Leer datos de cada fila
                while ($row = $result->fetch_assoc()) {
                    echo "
                    <tr>
                        <td>$row[id]</td>
                        <td>$row[nombre]</td>
                        <td>$row[email]</td>
                        <td>
                            <a class='btn btn-warning' href='editar_alumnos.php?id=$row[id]' role='button'>Editar</a>
                            <a class='btn btn-danger' href='eliminar_alumnos.php?id=$row[id]' role='button'>Eliminar</a>
                        </td>
                    </tr>
                    ";

                }
                ?>
            
            </tbody>
        </table>
    </div>
</body>
</html>
