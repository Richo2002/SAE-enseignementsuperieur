<style>
    body {
        margin: 0px;
        padding: 0px;
        background-image: url("/img/backImg.png");
        background-size: cover;
        background-repeat: no-repeat;
        width: 100%;
    }

    .container {
        padding: 25px 0;
        max-width: 400px;
        margin: 25px auto;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        background-color: #ffffff;
    }

    .form-group {
        margin-bottom: 20px;
        text-align: center;
    }

    .btn {
        text-align: center;
    }

    .btn button {
        width: 150px;
        margin: 0 auto;
        padding: 15px;
        font-weight: bold;
        background-color: rgb(68, 173, 70);
        color: #ffffff;
        border: 1px solid #ffffff;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
    }

    input {
        border: 1px solid rgb(206, 213, 212);
        border-radius: 5px;
    }

    #forgotPasswordLink {
        display: block;
        text-align: center;
        color: rgb(34, 88, 166);
        font-size: 14px;
        margin: 0 auto;
        width: 35%;
        padding-bottom: 20px;
    }

    #forgotPasswordLink:hover {
        text-decoration: none;
        font-size: 16px;
    }

    .logo {
        display: block;
        margin: 0 auto;
        width: 100px;
        margin-bottom: 20px;
    }

    h2 {
        text-align: center;
        color: rgb(34, 88, 166);
    }

    .logo_head{
        width: 380px;
        height: 150px;
    }

    .Connexion_titre {
        font-size: 30px;
        color: rgb(34, 88, 166);
    }

    .form-control {
        height: 38px;
        width: 85%;
        align-self: center;
        margin: 0 auto;
        background-color: rgb(206, 213, 212);
        font-size: 15px;
    }

    .error-message
    {
        text-align: left;
        color: red;
        padding: 0 30px;
    }
</style>
<div class="container">
    <img src="/img/sceauBenin.png" class="logo_head" alt="Logo">

    <form id="logInForm" method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div class="form-group">
            Vous êtes sur le point de reinitialiser votre mot de <br>passe! Entrer et répéter à nouveau le mot de passe.
        </div>

        <div class="form-group">
            {{-- <x-input-label for="email" :value="__('Email : ')" /> --}}
            <input type="email" class="form-control" id="username" name="email" value={{ old('email', $request->email) }}
            required autofocus readonly autocomplete="username" style="cursor: not-allowed">
            <x-input-error :messages="$errors->get('email')" class="mt-2" style="list-style-type: none; text-decoration: none; text-align: center"/>
        </div>

        <div class="form-group">
            {{-- <x-input-label for="password" :value="__('Password : ')" /> --}}
            <input type="password" class="form-control" id="password" name="password"  placeholder="Saisissez le nouveau mot de passe" required autocomplete="new-password" >
            <div class="error-message" id="password-error"></div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" style="list-style-type: none; text-decoration: none; text-align: center"/>
        </div>

        <div class="form-group">
            {{-- <x-input-label for="password_confirmation" :value="__('Confirmer Password : ')" /> --}}
            <input type="password" class="form-control" id="passwordRepeat" name="password_confirmation" placeholder="Confirmer le mot de passe" required autocomplete="new-password">
            <div class="error-message" id="passwordRepeat-error"></div>
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" style="list-style-type: none; text-decoration: none; text-align: center"/>
        </div>
        <div class="btn">
            <button type="submit">Confirmer</button>
        </div>
    </form>
</div>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const passwordInput = document.getElementById('password');
        const passwordRepeatInput = document.getElementById('passwordRepeat');
        const submitButton = document.querySelector('button[type="submit"]');
        const passwordErrorDiv = document.getElementById('password-error');
        const passwordRepeatErrorDiv = document.getElementById('passwordRepeat-error');

        function validatePasswordComplexity() {
            const password = passwordInput.value;
            const passwordRepeat = passwordRepeatInput.value;

            // Vérifie la longueur minimale (8 caractères)
            const isLengthValid = password.length >= 8;

            // Vérifie la présence d'au moins une lettre majuscule, une lettre minuscule et un chiffre
            const isUppercaseLetter = /[A-Z]/.test(password);
            const isLowercaseLetter = /[a-z]/.test(password);
            const isDigit = /[0-9]/.test(password);

            // Afficher ou masquer les messages d'erreur en fonction des résultats de la validation
            passwordErrorDiv.textContent = isLengthValid && isUppercaseLetter && isLowercaseLetter && isDigit ? '' : 'Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.';
            passwordRepeatErrorDiv.textContent = password === passwordRepeat ? '' : 'Les mots de passe ne correspondent pas.';

            return isLengthValid && isUppercaseLetter && isLowercaseLetter && isDigit && password === passwordRepeat;
        }

        //Faire valider le mot de passe avant la soumission du formulaire
        submitButton.addEventListener('click', function(event) {
            if (!validatePasswordComplexity()) {
                event.preventDefault();
            }
        });
    });
</script>
