<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resultados Test Allport</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <style>
        * {
            box-sizing: border-box;
            font-family: Arial, Helvetica, sans-serif;
        }

        body {
            margin: 100px;
            background-color: #f7f9f8;
        }

        /* HEADER styles moved below and replicated from css/estilohomeadmi.css */
        /* See .cabecera, .navbar, .nav-links, etc. further down */

        /* CONTENEDOR PRINCIPAL */
        .container {
            padding: 40px;
            text-align: center;
        }

        h1 {
            color: #0a6b5a;
            margin-bottom: 20px;
        }

        /* TABS */
        .tabs {
            display: inline-flex;
            background-color: #d9efe9;
            border-radius: 30px;
            overflow: hidden;
            margin-bottom: 40px;
        }

        .tab {
            padding: 10px 25px;
            cursor: pointer;
            font-weight: bold;
            color: #0a6b5a;
        }

        .tab.active {
            background-color: #3bb39c;
            color: white;
        }

        /* GRID PRINCIPAL */
        .content {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 30px;
            align-items: start;
        }

        /* TARJETAS */
        .cards {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 20px;
            margin-bottom: 20px;
        }

        .card {
            background-color: #d9efe9;
            border-radius: 12px;
            padding: 20px;
            font-size: 15px;
        }

        .card strong {
            display: block;
            margin-top: 10px;
            font-size: 22px;
            color: #0a6b5a;
        }

        /* TARJETA BLANCA CENTRADA */
        .bottom-cards {
            display: flex;
            justify-content: center;
        }

        .card-white {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
            width: 60%;
        }

        .card-white strong {
            font-size: 22px;
            color: #0a6b5a;
        }

        /* GRAFICA */
        .chart-container {
            background-color: white;
            border: 1px solid #e0e0e0;
            border-radius: 12px;
            padding: 20px;
        }

        .chart-title {
            margin-bottom: 20px;
            font-weight: bold;
            color: #555;
        }

        .chart {
            display: flex;
            justify-content: space-around;
            align-items: flex-end;
            height: 220px;
        }

        .bar {
            width: 40px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .bar-fill {
            width: 100%;
            height: 0; /* 👈 barras vacías */
            border-radius: 6px 6px 0 0;
            transition: height 0.6s ease;
        }

        .label {
            margin-top: 8px;
            font-size: 13px;
        }

        /* COLORES DE BARRAS */
        #bar-teorico { background-color: #4e73df; }
        #bar-economico { background-color: #f28e2b; }
        #bar-estetico { background-color: #9e9e9e; }
        #bar-social { background-color: #f1c40f; }
        #bar-politico { background-color: #3498db; }
        #bar-religioso { background-color: #6ab04c; }

        /* Lista de enlaces */
        .nav-links {
            list-style: none;
            display: flex;
            gap: 40px;
        } 
        
        /* Enlaces */
        .nav-links a {
            text-decoration: none;
            color: #fff; /* color base del texto */
            font-weight: 500;
            font-size: 16px;
            transition: 0.3s;
            padding: 8px 16px;
            border-radius: 20px;
        }

        /* Enlace activo (Home) */
        .nav-links a.active {
            background-color: #008C72;
            color: #fff;
        }

        /* Efecto hover */
        .nav-links a:hover {
            background-color: #008C72;
            color: #fff;
        }

        /* Estilo especial para Logout */
        .nav-links a.logout {
            color: #fff;
            background-color: #00604E;
        }

        .nav-links a.logout:hover {
            background-color: #008C72;
        }

        .cabecera {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #00604E;
            color: white;
            padding: 5px 0;
            text-align: left;
            font-size: 15px;
            margin-bottom: 5px;
            z-index: 1000;
        }

        h1.tituloheader,
        h1.tituloHeader {
            font-weight: bold;
            margin-left: 20px;
            margin-right: 20px;
            display: flex;
            align-items: center;
            gap: 10px;
            color: #fff !important;
        }

        .logoescuela {
            display: block;
            margin: auto 10px auto 10px;
            max-width: 60px;
            float: left;
        }

        /* Barra de navegación */
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 5px 5px 5px 5px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.05);
        }

        .logo {
            width: 120px;
        }

        /* Responsivo */
        @media (max-width: 768px) {
            .navbar {
                flex-direction: column;
                align-items: flex-start;
                padding: 20px 40px;
            }

            .nav-links {
                flex-direction: column;
                gap: 15px;
                width: 100%;
                margin-top: 10px;
            }

            .nav-links a {
                display: block;
                width: 100%;
            }

        }

        .logoescuela {
            display: block;
            margin: auto 10px auto 10px;
            max-width: 60px;
            float: left;
        }

    </style>
</head>
<body>

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