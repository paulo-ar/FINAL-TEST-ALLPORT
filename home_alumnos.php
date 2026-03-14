<?php
session_start(); // Start the session

// Database credentials
$servername = "db";
$username = "usuario";
$password = "12345";
$dbname = "socialService";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the user is logged in as a student
if (isset($_SESSION['user_id']) && $_SESSION['role'] === 'student') {
    $user_id = $_SESSION['user_id'];

    // Fetch user details from the 'alumno' table (student)
    $sql = "SELECT * FROM alumnos WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $student = $result->fetch_assoc();
        // Map fetched data to local variables used in the template
        $matricula = isset($student['matricula']) ? $student['matricula'] : '';
        $nombres   = isset($student['nombres']) ? $student['nombres'] : '';
        $apellidos = isset($student['apellidos']) ? $student['apellidos'] : '';
        $email     = isset($student['email']) ? $student['email'] : '';
        // close statement
        $stmt->close();
    } else {
        die("User not found.");
    }
} else {
    // If the user is not logged in or is not a student
    header('Location: login.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home del Alumno</title>
    <link rel="stylesheet" href="css/estilohomealumnos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="cabecera">
        <div>
            <img src="logo.png" alt="Logo" class="logoescuela">
            <nav class="navbar">
                <h1 class="tituloHeader">Home</h1>
                <ul class="nav-links">
                    <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="perfil-container">
    

    <div class="perfil-foto">
        <img src="user_logo.jpg" alt="Foto del alumno">
    </div>


    <div class="perfil-info">
        <p><strong>Matrícula: </strong><?php echo $matricula; ?></p>
        <br>
        <p><strong>Nombre: </strong><?php echo $nombres . " " . $apellidos; ?></p>
        <br>
        <p><strong>Email: </strong><?php echo $email ?></p>
    </div>


    <div class="acciones">
        <a href="#" class="action-btn">
        <img src="test_Allport.png" alt="Iniciar Test Allport">
        <p>Iniciar Test Allport</p>

        <a href="uploadTest.php" class="action-btn">
        <img src="imagenes/pngwing.com.png" alt="Iniciar Test Allport">
        <p>Subir mis resultados</p>
        </a>
        </a>
    </div>

    </div>

</body>
</html>
