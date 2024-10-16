<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Error Page</title>
    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-admin-login.css">
</head>
<body>

    <div class="modal">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <p id="errorMessage">
                <?php
                if (isset($_GET['error'])) {
                    echo htmlspecialchars($_GET['error']);
                } else {
                    echo "Si è verificato un errore.";
                }
                ?>
            </p>
        </div>
    </div>

    <script>
        document.getElementById('closeModal').onclick = function() {
            window.location.href = 'admin-login.php'; // Torna alla pagina di login
        }
    </script>

    <style>
        /* Stile del pop-up */
        #errorMessage{
            color: red;
            font-weight: 34px;
        }

        .modal {
            display: block; /* Mostra il pop-up */
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: white;
            margin: 15% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 400px;
            text-align: center;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 42px;
            font-weight: bold;
            color: red;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>

</body>
</html>