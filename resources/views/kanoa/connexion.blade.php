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
<body>


<h1 id="text1">Bonjour {{ Auth::user()->Nom }} {{ Auth::user()->Prenom }}</h1>

<a class="btn btn-danger" href="{{ route('signout') }}" id="submit">Logout</a>
<a class="btn btn-danger" id="profile" href="/connexion">Profile</a>
<a class="btn btn-danger" id="kanoa"  href="/connexion">kanoa</a>
<h2 id="text2" style="display:none">Vous etes deconnecter veuillez vous derigez vers la page d'authentification</h2>
<script>
let submit=document.getElementById('submit');
let profile=document.getElementById('profile');
let kanoa=document.getElementById('kanoa');
let text1=document.getElementById('text1');
let text2=document.getElementById('text2');
submit.addEventListener('click', function () {
         submit.style.display="none";
         profile.style.display="none";
         kanoa.style.display="none";
         text1.style.display="none";
         text2.style.display="block";  
     });
</script>
</body>
</html>           