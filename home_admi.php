<?php
session_start();
include '../connection.php';

// Verificar si hay sesión iniciada
if (!isset($_SESSION['id_alumno'])) {
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Admin</title>
    <link rel="stylesheet" href="css/estilohomeadmi.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="cabecera">
        <div>
            <img src="logo.png" alt="Logo" class="logoescuela">
            <nav class="navbar">
                <h1 class="tituloHeader">Home</h1>
                <ul class="nav-links">
                    <li><a href="crud_alumnos.php">Alumnos</a></li>
                    <li><a href="crud_maestros.php">Maestros</a></li>
                    <li><a href="dashboard_final.php">Dashboard</a></li>
                    <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <div class="container">

        <!-- Sección central -->
        <main class="main-content">
            <div class="header">
                <img src="logo.png" alt="Logo CECYTEM" class="logo">
                <h1>Home Admin</h1>
            </div>

            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>Alumnos</th>
                            <th>Resultados</th>
                            <th>Detalles</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Aquí iría el código PHP para obtener y mostrar los alumnos desde la base de datos
                        $servername = "mysql";
                        $username = "root";
                        $password = "root";
                        $dbname = "test-allport";

                        // Crear conexión
                        $conn = new mysqli($servername, $username, $password, $dbname);

                        // Verificar conexión
                        if ($conn->connect_error) {
                            die("Conexión fallida: " . $conn->connect_error);
                        }

                        // Detectar la tabla de alumnos disponible y consultar
                        $possibleTables = array('alumnos', 'alumno', 'alumnos-test', 'alumnos_test', 'alumnos_test');
                        $tableFound = null;
                        foreach ($possibleTables as $t) {
                            try {
                                $check = $conn->query("SELECT 1 FROM `" . $conn->real_escape_string($t) . "` LIMIT 1");
                                if ($check !== false) { $tableFound = $t; break; }
                            } catch (mysqli_sql_exception $e) {
                                // Tabla no existe o error en la consulta, probar siguiente
                                continue;
                            }
                        }

                        if (!$tableFound) {
                            die("Consulta fallida: no se encontró la tabla de alumnos en la base de datos.");
                        }

                        $result = $conn->query("SELECT * FROM `" . $conn->real_escape_string($tableFound) . "`");
                        if (!$result) {
                            die("Consulta fallida: " . $conn->error);
                        }

                        // Mostrar los datos de cada alumno (soporta nombres/columnas alternativas)
                        while($row = $result->fetch_assoc()) {
                            $name = isset($row['nombres']) ? $row['nombres'] : (isset($row['nombre']) ? $row['nombre'] : (isset($row['nombre_alumno']) ? $row['nombre_alumno'] : 'Alumno'));
                            $id = isset($row['id']) ? $row['id'] : (isset($row['id_alumno']) ? $row['id_alumno'] : '');

                            echo "<tr>\n";
                            echo "<td>" . htmlspecialchars($name) . "</td>\n";
                            echo "<td><a class='btn-green' href='res_ind.php?id=" . urlencode($id) . "'>Resultados</a></td>\n";
                            echo "<td><a class='btn-green' href='detalles_estudiante.php?id=" . urlencode($id) . "'>Detalles</a></td>\n";
                            echo "</tr>\n";
                        }

                        ?>
                    </tbody>
                </table>
            </div>
        </main>

    </div>
</body>
</html>
