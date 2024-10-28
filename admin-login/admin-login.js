document.getElementById('languageSelector').addEventListener('change', function() {
        const language = this.value;
        const email = document.getElementById('username');
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
    
    document.addEventListener('DOMContentLoaded', function() {
        const errorMessage = document.getElementById('error-message');
    
        // Imposta il messaggio di errore in base alla lingua, se presente
        if (errorMessage && errorMessage.textContent.trim() !== "") {
            errorMessage.classList.remove('hidden');
            const savedLanguage = localStorage.getItem('language');
            const translationMap = {
                it: "Credenziali Sbagliate",
                en: "Wrong Credentials",
                fr: "Mauvaises Credentials",
                es: "Credenciales Incorrectas",
                ru: "Неверные учетные данные",
                ch: "错误的凭证",
                dt: "Falsche Anmeldeinformationen",
                tk: "Yanlış kimlik bilgileri"
            };
            // Imposta il testo dell'errore in base alla lingua salvata
            errorMessage.textContent = translationMap[savedLanguage] || errorMessage.textContent;
        }
    });