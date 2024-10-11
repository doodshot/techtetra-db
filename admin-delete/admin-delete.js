function deleteFile(fileId, fileType) {
    if (confirm("Sei sicuro di voler cancellare questo file?")) {
        // Effettua una richiesta AJAX per eliminare il file
        var xhr = new XMLHttpRequest();
        xhr.open("POST", "delete-file.php", true); // richiamo funzione delete.php per fare la conn al Db e fare la query DELETE
        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                alert(xhr.responseText);
                // Rimuove l'elemento corrispondente dalla lista
                if (fileType === 'it') {
                    document.querySelector('#file' + fileId + ' .file-icon').parentNode.remove();
                } else if (fileType === 'en') {
                    document.querySelector('#file' + fileId + ' br').nextSibling.remove();
                    document.querySelector('#file' + fileId + ' br').remove();
                }
            }
        };
        xhr.send("id=" + fileId + "&fileType=" + fileType);
    }
}