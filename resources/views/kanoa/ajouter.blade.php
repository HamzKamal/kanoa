<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('kanoa.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<section id="authentification">
<body style="background:#0D131C;">
    <h1 style="color:white" >   BIENVENUE ️💙🎉  </h1>
    <div class="container text-center">
          <div class="row">
            <div class="col-4 mx-auto">
    @if(session('status'))
            <div class="alert alert-success">
              {{session('status')}}
            </div>
            @endif
    <br>

</div>
</div>    
</div>

    <form action="/ajouter/traitement" method="POST">
        @csrf
        <div id="Email">
        <input type="email" placeholder="Email" name="Email" id="Email" autocomplete="off"  value="{{ old('Email') }}" ></div>
        @error('Email')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">{{$message}}</li>
       @enderror
        <div class="correction">
        <div class="center-container">
        <div id="Prenom">
        <input type="text" placeholder="Prenom" name="Prenom" autocomplete="off" id="Prenom" value="{{ old('Prenom') }}" pattern="^[a-zA-Z ]+$"  inputmode="none" ></div>
        <div id="Nom">
        <input type="text" placeholder="Nom" name="Nom" autocomplete="off" id="Nom" value="{{ old('Nom') }}" pattern="^[a-zA-Z ]+$"  inputmode="none" ></div>

        </div>
    </div>
    @error('Prenom')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">Prenom est obligatoire</li>
       @enderror
       @error('Nom')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">Nom est obligatoire</li>
       @enderror

    <div id="password3">
        <span><input type="text" name="Naissance" id="Naissance" name="Naissance"  placeholder="Date de naissance" value="{{ old('Naissance') }}" readonly>
        <input type="date" name="date" id="Date2" style="background:url({{asset('Date.png')}});" >
    </span>
    </div>
    
        
        
    </div>
    @error('Naissance')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">Date de naissance est obligatoire</li>
    @enderror
    @error('nombre')
    <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">Il me semble une erreur au niveau date de naissance</li>
    @enderror
    <div id="password2">
        <span><input type="password" id="password" name="password" placeholder="Mot de passe" value="{{ old('password') }}">
        <button type="button" id="togglePassword"><img src="{{asset('yeuxOuvert.png')}}"></button></span>
    </div>
    <div id="passwordText2">
        <span><input type="text" id="passwordText" name="passwordText" placeholder="Mot de passe" value="{{old('passwordText') }}" >
        <button type="button" id="togglePassword2"><img src="{{asset('yeuxFermer.png')}}"></button></span>
    </div>

    
    
    @error('password_confirmation')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">un mot de passe doit contenir au moins 6 caractère avec 1 chiffre, 1 majuscule et 1 minuscule.</li>
       @enderror
    
       <div id="password_confirmation2">
        <span><input type="password" id="password_confirmation" name="password_confirmation" placeholder="Confirmer le Mot de passe" >
        <button type="button" id="togglePassword3"><img src="{{asset('yeuxOuvert.png')}}"></button></span>
    </div>
    <div id="password_confirmationText2">
        <span><input type="text" id="password_confirmationText" name="password_confirmationText" placeholder="Confirmer le mot de passe" >
        <button type="button" id="togglePassword4"><img src="{{asset('yeuxFermer.png')}}"></button></span>
    </div>
    <input type="number" id="nombre" name="nombre" style="display:none" >
    @error('password')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item">Le mots de passe n'est pas authentique</li>
       @enderror
    <div class="container text-center">
          <div class="row">
            <div class="col-4 mx-auto">
</div>
</div>
</div>
    <div id="check">
        <span id="ecriture"><input type="checkbox" name="accept_term" id="accept_term" ><span style="color:rgba(0,0,0,0)">.</span> j'accepte la <a href="#" style="color:#0063FF">politique de confidentialité</a></span>
    </div>
    @error('accept_term')
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center">Vous devez acceptez la politique de confidentialité</li>
    @enderror
    <div id="Submit">
        <input type="submit"  name="Submit" id="Submit" name="Submit" Value="VALIDER">
    </div>
    <div id="check2">
        <span id="ecriture"> <span style="color:rgba(0,0,0,0)">......</span> you already have a account. <a href="/authentification" style="color:#0063FF">Login</a></span>
    </div>
    <script>
     
    const passwordInput = document.getElementById('password');
    const passwordInputText = document.getElementById('passwordText');
    const password2=document.getElementById('password2');
    const passwordText2 = document.getElementById('passwordText2');
    let toggleButton  = document.getElementById('togglePassword');
    let toggleButton2 = document.getElementById('togglePassword2');
    let toggleButton3 = document.getElementById('togglePassword3');
    let toggleButton4 = document.getElementById('togglePassword4');
    const password_confirmation = document.getElementById('password_confirmation');
    const password_confirmationText = document.getElementById('password_confirmationText');
    const password_confirmation2=document.getElementById('password_confirmation2');
    const password_confirmationText2 = document.getElementById('password_confirmationText2');
    let Naissance=document.getElementById('Naissance');
    let Submit=document.getElementById('Submit');
    let date=document.getElementById('Date2');
    let nombre=document.getElementById('nombre');
    date.addEventListener('input', function() {
        Naissance.value = date.value[8]+date.value[9]+'/'+date.value[5]+date.value[6]+'/'+date.value[0]+date.value[1]+date.value[2]+date.value[3];
        var dateText = Naissance.value;

// Divisez la date en ses composantes (jour, mois, année)
var components = dateText.split("/");
var jour = parseInt(components[0], 10); // Convertir en nombre entier
var mois = parseInt(components[1], 10); // Convertir en nombre entier
var annee = parseInt(components[2], 10); // Convertir en nombre entier

// Créez un objet Date en utilisant les composantes
var date3 = new Date(annee, mois - 1, jour); // Mois - 1 car les mois dans Date commencent à 0 (janvier)
var date4 = new Date(); // Crée un nouvel objet Date avec la date et l'heure actuelles

var timestamp2 = date4.getTime();
console.log(timestamp2);
// Obtenez le timestamp Unix (nombre entier)
var timestamp = date3.getTime();
console.log(timestamp);
console.log("Date en nombre entier : " + timestamp);
if(Naissance.value=="")
{
    nombre.value=0;
}
else if(timestamp2>=timestamp)
{
nombre.value=0;
console.log('cest vrai');
}
else{
nombre.value=1;
console.log('cest faux');
}
 });
    

    toggleButton.addEventListener('click', function () {
        password2.style.display="none";
        passwordText2.style.display="flex";
        passwordInputText.value=passwordInput.value;
    });
    Submit.addEventListener('click', function () {
        var dateText = Naissance.value;

// Divisez la date en ses composantes (jour, mois, année)
var components = dateText.split("/");
var jour = parseInt(components[0], 10); // Convertir en nombre entier
var mois = parseInt(components[1], 10); // Convertir en nombre entier
var annee = parseInt(components[2], 10); // Convertir en nombre entier

// Créez un objet Date en utilisant les composantes
var date3 = new Date(annee, mois - 1, jour); // Mois - 1 car les mois dans Date commencent à 0 (janvier)
var date4 = new Date(); // Crée un nouvel objet Date avec la date et l'heure actuelles

var timestamp2 = date4.getTime();
console.log(timestamp2);
// Obtenez le timestamp Unix (nombre entier)
var timestamp = date3.getTime();
console.log(timestamp);
console.log("Date en nombre entier : " + timestamp);

if(Naissance.value=="")
{
nombre.value=0;
}
else if(timestamp2>=timestamp)
{
nombre.value=0;
console.log('cest vrai');
}
else{
nombre.value=1;
console.log('cest faux');
}
     
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
    toggleButton3.addEventListener('click', function () {
        password_confirmation2.style.display="none";
        password_confirmationText2.style.display="flex";
        password_confirmationText.value=password_confirmation.value;
        console.log('1');
    });
    toggleButton4.addEventListener('click', function () {
        password_confirmation2.style.display="flex";
        password_confirmationText2.style.display="none";
        password_confirmation.value=password_confirmationText.value;
        console.log('2');
    });
    password_confirmation.addEventListener('input', function() {
        password_confirmationText.value = password_confirmation.value;
    });
    password_confirmationText.addEventListener('input', function() {
        password_confirmation.value = password_confirmationText.value;
    });

    document.addEventListener('DOMContentLoaded', function() {
        const nomInput = document.getElementById('Nom');
        const prenomInput = document.getElementById('Prenom');
        nomInput.addEventListener('input', function(event) {
            const inputText = event.target.value;
            event.target.value = inputText.replace(/[^a-zA-Z ]/g, '');
            inputText = inputText.replace(/^\s+/g, '');
        });
        
        prenomInput.addEventListener('input', function(event) {
            const inputText = event.target.value;
            event.target.value = inputText.replace(/[^a-zA-Z ]/g, '');
            inputText = inputText.replace(/^\s+/g, '');
        });

    });

</script>



        
    </div>
    