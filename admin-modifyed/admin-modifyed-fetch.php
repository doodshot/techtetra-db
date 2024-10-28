<?php
// Configurazione della connessione al database
$host = 'localhost';
$dbname = 'techtetra';
$username = 'root';
$password = '';

// Creare la connessione
$conn = new mysqli($host, $username, $password, $dbname);

// Verifica della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Query per ottenere i file dal database
$sql = "SELECT id, title FROM pdf";  // Recupera anche l'ID
$result = $conn->query($sql);

// Controllo se ci sono risultati
if ($result->num_rows > 0) {
    // Ciclo per generare l'output HTML per ciascun file
    while($row = $result->fetch_assoc()) {
        echo "<div class='file-input-container-text'>";
        echo "<p><a href='../admin-modify/admin-modify.php?id=" . $row['id'] . "'>" . htmlspecialchars($row['title']) . "</a></p>";  // Il nome del file con link
        echo "<a href='../admin-modify/admin-modify.php?id=" . $row['id'] . "'><img src='../asset/pdf-icon.png' alt='pdf-img'></a>"; // L'immagine con link
        echo "</div>";
    }
} else {
    echo "Nessun file trovato.";
}

$conn->close();
?>