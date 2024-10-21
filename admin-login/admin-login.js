document.getElementById('languageSelector').addEventListener('change', function() {
        const language = this.value;
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const forgotPassword = document.getElementById('forgot-password');
        if (language === 'it') {
          localStorage.setItem('language', language);
          email.placeholder = 'Email';
          password.placeholder = 'Password';
          loginButton.textContent = 'Login';
          forgotPassword.textContent = 'Hai bisogno di assistenza?';
          errorMessage.textContent = 'Credenziali Sbagliate';
        } else if (language === 'en') {
          localStorage.setItem('language', language);
          email.placeholder = 'Email';
          password.placeholder = 'Password';
          loginButton.textContent = 'Login';
          forgotPassword.textContent = 'Do you need assistance?';
          errorMessage.textContent = 'Wrong Credentials';
        } else if (language === 'fr') {
        localStorage.setItem('language', language);
          email.placeholder = 'Email';
          password.placeholder = 'Password';
          loginButton.textContent = 'Login';
          forgotPassword.textContent = 'Avez-vous besoin d\'aide?';
          errorMessage.textContent = 'Mauvaises Credentials';
        }
        else if(language === 'es') {
        localStorage.setItem('language', language);
            email.placeholder = 'Email';
            password.placeholder = 'Password';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = '¿Necesitas ayuda?';
            errorMessage.textContent = 'Credenciales Incorrectas';
        }
        else if(language === 'ru')
        {
        localStorage.setItem('language', language);
            email.placeholder = 'электронная почта';
            password.placeholder = 'пароль';
            loginButton.textContent = 'авторизоваться';
            forgotPassword.textContent = 'Вам нужна помощь?';
            errorMessage.textContent = 'Неверные учетные данные';
        }
        else if(language === 'ch')
        {
        localStorage.setItem('language', language);
            email.placeholder = '电子邮件';
            password.placeholder = '密码';
            loginButton.textContent = '登录';
            forgotPassword.textContent = '你需要帮助吗？';
            errorMessage.textContent = '错误的凭证';
        }
        else if(language === 'dt')
        {
        localStorage.setItem('language', language);
            email.placeholder = 'Email';
            password.placeholder = 'Passwort';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = 'Benötigen Sie Hilfe?';
            errorMessage.textContent = 'Falsche Anmeldeinformationen';
        }
        else if(language === 'tk')
        {
        localStorage.setItem('language', language);
          email.placeholder = 'e-posta';
          password.placeholder = 'şifre';
          loginButton.textContent = 'Giriş';
          forgotPassword.textContent = 'Yardıma ihtiyacınız var mı?';
          errorMessage.textContent = 'Yanlış kimlik bilgileri';
        }
      });

    //funzione per il login
    const errorMessage = document.getElementById('error-message');
    
    // Nascondi il messaggio di errore all'inizio
    errorMessage.style.display = 'none';
    //funzione cambio lingua
    document.addEventListener('DOMContentLoaded', function() {
        const savedLanguage = localStorage.getItem('language');
        const email = document.getElementById('email');
        const password = document.getElementById('password');
        const loginButton = document.getElementById('login-button');
        const forgotPassword = document.getElementById('forgot-password');
        if (savedLanguage === 'it') {
            email.placeholder = 'Email';
            password.placeholder = 'Password';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = 'Hai bisogno di assistenza?';
            errorMessage.textContent = 'Credenziali Sbagliate';
            option.textContent = 'IT';
        } else if (savedLanguage === 'en') {
            email.placeholder = 'Email';
            password.placeholder = 'Password';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = 'Do you need assistance?';
            errorMessage.textContent = 'Wrong Credentials';
            option.textContent = 'EN';
        } else if (savedLanguage === 'fr') {
            email.placeholder = 'Email';
            password.placeholder = 'Password';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = 'Avez-vous besoin d\'aide?';
            errorMessage.textContent = 'Mauvaises Credentials';
            option.textContent = 'FR';
        }
        else if(savedLanguage === 'es') {
            email.placeholder = 'Email';
            password.placeholder = 'Password';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = '¿Necesitas ayuda?';
            errorMessage.textContent = 'Credenciales Incorrectas';
            option.textContent = 'ES';
            }
        else if(savedLanguage === 'ru')
        {
            email.placeholder = 'электронная почта';
            password.placeholder = 'пароль';
            loginButton.textContent = 'авторизоваться';
            forgotPassword.textContent = 'Вам нужна помощь?';
            errorMessage.textContent = 'Неверные учетные данные';
            option.textContent = 'RU';
        }
        else if(savedLanguage === 'ch')
        {
            email.placeholder = '电子邮件';
            password.placeholder = '密码';
            loginButton.textContent = '登录';
            forgotPassword.textContent = '你需要帮助吗？';
            errorMessage.textContent = '错误的凭证';
            option.textContent = 'CH';
        }
        else if(savedLanguage === 'dt')
        {
        email.placeholder = 'Email';
            password.placeholder = 'Passwort';
            loginButton.textContent = 'Login';
            forgotPassword.textContent = 'Benötigen Sie Hilfe?';
            errorMessage.textContent = 'Falsche Anmeldeinformationen';
            option.textContent = 'DT';
        }
        else if(savedLanguage === 'tk')
        {
            email.placeholder = 'e-posta';
            password.placeholder = 'şifre';
            loginButton.textContent = 'Giriş';
            forgotPassword.textContent = 'Yardıma ihtiyacınız var mı?';
            errorMessage.textContent = 'Yanlış kimlik bilgileri';
            option.textContent = 'TK';
        }
    });