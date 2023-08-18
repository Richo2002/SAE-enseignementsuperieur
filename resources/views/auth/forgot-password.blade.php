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
      min-height: 320px;
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
  </style>

</head>


<body>
  <div class="container">
    <img src="/img/sceauBenin.png" class="logo_head" alt="logo">
    {{-- <div class="mb-4 text-sm text-gray-600">
        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
    </div> --}}
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form id="loginForm" method="POST" action="{{ route('password.email') }}">
      @csrf
      <div class="form-group">
        <input type="email" class="form-control" id="username" placeholder="Adresse email" name="email" :value="old('email')">
      </div>

      <div class="btn">
         <button type="submit"> Confirmer </button>
      </div>
    </form>
  </div>
</body>
</html>
