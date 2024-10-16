function deleteFile(fileId) {
    if (confirm('Sei sicuro di voler eliminare questo file?')) {
        // Fai una richiesta AJAX per eliminare il file dal database
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-file.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Se la risposta del server indica che il file è stato eliminato correttamente
                if (xhr.responseText == "success") {
                    // Rimuovi l'elemento dal DOM
                    var fileElement = document.getElementById('file' + fileId);
                    fileElement.parentNode.removeChild(fileElement);
                } else {
                    alert("Errore durante l'eliminazione del file.");
                }
            }
        };
        // Invia la richiesta con l'ID del file
        xhr.send("id=" + fileId);
    }
}
