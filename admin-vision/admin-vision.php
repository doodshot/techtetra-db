<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="admin-vision.css">
    <title>Visualizza</title>
</head>
<body>
    <header>
        <a href="../admin-file-management/admin-file-management.html"> <img src="../asset/casetta.png" id="home" alt="home"></a> 
          <select id="languageSelector">
              <option value="" disabled selected> 🌐 </option>
              <option value="it"> IT </option>
              <option value="en"> EN </option>
              <option value="fr"> FR </option>
              <option value="dt"> DT </option>
              <option value="es"> ES </option>
              <option value="ch"> CH </option>
              <option value="ru"> RU </option>
              <option value="tk"> TK </option>
          </select>
      </header>
      <div class="title">
          <h1>Visualizza i File</h1>
      </div>
      <div class="file-list"></div>
        <?php
        // Connessione al database
        $conn = new mysqli('localhost', 'root', '', 'techtetra');

        // Controllo della connessione
        if ($conn->connect_error) {
            die("Connessione fallita: " . $conn->connect_error);
        }

        // Query per ottenere i titoli dei file PDF in italiano e inglese
        $sql = "SELECT title, file_path_it, file_path_en FROM pdf";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostra i risultati in una tabella
            echo "<table>";
            echo "<tr><th>Title</th><th>File PDF Italiano</th><th>File PDF Inglese</th></tr>";
            while($row = $result->fetch_assoc()) {
                // Assumi che il file_path_it e file_path_en già contengano il percorso corretto
                $file_it = $row['file_path_it'];
                $file_en = $row['file_path_en'];
            
                echo "<tr>";
                echo "<td>" . $row['title'] . "</td>";
                echo "<td><a href='" . $file_it . "' download>Scarica PDF IT</a></td>";
                echo "<td><a href='" . $file_en . "' download>Download PDF EN</a></td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Nessun file trovato.";
        }

        // Chiudi la connessione
        $conn->close();
        ?>
    </div>
      <script src="admin-modifyed.js"></script>
</body>
</html>