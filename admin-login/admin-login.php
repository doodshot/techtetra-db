<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin-login</title>

    <link href="https://fonts.googleapis.com/css2?family=Dosis:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style-admin-login.css">
</head>
<body>
    <header class="header">
        <nav>
            <ul>
                <li><img id="logo-selmi" src="../asset/selmi-logo-mini.png" alt="logo-selmi"></li>
                <li>
                    <select id="languageSelector">
                        <option value="" disabled selected> 🌐 </option>
                        <option value="it">IT</option>
                        <option value="en">EN</option>
                        <option value="fr">FR</option>
                        <option value="es">ES</option>
                        <option value="ru">RU</option>
                        <option value="ch">CH</option>
                        <option value="dt">DT</option>
                        <option value="tk">TK</option>
                    </select>
                </li>
            </ul>
        </nav>
    </header>

    <main>
        <section id="login">
            <div class="login-container">
                <img src="../asset/selmi-family.png" alt="Immagine di login" class="login-image">
                <form id="login-form" method="POST" action="login.php">
                    <input type="text" id="username" name="username" placeholder="Username" required>
                    <input type="password" id="password" name="password" placeholder="Password" required>
                    <button type="submit" id="login-button">Login</button>
                </form>
                <a id="forgot-password" href="mailto:info@techtetra.com">Hai bisogno di assistenza?</a>
                <p id="error-message" class="<?php echo isset($_GET['error']) ? 'visible' : 'hidden'; ?>">
                    <?php
                        if (isset($_GET['error'])) {
                            echo htmlspecialchars($_GET['error']);
                        }
                    ?>
                </p>
            </div>
        </section>
    </main>

    <footer>
        <!-- Aggiungi qui eventuali informazioni per il footer -->
    </footer>

    <script src="admin-login.js"></script>
</body>
</html>