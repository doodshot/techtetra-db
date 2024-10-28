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
                    var fileElement = document.getElementById('file' + fileId);
                    if(fileElement) {
                        fileElement.parentNode.removeChild(fileElement);
                    }
                    location.reload();
                } else {
                    alert("Errore durante l'eliminazione del file.");
                }
            }
        };
        // Invia la richiesta con l'ID del file
        xhr.send("id=" + fileId);
    }
}

    //funzione cambio lingua
    document.addEventListener('DOMContentLoaded', function() {
        const savedLanguage = localStorage.getItem('language');
        const noFile = document.getElementById('text');
        if (savedLanguage === 'it') {
            noFile.textContent = 'File non trovato';
            option.textContent = 'IT';
        } else if (savedLanguage === 'en') {
            noFile.textContent = 'File not found';
            option.textContent = 'EN';
        } else if (savedLanguage === 'fr') {
            noFile.textContent = 'Fichier non trouvé';
            option.textContent = 'FR';
        } else if (savedLanguage === 'es') {
            noFile.textContent = 'Archivo no encontrado';
            option.textContent = 'ES';
        } else if (savedLanguage === 'ru') {
            noFile.textContent = 'Файл не найден';
            option.textContent = 'RU';
        } else if (savedLanguage === 'ch') {
            noFile.textContent = '文件未找到';
            option.textContent = 'CH';
        } else if (savedLanguage === 'dt') {
            noFile.textContent = 'Datei nicht gefunden';
            option.textContent = 'DT';
        } else if (savedLanguage === 'tk') {
            noFile.textContent = 'Dosya bulunamadı';
            option.textContent = 'TK';
        }
    });