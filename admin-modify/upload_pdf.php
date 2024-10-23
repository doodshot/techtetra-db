<?php
$uploadDirectory = '../uploads/';
$response = ['success' => false, 'message' => 'Errore sconosciuto'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_FILES['pdfItalian']) && isset($_FILES['pdfEnglish']) && isset($_POST['fileId'])) {
        
        $italianPdf = $_FILES['pdfItalian'];
        $englishPdf = $_FILES['pdfEnglish'];
        $fileId = intval($_POST['fileId']);  // Assicurati che l'ID sia un numero intero

        // Verifica eventuali errori di upload
        if ($italianPdf['error'] !== UPLOAD_ERR_OK) {
            die('Errore PDF Italiano: ' . $italianPdf['error']);
        }
        if ($englishPdf['error'] !== UPLOAD_ERR_OK) {
            die('Errore PDF Inglese: ' . $englishPdf['error']);
        }

        $italianPdfName = $uploadDirectory . time() . '_italian_' . basename($italianPdf['name']);
        $englishPdfName = $uploadDirectory . time() . '_english_' . basename($englishPdf['name']);

        // Sposta i file caricati nella directory desiderata
        if (move_uploaded_file($italianPdf['tmp_name'], $italianPdfName) && move_uploaded_file($englishPdf['tmp_name'], $englishPdfName)) {
            
            // Aggiorna il database con i nuovi percorsi PDF
            if (update_pdf_in_db( $fileId, $italianPdfName, $englishPdfName)) {
                header('Location: ../admin-modified-selection/admin-modified-selection.html');
                exit;
            } else {
                echo 'Errore durante l\'aggiornamento del database.';
            }
        } else {
            echo 'Errore durante il caricamento dei file.';
        }
    } else {
        echo 'Dati mancanti (PDF o ID file).';
    }
}

function update_pdf_in_db($fileId, $italianPdfPath, $englishPdfPath) {
    $host = 'localhost';
    $dbname = 'techtetra';
    $username = 'root';
    $password = '';

    $conn = new mysqli($host, $username, $password, $dbname);
    if ($conn->connect_error) {
        die('Connessione al database fallita: ' . $conn->connect_error);
    }

    // Aggiorna i percorsi dei PDF nel database
    $sql = "UPDATE pdf SET file_path_it = ?, file_path_en = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('ssi', $italianPdfPath, $englishPdfPath, $fileId);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
    $stmt->close();
    $conn->close();
}
?>