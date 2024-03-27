<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <link rel="icon" type="image/png" href="./presentation/img/logo.jpeg"> --}}
  <title>Système d'Archivage Electronique</title>
  <link href="">
  <style>
    body {
      margin: 0px;
      padding: 0px;
      background-image: url("./img/backImg.png");
      background-size: cover;
      background-repeat: no-repeat;
      width: 100%;
    }
    .container {
      max-width: 400px;
      margin: 100px auto;
      border-radius: 10px;
      box-shadow: 0 4px 6px rgba(0,0,0,0.1);
      background-color: #ffffff;
    }
    .form-group {
      margin-bottom: 20px;
      text-align: center;
    }
    .btn {
      text-align: center;
    }

    .btn button{
        width: 150px;
        margin : 0 auto ;
        padding: 15px;
        font-weight: bold;
        background-color:rgb(68, 173, 70);
        color:#ffffff;
        border: 1px solid #ffffff;
        border-radius: 10px;
        font-size: 18px;
        cursor: pointer;
    }

    input{
        border: 1px solid  rgb(206, 213, 212);
        border-radius: 5px;

    }

    .logo {
      display: block;
      margin: 0 auto;
      width: 100px;
      margin-bottom: 20px;
    }
    h2 {
      text-align: center;
      color:rgb(34,88,166);
    }

    .logo_head{
        width: 380px;
        height: 150px;
    }

    .Connexion_titre{
        font-size: 30px;
        color: rgb(34,88,166);
    }
    .form-control{
        height: 38px;
        width: 90%;
        align-self: center;
        margin: 0 auto;
        background-color:  rgb(206, 213, 212);
    }
    .btn{
        padding-bottom: 20px;
    }

    #loginLink {
      display: block;
      text-align: center;
      color: rgb(34,88,166);
      font-size: 14px;
      margin: 0 auto;
      width: 35%;
      padding-bottom: 20px;
    }
    #loginLink:hover {
      text-decoration: none;
      font-size: 16px;
    }
  </style>

</head>


<body>
  <div class="container">
    <img src="/img/sceauBenin.png" class="logo_head" alt="Logo">
    {{-- <div class="mb-4 text-sm text-gray-600" style="text-align: center; padding-bottom: 20px;">
        {{ __('Vous avez oublié votre mot de passe ? Pas de problème. Saississez votre email dans la
        zone ci-dessous et nous vous enverrons un lien de réinitialisation de mot de passe.') }}
    </div> --}}
    <form id="loginForm" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group">
        <input type="email" class="form-control" id="username" placeholder="Adresse email" name="email" :value="old('email')">
      </div>
      <x-auth-session-status  :status="session('status')" class="mt-2" style="list-style-type: none;
            text-decoration: none; text-align: justify; padding: 0 20px; padding-bottom: 15px; color: red;"/>

      <div class="btn">
         <button type="submit"> Confirmer </button>
      </div>
    </form><br/>
    <a href="login" id="loginLink">Se connecter</a>
  </div>
</body>
</html>
