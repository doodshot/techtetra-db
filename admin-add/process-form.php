<?php
// Connessione al database
$conn = new mysqli('localhost', 'root', '', 'techtetra');

// Controllo della connessione
if ($conn->connect_error) {
    die("Connessione fallita: " . $conn->connect_error);
}
else
{
    echo "Connessione riuscita";
}

// Controlla se il modulo è stato inviato
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    // Recupera i dati inviati dal form
    $title = $_POST['title'];
    $anno = $_POST['anno'];

    // Cartella di destinazione per i file caricati
    $uploadDir = '../uploads/';
    
    // Gestione del file PDF in italiano
    $pdf_it = $uploadDir . basename($_FILES['pdf_it']['name']);
    echo "$pdf_it";
    move_uploaded_file($_FILES['pdf_it']['tmp_name'], $pdf_it);
    
    // Gestione del file PDF in inglese
    $pdf_en = $uploadDir . basename($_FILES['pdf_en']['name']);
    echo "$pdf_en";
    move_uploaded_file($_FILES['pdf_en']['tmp_name'], $pdf_en);

    // Query SQL per inserire il PDF nel database
    $stmt = $conn->prepare("INSERT INTO pdf (title, anno, file_path_it, file_path_en) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $title, $anno, $pdf_it, $pdf_en);
    
    // Esecuzione della query
    if ($stmt->execute()) {
        echo "PDF aggiunto con successo!";
    } else {
        echo "Errore durante l'aggiunta: " . $stmt->error;
    }

    // Chiudi la connessione
    $stmt->close();
    $conn->close();
}
?>
 <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <p> ciao </p>
    </body>
    </html>