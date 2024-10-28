let fileIdToDelete = null;

function deleteFile(fileId) {
    // Salva l'ID del file e mostra la finestra modale
    fileIdToDelete = fileId;
    document.getElementById("deleteModal").style.display = "flex";
}

// Gestore per il pulsante "Conferma" nella modale
document.getElementById("confirmDelete").addEventListener("click", function () {
    if (fileIdToDelete !== null) {
        // Effettua la richiesta AJAX per eliminare il file
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-file.php", true);
        xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

        xhr.onreadystatechange = function () {
            if (xhr.readyState == 4 && xhr.status == 200) {
                if (xhr.responseText === "success") {
                    // Rimuovi l'elemento dal DOM e ricarica la pagina
                    var fileElement = document.getElementById('file' + fileIdToDelete);
                    if (fileElement) {
                        fileElement.parentNode.removeChild(fileElement);
                    }
                    window.location.href = "../admin-delete-selection/admin-delete-selection.html"
                } else {
                    alert("Errore durante l'eliminazione del file.");
                }
            }
        };
        xhr.send("id=" + fileIdToDelete);
    }
    // Nascondi la finestra modale
    document.getElementById("deleteModal").style.display = "none";
    fileIdToDelete = null;
});

// annulla gay
document.getElementById("cancelDelete").addEventListener("click", function () {
    document.getElementById("deleteModal").style.display = "none";
    fileIdToDelete = null;
});






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