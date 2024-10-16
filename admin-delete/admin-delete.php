<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', '', 'techtetra');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per recuperare i file
$sql = "SELECT id, title FROM pdf";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seleziona un file</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-delete.css">
</head>

<body>
    <img src="../asset/logoselmi.png" alt="Logo Home" class="logo-image">
    <ul class="file-list">
        <?php
        // Verifica se ci sono risultati
        if ($result->num_rows > 0) {
            // Output dei dati per ciascun file
            while ($row = $result->fetch_assoc()) {
                echo '<li class="file-item" id="file' . $row['id'] . '">';
                
                // Mostra il titolo e le icone per i file italiano e inglese
                echo '<span><span class="file-icon">&#128196;</span> ' . $row['title'] . ' </span>';
                echo '<span class="delete-icon" onclick="deleteFile(' . $row['id'] . ', \'it\')">&#128465;</span>';
                
                echo '</li>';
            }
        } else {
            echo '<li class="file-item">Nessun file trovato</li>';
        }
        // Chiudi la connessione
        $conn->close();
        ?>
    </ul>
    <script src="admin-delete.js"></script>
</body>

</html>
