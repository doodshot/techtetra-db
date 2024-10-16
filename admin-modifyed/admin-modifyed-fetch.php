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
$sql = "SELECT title FROM pdf";
$result = $conn->query($sql);

// Controllo se ci sono risultati
if ($result->num_rows > 0) {
    // Ciclo per generare l'output HTML per ciascun file
    while($row = $result->fetch_assoc()) {
        echo "<div class='file-input-container-text'>";
        echo "<p>" . $row['title'] . "</p>";
        echo "<img src='../asset/pdf-icon.png' alt='pdf-img'>";
        echo "</div>";
    }
} else {
    echo "Nessun file trovato.";
}

$conn->close();
?>