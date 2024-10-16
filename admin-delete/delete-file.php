<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', '', 'techtetra');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Ottieni l'ID del file dalla richiesta AJAX
$id = $_POST['id'];

// Esegui la query di eliminazione
$sql = "DELETE FROM pdf WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "success";
} else {
    echo "error";
}
// Chiudi la connessione
$conn->close();
?>