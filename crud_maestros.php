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
<hmtl lang="es">
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD Maestros</title>
    <link rel="stylesheet" href="css/estiloUniversalCss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js"></script>
    </head>

    <body class="app-theme crud-page with-fixed-header">
        <button onclick="history.back()" aria-label="Regresar" style="position:fixed; left:16px; top:72px; transform:none; background:#009688; color:#fff; border:none; width:44px; height:44px; border-radius:50%; cursor:pointer; font-size:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1); z-index:1101;">←</button>
        <header class="cabecera">
        <div>
            <img src="logo.png" alt="Logo" class="logoescuela">
            <nav class="navbar">
                <h1 class="tituloHeader">Crud Maestros</h1>
                <ul class="nav-links">
                    <li><a href="home_admi.php" class="active">Home</a></li>
                    <li><a href="crud_alumnos.php">Alumnos</a></li>
                    <li><a href="crud_maestros.php">Maestros</a></li>
                    <li><a href="dashboard_final.php">Dashboard</a></li>
                    <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container">
            <h2 >Lista de Maestros</h2>
            <br>
            <button class="btn-agregar"><a class="agregar" href="agregar_maestros.php">Agregar Maestro</a></button>
            <br>
            <table class="tabla-alumnos">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Matricula</th>
                        <th>Nombre(s)</th>
                        <th>Apellido</th>
                        <th>Materia que imparte</th>
                        <th>Email</th>
                        <th>Contraseña</th>
                        <th>Fecha de Creacion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Aquí iría el código PHP para obtener y mostrar los alumnos desde la base de datos
                    $servername = "db";
                    $username = "usuario";
                    $password = "12345";
                    $dbname = "socialService";

                    // Crear conexión
                    $conn = new mysqli($servername, $username, $password, $dbname);

                    // Verificar conexión
                    if ($conn->connect_error) {
                        die("Conexión fallida: " . $conn->connect_error);
                    }

                    // Consulta SQL para obtener los maestros
                    $sql = "SELECT * FROM maestro";
                    $result = $conn->query($sql);

                    if(!$result){
                        die("Consulta fallida: " . $conn->error);
                    }

                    // Mostrar los datos de cada maestro
                    while($row = $result->fetch_assoc()) {
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[matricula]</td>
                            <td>$row[nombres]</td>
                            <td>$row[apellidos]</td>
                            <td>$row[materia]</td>
                            <td>$row[email]</td>
                            <td>$row[contrasena]</td>
                            <td>$row[creat_at]</td>
                            <td>
                                <a class='btn-editar' href='editar_Maestro.php?id=$row[id]'>Editar</a>
                                <a class='btn-eliminar' href='eliminar_Maestro.php?id=$row[id]'>Eliminar</a>
                            </td>
                        </tr>
                        ";

                    }

                    ?>
                    
                </tbody>
            </table>
    </div>

    </body>
</hmtl>
