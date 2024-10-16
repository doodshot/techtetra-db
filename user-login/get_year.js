document.addEventListener("DOMContentLoaded", function() {
    // Recupera gli anni dal database
    fetch('get_years.php')
        .then(response => response.json())
        .then(data => {
            const select = document.getElementById('anno-select');

            data.forEach(year => {
                const option = document.createElement('option');
                option.value = year;
                option.textContent = year;
                select.appendChild(option);
            });
        })
        .catch(error => console.error('Errore nel recupero degli anni:', error));
});