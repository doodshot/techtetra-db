<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', '', 'techtetra');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera l'ID dal POST
$fileId = $_POST['id'];

// Query per ottenere il percorso del file
$sql = "SELECT file_path_it FROM pdf WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fileId);
$stmt->execute();
$stmt->bind_result($filePath);
$stmt->fetch();
$stmt->close();

// Elimina il file dal server
if (file_exists($filePath)) {
    unlink($filePath);
}

// Elimina l'entry dal database
$sql = "DELETE FROM pdf WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $fileId);

if ($stmt->execute()) {
    echo "File eliminato con successo.";
} else {
    echo "Errore durante l'eliminazione.";
}

// Chiudi la connessione
$stmt->close();
$conn->close();
?>