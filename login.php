<?php
session_start();

require_once __DIR__ . '/connection.php';

// Verificar si ya hay una sesión iniciada
if (isset($_SESSION['id_alumno'])) {
    // Redirigir según el tipo de usuario
    if (isset($_SESSION['tipo_usuario']) && $_SESSION['tipo_usuario'] == 2) {
        header("Location: home_admi.php");
    } else {
        header("Location: home_alumnos.php");
    }
    exit();
}

// Procesar el formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        // Obtener datos del formulario
        $user_input = isset($_POST['user_input']) ? trim($_POST['user_input']) : '';
        $password_input = isset($_POST['password']) ? trim($_POST['password']) : '';
        $error = '';

        if ($user_input === '' || $password_input === '') {
            $error = "Por favor completa todos los campos";
        } else {
            // Preparar consulta para buscar por matrícula o email
            $query = "SELECT * FROM `alumnos-test` WHERE `matricula-alumno` = ? OR `email` = ? LIMIT 1";
            $stmt = $conn->prepare($query);
            
            if ($stmt === false) {
                throw new Exception("Error en la preparación: " . $conn->error);
            }
            
            $stmt->bind_param("ss", $user_input, $user_input);
            
            if (!$stmt->execute()) {
                throw new Exception("Error al ejecutar: " . $stmt->error);
            }
            
            $result = $stmt->get_result();
            $alumno = $result->fetch_assoc();
            $stmt->close();

            // Validar contraseña
            if ($alumno && $password_input === $alumno['contrasena']) {
                // Iniciar sesión con datos del alumno
                $_SESSION['id_alumno'] = $alumno['id_alumno'];
                $_SESSION['nombre_alumno'] = $alumno['nombre_alumno'];
                $_SESSION['apellido1_alumno'] = $alumno['apellido1_alumno'];
                $_SESSION['apellido2_alumno'] = $alumno['apellido2_alumno'];
                $_SESSION['matricula_alumno'] = $alumno['matricula-alumno'];
                $_SESSION['email'] = $alumno['email'];
                $_SESSION['tipo_usuario'] = isset($alumno['tipo_usuario']) ? $alumno['tipo_usuario'] : 1;

                // Redirigir según el tipo de usuario
                if ($_SESSION['tipo_usuario'] == 2) {
                    header("Location: home_admi.php");
                } else {
                    header("Location: home_alumnos.php");
                }
                exit();
            } else {
                $error = "Matrícula/Email o contraseña incorrectos";
            }
        }
        
        $conn->close();
        
    } catch(Exception $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/estiloUniversalCss.css">
</head>
<body class="app-theme auth-page">
    <div class="container">
        <div class="form-box" id="login-form">
            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                <img src="logo.png" alt="Logo" class="logo">
                <h2>Ingresar</h2>
                <?php if (isset($error)): ?>
                    <div class="error-message" style="color: red; margin-bottom: 10px;">
                        <?php echo htmlspecialchars($error); ?>
                    </div>
                <?php endif; ?>
                <input type="text" name="user_input" placeholder="Matrícula o Correo Electrónico" required>
                <input type="password" name="password" placeholder="Contraseña" required>
                <button type="submit" class="btn">Ingresar</button>
            </form>
        </div>
    </div>
</body>
</html>
