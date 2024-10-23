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
    <title>admin-delete</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-delete.css">
</head>

<body>
    <header>
      <a href="../admin-file-management/admin-file-management.html"> <img src="../asset/casetta.png" id="home" alt="home"></a> 
    </header>
    <div class="title">
        <h1>Seleziona un file</h1>
    </div>
    <ul class="file-list">
        <?php
        // Verifica se ci sono risultati
        if ($result->num_rows > 0) {
            // Output dei dati per ciascun file
            while ($row = $result->fetch_assoc()) {
                echo "<div class='file-item'>";
                // Mostra il titolo e le icone per i file italiano e inglese
                echo "<img src='../asset/pdf-icon.png' alt='pdf-img'>";
                echo '<p class="p-title">' . $row['title'] . '</p>';
                echo "<img src='../asset/cestino.png' alt='cestino-img' class='delete-icon' onclick=\"deleteFile(" . $row['id'] . ", 'it')\">";
                echo '</div>';
            }
        } else {
            echo '<li id="text" class="file-item">Nessun file trovato</li>';
        }
        // Chiudi la connessione
        $conn->close();
        ?>
    </ul>
    <script src="admin-delete.js"></script>
</body>

</html>
