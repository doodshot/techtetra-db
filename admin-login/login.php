<?php
// Includi il file di configurazione per connetterti al database
$servername = "localhost";
$db_username = "root"; // Il tuo username del database
$db_password = ""; // La tua password del database
$dbname = "techtetra"; // Nome del tuo database

// Creare la connessione
$conn = new mysqli($servername, $db_username, $db_password, $dbname);

// Controllare la connessione
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
session_start(); // Inizia la sessione

$error_message = ""; // Variabile per il messaggio di errore

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ottieni i dati dal form di login
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Prepara la query per verificare l'utente nel database
    $query = "SELECT * FROM users WHERE username = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        // L'utente è stato trovato, ora verifichiamo la password
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        // Verifica la password usando password_verify
        if (password_verify($password, $hashedPassword)) {
            // La password è corretta, l'utente è autenticato
            $_SESSION['username'] = $username; // Salva l'username nella sessione
            header("Location: ../admin-file-management/admin-file-management.html"); // Reindirizza alla pagina successiva
            exit();
        } else {
            // Password errata
            $error_message = "Credenziali sbagliate, Riprova.";
        }
    } else {
        // Nessun utente trovato con questo username
        $error_message = "Credenziali sbagliate, Riprova.";
    }

    // Se c'è un messaggio di errore, reindirizza con il messaggio
    if ($error_message) {
        header("Location: error-page.php?error=" . urlencode($error_message));
        exit();
    }
}
?>