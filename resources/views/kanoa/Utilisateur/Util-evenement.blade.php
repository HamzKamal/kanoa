<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('UtilEvenement.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body style="background:#1A2535">
</body>
</html> 
@if(session('status'))
            <div class="alert alert-success">
              {{session('status')}}
            </div>
@endif
<div class="container">
    <div class="row"> 
    
    <div class="col-2 mx-auto">
<hr>    
<a href="/prof-evenement" class="btn btn-primary">Ajouter un evenement</a>
<hr>
</div>
</div>
</div>

<div class="container">
    <div class="row"> 
    <div class="col-9 mx-auto">
<h1 id="Nom" style="text-align:center;font-size:25px">EVENEMENT<h1>
</div>
</div>
</div>
<br>

@foreach($evenements as $evenement)
<div class="container">
    <div class="row"> 
        <div class="col-9 mx-auto">
            
          
            <img src="{{asset($evenement->image)}}" id="image">
            <div id="cadre">
            <h2 id="titre">{{$evenement->nom}}</h2>
            
            @if( str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT)  === '00' &&  str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT)  !== '00')
    <h2 id="date">
        {{$evenement->jourDebut}} {{$evenement->moisDebut}} &nbsp;-&nbsp;{{$evenement->jourFin}} {{$evenement->moisFin}} &nbsp; 
        {{ str_pad($evenement->heuresDebut, 2, '0', STR_PAD_LEFT) }}h - 
        {{ str_pad($evenement->heuresFin, 2, '0', STR_PAD_LEFT) }}h{{ str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT) }}
    </h2>
@elseif( str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT)  !== '00' &&  str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT)  === '00')
    <h2 id="date">
        {{$evenement->jourDebut}} {{$evenement->moisDebut}} &nbsp;-&nbsp;{{$evenement->jourFin}} {{$evenement->moisFin}} &nbsp; 
        {{ str_pad($evenement->heuresDebut, 2, '0', STR_PAD_LEFT) }}h{{ str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT) }} - 
        {{ str_pad($evenement->heuresFin, 2, '0', STR_PAD_LEFT) }}h
    </h2>
@elseif( str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT)  === '00' &&  str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT)  === '00')
    <h2 id="date">
        {{$evenement->jourDebut}} {{$evenement->moisDebut}} &nbsp;-&nbsp;{{$evenement->jourFin}} {{$evenement->moisFin}} &nbsp; 
        {{ str_pad($evenement->heuresDebut, 2, '0', STR_PAD_LEFT) }}h - 
        {{ str_pad($evenement->heuresFin, 2, '0', STR_PAD_LEFT) }}h
    </h2>
@elseif( str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT)  !== '00' &&  str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT)  !== '00')
    <h2 id="date">
        {{$evenement->jourDebut}} {{$evenement->moisDebut}} &nbsp;-&nbsp;{{$evenement->jourFin}} {{$evenement->moisFin}} &nbsp;
        {{ str_pad($evenement->heuresDebut, 2, '0', STR_PAD_LEFT) }}h{{ str_pad($evenement->minutesDebut, 2, '0', STR_PAD_LEFT) }} - 
        {{ str_pad($evenement->heuresFin, 2, '0', STR_PAD_LEFT) }}h{{ str_pad($evenement->minutesFin, 2, '0', STR_PAD_LEFT) }}
    </h2>
@endif

<h2 id="prix">{{$evenement->prix}}&nbsp;{{$evenement->Devise}}</h2>

            <div id="cadre2">
            <span><img id="adresse" src="{{asset('home.png')}}"><span id="local">{{$evenement->lieu}}<br><a  href="/delete-evenement/{{$evenement->id}}/{{$evenement->nom}}" class="btn btn-danger" style="margin-top:20px;">Supprimer</a></span></span>
           
         <form action="{{route('paypal')}}" method="POST" style="float:left; margin-right:20px;">
         @csrf
               <input type="number" name="price" value="{{$evenement->prix}}" style=display:none;>
                <button  type="submit" class="btn btn-primary" style="margin-top:20px;">Acheter</button>
            </form>    
        </div>
        

    </form>
            </div>

            


            </div>

    </div>
</div> 

<br>
<br>
<br>
<hr>

@endforeach


    <script>
    // Écoute l'événement avantunload pour détecter la navigation vers la page suivante
    window.addEventListener('beforeunload', function () {
        // Réinitialise les valeurs des champs du formulaire
        resetForm();
    });

    // Fonction pour réinitialiser les valeurs des champs du formulaire
    function resetForm() {
        // Obtient tous les éléments du formulaire
        var formElements = document.querySelectorAll('form input, form select, form textarea');

        // Parcourt tous les éléments et efface leurs valeurs
        formElements.forEach(function (element) {
            element.value = '';
        });
    }
    function clearHistory() {
    if (window.history && window.history.replaceState) {
        window.history.replaceState({}, document.title, window.location.href);
    }
}

// Appelle la fonction pour supprimer l'entrée d'historique lors du chargement de la page
window.addEventListener('load', clearHistory);
</script>