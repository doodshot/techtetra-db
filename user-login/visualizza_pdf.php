<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', '', 'techtetra');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}

// Recupera i dati dal form
$anno_acquisto = $_POST['anno'];
$lingua = $_POST['lingua'];

// Esegui una query in base all'anno di acquisto
$sql = "SELECT title, file_path_it, file_path_en FROM pdf WHERE anno = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $anno_acquisto);
$stmt->execute();
$result = $stmt->get_result();

// Controlla se ci sono risultati
if ($result->num_rows > 0) {
    // Recupera il PDF corretto
    $row = $result->fetch_assoc();
    if ($lingua == 'it') {
        // Percorso del PDF in italiano
        $pdf_path = $row['file_path_it'];
    } else {
        // Percorso del PDF in inglese
        $pdf_path = $row['file_path_en'];
    }

    // Reindirizza l'utente al file PDF per aprirlo direttamente nel browser
    header("Location: " . $pdf_path);
    exit();  // Interrompi l'esecuzione successiva dello script

} else {
    echo "Nessun PDF trovato per l'anno di acquisto $anno_acquisto.";
}

// Chiudi la connessione
$stmt->close();
$conn->close();
?>