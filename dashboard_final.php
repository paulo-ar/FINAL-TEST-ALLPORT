<?php
require_once __DIR__ . '/connection.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados Test Allport</title>
    <link rel="stylesheet" href="css/estiloUniversalCss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    </head>
<body class="app-theme dashboard-page with-fixed-header">

    <button onclick="history.back()" aria-label="Regresar" style="position:fixed; left:16px; top:72px; transform:none; background:#009688; color:#fff; border:none; width:44px; height:44px; border-radius:50%; cursor:pointer; font-size:20px; box-shadow:0 4px 8px rgba(0,0,0,0.1); z-index:1101;">←</button>

<header class="cabecera">
    <div>
        <img src="logo.png" alt="Logo" class="logoescuela">
        <nav class="navbar">
            <h1 class="tituloHeader">Home</h1>
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
    <h1>Resultados Test Allport</h1>

    <div class="tabs">
        <div class="tab active">Resumen general</div>
        <div class="tab">Resultados alumnos</div>
    </div>

    <div class="content">

        <!-- IZQUIERDA -->
        <div>
            <div class="cards">
                <div class="card">
                    Alumnos evaluados
                    <strong id="alumnosEvaluados">---</strong>
                </div>
                <div class="card">
                    Valor predominante
                    <strong id="valorPredominante">---</strong>
                </div>
                <div class="card">
                    Valor minoritario
                    <strong id="valorMinoritario">---</strong>
                </div>
            </div>

            <div class="bottom-cards">
                <div class="card-white">
                    Porcentaje con valores dominantes similares
                    <br><br>
                    <strong id="porcentajeValores">---</strong>
                </div>
            </div>
        </div>

        <!-- DERECHA - GRAFICA DE BARRAS -->
        <div class="chart-container">
            <div class="chart-title">Test Allport</div>

            <div class="chart">
                <div class="bar">
                    <div class="bar-fill" id="bar-teorico"></div>
                    <div class="label">Teórico</div>
                </div>

                <div class="bar">
                    <div class="bar-fill" id="bar-economico"></div>
                    <div class="label">Económico</div>
                </div>

                <div class="bar">
                    <div class="bar-fill" id="bar-estetico"></div>
                    <div class="label">Estético</div>
                </div>

                <div class="bar">
                    <div class="bar-fill" id="bar-social"></div>
                    <div class="label">Social</div>
                </div>

                <div class="bar">
                    <div class="bar-fill" id="bar-politico"></div>
                    <div class="label">Político</div>
                </div>

                <div class="bar">
                    <div class="bar-fill" id="bar-religioso"></div>
                    <div class="label">Religioso</div>
                </div>
            </div>
        </div>

    </div>
</div>

</body>
</html>
