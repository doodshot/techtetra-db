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
        echo "<a href='../admin-modify/admin-modify.php?id=" . $row['id'] . "'>"; // Passa l'ID del file tramite query string
        echo "<p>" . htmlspecialchars($row['title']) . "</p>";  // Utilizza htmlspecialchars per prevenire XSS
        echo "<img src='../asset/pdf-icon.png' alt='pdf-img'>";
        echo "</a>"; // Chiudi il link
        echo "</div>";
    }
} else {
    echo "Nessun file trovato.";
}

$conn->close();
?>