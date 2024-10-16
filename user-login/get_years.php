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

// Query per ottenere gli anni (assumendo che la tua tabella abbia una colonna "anno")
$sql = "SELECT DISTINCT anno FROM pdf ORDER BY anno DESC"; // Modifica "acquisti" in base al tuo nome di tabella
$result = $conn->query($sql);

// Array per memorizzare gli anni
$years = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $years[] = $row['anno']; // Salva gli anni in un array
    }
}

// Chiudi la connessione
$conn->close();

// Restituisci gli anni come JSON
echo json_encode($years);
?>