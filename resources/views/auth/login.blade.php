<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous"> --}}
  <title>Système d'Archivage Electronique</title>
  <link href="">
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

      max-width: 400px;
      min-height: 320px;
      margin: 100px auto;
      /*padding: 20px;*/
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

    #forgotPasswordLink {
      display: block;
      text-align: center;
      color: rgb(34,88,166);
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

    .alert{
        color: red;
        text-align: start;
        margin-left: 20px;
        margin-top: 5px;
    }
  </style>

</head>
<body>
  <div class="container">

    <img src="/img/sceauBenin.png" class="logo_head" alt="logo">

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form id="loginForm" method="POST" action="{{ route('login') }}">
        @csrf
      <div class="form-group">
        <input type="email" class="form-control" id="username" placeholder="Adresse email" :value="__('Email')" name="email" required>
        @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
      </div>

      <div class="form-group">
        <input type="password" class="form-control" id="password" placeholder="Mot de passe" name="password" required>
        @error('password')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
      </div>

      <div class="btn mx-auto">
         <button type="submit" >Se connecter</button>
      </div>
      </form>
      <br/>
      <a href="forgot-password" id="forgotPasswordLink">Mot de passe oublié ?</a>
    </form>
  </div>
  {{-- <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script> --}}
</body>
</html>
