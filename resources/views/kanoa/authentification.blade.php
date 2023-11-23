<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('authentification.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<section id="authentification">
<body style="background:#0D131C;">
  
    <div class="container text-center">
          <div class="row">
            <div class="col-4 mx-auto">
            <img src="{{asset('logo.png')}}" style="width: 90px; height: 90px;flex-shrink: 0;background:none; cover: no-repeat; display:flex" id="logo">
            <img src="{{asset('blanc.png')}}" style="width: 179px; height: 36px;flex-shrink: 0;background:none; cover: no-repeat; display:flex" id="blanc">
  
    <br>

</div>
</div>    
</div>
@guest
    <form action="/traitement" method="POST">
        @csrf

        <div id="Email2">
        <input type="text" placeholder="Email" name="Email" id="Email" autocomplete="off" value="" ></div>

       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item" id="text1">{{$messageA}}</li>
       @error('Email')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item" id="text2">{{$message}}</li>
       @enderror
    </div>

    <div id="password2">
        <span><input type="password" id="password" name="password" placeholder="Mot de passe" value="" >
        <button type="button" id="togglePassword"><img src="{{asset('yeuxOuvert.png')}}"></button></span>
    </div>
    <div id="passwordText2">
        <span><input type="text" id="passwordText" name="passwordText" placeholder="Mot de passe" value="" >
        <button type="button" id="togglePassword2"><img src="{{asset('yeuxFermer.png')}}"></button></span>
    </div>
    @error('password')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item" id="text3">Le mots de passe est obligatoire</li>
       @enderror
    <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item" id="text4">{{$messageB}}</li>
    <div id="verification">
    <div id="check">
        <span id="ecriture"><input type="checkbox" id="accept_term" name="accept_term"><span style="color:rgba(0,0,0,0)">.</span> Remember me</a></span>
    </div>
 
    <div id="Submit">
        <input type="submit"  name="Submit2" id="Submit2" name="Submit2" Value="CONTINUEZ" >
    </div>
    <div id="check2">
        <span id="ecriture"> <span style="color:rgba(0,0,0,0)">......</span> New on the plateforme ? <a href="/ajouter" style="color:#0063FF">Create on account</a></span>
    </div>
</div>
</form>
@endguest
<div id="Bienvenue">
@Auth
<form action="/connexion" method="GET">

<div id="Submit">
        <input type="submit"  name="a" id="a" name="a" Value="BIENVENUE"  >
</div>
@endAuth
</div>

</form>

<form action="/connexion" method="GET">

<div id="Submit4">
        <input type="submit"  name="a" id="a" name="a" Value="BIENVENUE"  >
</div>

</div>

</form>

    <script>
     
     const passwordInput = document.getElementById('password');
     const passwordInputText = document.getElementById('passwordText');
     const password2=document.getElementById('password2');
     const passwordText2 = document.getElementById('passwordText2');
     let toggleButton  = document.getElementById('togglePassword');
     let toggleButton2 = document.getElementById('togglePassword2');
     let Submit2=document.getElementById('Submit2');
     let email=document.getElementById('Email2');
     let text1=document.getElementById('text1');
     let text2=document.getElementById('text2');
     let text3=document.getElementById('text3');
     let text4=document.getElementById('text4');
     let verification=document.getElementById('verification');
     let Bienvenue=document.getElementById('Bienvenue');
     let Submit3=document.getElementById('a');
     let Submit4=document.getElementById('Submit4');
     Submit4.style.display="none";
    
    
    
    
  
  
        
     Submit2.addEventListener('click', function () {
         Submit4.style.display="block";
         password2.style.display="none";
         passwordText2.style.display="none";
         passwordInput.style.display="none";
         passwordInputText.style.display="none";
         email.style.display="none";  
         verification.style.display="none";
         text1.style.display="none";
         text3.style.display="none";
         text4.style.display="none"; 
        text2.style.display="none";
     });
     
     
     
     
     toggleButton.addEventListener('click', function () {
         password2.style.display="none";
         passwordText2.style.display="flex";
         passwordInputText.value=passwordInput.value;
     });
   
     toggleButton2.addEventListener('click', function () {
         password2.style.display="flex";
         passwordText2.style.display="none";
         passwordInput.value=passwordInputText.value;
     });
     passwordInput.addEventListener('input', function() {
         passwordInputText.value = passwordInput.value;
     });
     passwordInputText.addEventListener('input', function() {
         passwordInput.value = passwordInputText.value;
     });

    
   
 </script>
 
 
 
         
     </div>
     
    