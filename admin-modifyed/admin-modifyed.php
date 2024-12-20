<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina di Login - Selmi Group</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
    <link rel="stylesheet" href="admin-modifyed.css">
</head>
<body>
    <header>
        <a href="../admin-file-management/admin-file-management.html"> <img src="../asset/casetta.png" id="home" alt="home"></a> 
        <select id="languageSelector">
            <option value="" disabled selected> 🌐 </option>
            <option value="it"> IT </option>
            <option value="en"> EN </option>
            <option value="fr"> FR </option>
            <option value="dt"> DT </option>
            <option value="es"> ES </option>
            <option value="ch"> CH </option>
            <option value="ru"> RU </option>
            <option value="tk"> TK </option>
        </select>
    </header>
    <div class="title">
        <h1>Seleziona un file</h1>
    </div>
    <div class="file-input-container">
        <?php include 'admin-modifyed-fetch.php'; ?> <!-- Includi qui senza <a> -->
    </div>
    <script src="admin-modifyed.js"></script>
</body>
</html>