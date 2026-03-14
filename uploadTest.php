<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Test Allport</title>
    <link rel="stylesheet" href="uploadcss.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
</head>
<body>
    <header class="cabecera">
        <div>
            <img src="logo.png" alt="Logo" class="logoescuela">
            <nav class="navbar">
                <h1 class="tituloHeader">Upload Test</h1>
                <ul class="nav-links">
                    <li><a href="home_alumnos.php" class="active">Home</a></li>
                    <li><a href="logout.php" class="logout"><i class="fas fa-sign-out-alt"></i> Cerrar sesion</a></li>
                </ul>
            </nav>
        </div>
    </header>
<!-- 
    <form class="form-subida" action="" method = "POST" enctype = "multipart/form-data">
            <label for="file">Seleccionar archivo:</label>
            <input type="file" name="file" id="file">
            <input type="submit" name="submit" value="Subir">
    </form>
-->
    <form action="" method="POST" enctype="multipart/form-data">

        <div class="drop-area" id="drop-area">
            <p>Arrastra tu archivo aquí o haz click</p>
            <input type="file" name="file" id="file" hidden>
        </div>

        <input type="submit" name="submit" value="Subir archivo">

    </form>

    <script>

        const dropArea = document.getElementById("drop-area");
        const inputFile = document.getElementById("file");

        dropArea.addEventListener("click", () => {
            inputFile.click();
        });

        dropArea.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropArea.classList.add("dragover");
        });

        dropArea.addEventListener("dragleave", () => {
            dropArea.classList.remove("dragover");
        });

        dropArea.addEventListener("drop", (e) => {
            e.preventDefault();
            dropArea.classList.remove("dragover");

            inputFile.files = e.dataTransfer.files;
        });

    </script>

</body>
</html>
