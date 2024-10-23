<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inserisci il nuovo PDF</title>
    <link rel="stylesheet" href="admin-modify.css">
</head>
<body>
    <header>
        <a href="#" class="logo-image">
            <img src="../asset/logoselmi.png" alt="Logo Home">
        </a>
        <div class="language-selector">
            <select id="languageSelector">
                <option value="it">IT</option>
                <option value="en">EN</option>
                <option value="fr">FR</option>
                <option value="dt">DT</option>
                <option value="es">ES</option>
                <option value="ch">CH</option>
                <option value="ru">RU</option>
                <option value="tk">TK</option>
            </select>
        </div>
    </header>
    <div class="container">
        <h1 id="pageTitle">Inserisci il nuovo PDF</h1>
        <div class="containerrow">
            <form action="upload_pdf.php" method="POST" enctype="multipart/form-data">
                
                <label for="fileInputItalian" class="custom-file-label">
                    <span>PDF Italiano</span>
                    <img src="../asset/pdf-icon.png" alt="PDF Icon">
                </label>
                <input type="file" name="pdfItalian" id="fileInputItalian" accept=".pdf" required>

                
                <label for="fileInputEnglish" class="custom-file-label">
                    <span>PDF English</span>
                    <img src="../asset/pdf-icon.png" alt="PDF Icon">
                </label>
                <input type="file" name="pdfEnglish" id="fileInputEnglish" accept=".pdf" required>

                <!-- ID del file -->
                <input type="hidden" name="fileId" value="<?php echo htmlspecialchars($_GET['id']); ?>">

                <!-- Bottone di submit -->
                <button type="submit" class="modify-btn" id="modifyButton">Modifica</button>
            </form>
        </div>
    </div>
</body>
</html>