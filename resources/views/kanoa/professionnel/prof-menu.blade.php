<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
<meta http-equiv="pragma" content="no-cache">
<meta http-equiv="expires" content="0">
</head>
<body>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
 @if(session('error'))
       <li style="color:red;font-weight:bold; list-style-type:none;text-align:center" class="custom-error-item" id="text3">{{ session('error') }}</li>
       @endif
<div class="container mt-5">
    <div class="row">
        <div class="col-9 mx-auto ">
        <table class="table table-bordered " border="none";>
         <form action="/afficheMenu" method="post" enctype="multipart/form-data" id="myForm">
          @csrf
          <input id="message" name="message" style="display:none;">
          <tr>
      <th scope="col">Catégorie:</th>
      <td><select name="Categorie">
    @foreach ($categories as $categorie)
        <option value="{{ $categorie->noms_categorie }}">{{$categorie->noms_categorie}}</option>
    @endforeach
</select>
</td>
</tr>
    <tr>

    <th scope="col"><label for="image">"Photo de l'entreprise:</th>
    <th id="affichage12" scope="col"><div id="fileContainer">
    <label for="image" id="customUploadBtn">
    <span id="customUploadBtnLabel">Télécharger une image</span>
    <input type="file" id="image" name="Image" accept="image/*" onclick=""></label>
</div>
<p id="fileInfo">Types de fichiers autorisés: &nbsp;jpg, jpeg, png, gif (Taille maximale : 2,048 Mo.)</p>
 
<th id="affichage13"><span id="selectedFileName"> </span></th>
</tr>


    <tr>
      <th scope="col"> <label for="Titre" >Titre</label></th>
      <td scope="col"><input type="text" id="Titre" name="Titre"  style="width:20%;"></td>
    </tr>
    <tr>
      <th scope="col">Prix</th>
      <td scope="col"><input type="text" id="prix" name="Prix"  style="width:40% " onkeydown="return onlyPositiveNumberWithOneComma(event)"></td>
    </tr>
   
    <tr>
      <th scope="col">Devise:</th>
      <td scope="col"><select name="Devise">
        <option value="MAD">MAD</option>
        <option value="€">€</option>
</select></td>
    </tr>
<tr>
      <th scope="col"></th>
      <th scope="col"> <input type="submit" value="Soumettre" id="envoyerButton" ></th>
    </tr>

    </form> 
</table>
    
    
</div>
</div>
</div>
<script>

inputMontant = document.getElementById('prix');
inputMontant.addEventListener('input', function () {
    // Garder uniquement les chiffres, le signe moins au début ou une virgule
    this.value = this.value.replace(/[^\d,-]/g, '');

    // Limiter à un seul zéro avant la virgule
    this.value = this.value.replace(/^(-?)(0{2,})(\d*\.?\d*)/, '$1$3');

    // Supprimer les points ou virgules redondants
    var index = this.value.indexOf('.');
    if (index !== -1) {
        this.value = this.value.substring(0, index + 1) + this.value.substring(index + 1).replace(/[.,]/g, '');
    }

    // Supprimer les signes moins après le premier caractère
    var minusIndex = this.value.indexOf('-');
    if (minusIndex > 0) {
        this.value = this.value.substring(0, minusIndex) + this.value.substring(minusIndex + 1);
    }
});

window.addEventListener('pageshow', function (event) {
    // Vérifie si la page est chargée à partir du cache de retour en arrière
    if (event.persisted) {
        // Recharge la page pour réinitialiser son état
        location.reload(true); // Le paramètre true force un rechargement depuis le serveur
    }
});

if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}


</script>
</body>

<script>


let choix = document.getElementsByName('choix');
let affichage1 = document.getElementById('affichage1');
let affichage2 = document.getElementById('affichage2');
let affichage3 = document.getElementById('affichage3');
let jourFin=document.getElementsByName('jourFin');
let moisFin=document.getElementsByName('moisFin');
let submit=document.getElementById('submit');
let message=document.getElementById('message');
let nom=document.getElementById('nom');
message.value="Non";

let i=0

function recommencer()
{
i=i+1;
if(i%2==0)
{
nom.value="";
}
}
let isChoixOui2 = localStorage.getItem('isChoixOui2');
let fichier=localStorage.getItem('fichier');

// Variable pour suivre le nombre d'histoires du navigateur
var navigationCount = 1;

// Fonction pour détecter le changement dans l'historique du navigateur
function checkNavigation() {
    // Incrémentez le compteur à chaque changement dans l'historique
    

    // Rechargez la page si vous revenez en arrière deux fois
    if (navigationCount) {
        location.reload(true); // Le paramètre true force un rechargement depuis le serveur
    }
}
window.addEventListener('beforeunload', function (event) {
    // Obtient tous les éléments du formulaire
    var formElements = document.querySelectorAll('form input, form select, form textarea');

    // Parcourt tous les éléments et efface leurs valeurs
    formElements.forEach(function (element) {
        element.value = '';
    });
});

function resetForm() {
      
     // Remplacez "myForm" par l'ID de votre formulaire
      document.getElementById("myForm").reset(); 
    }

    // Écoute l'événement "click" du bouton "Soumettre"
    document.getElementById("envoyerButton").addEventListener("click", function() {
        if(value=="")
        {
            document.getElementById("categorieInput").value ="";
        }
        else{
            document.getElementById("categorieInput").value =value;
        }
        resetForm();

    
    });
    const input = document.getElementById('Titre');
    input.addEventListener('input', function() {
    if (this.value.length > 15) {
        this.value = this.value.slice(0, 15); // Limite à 15 caractères
    }
});
window.addEventListener('popstate', checkNavigation);

    console.log(fichier);
    if(fichier!='')
    {
      document.getElementById('affichage12').style.display="none";
    // Afficher le nom du fichier sélectionné
    document.getElementById('affichage13').style.display="block";
    document.getElementById('selectedFileName').innerHTML = fichier+ '<span class="removeButtonWrapper"><button type="button" id="removeFileBtn" onclick="removeFile()">Supprimer</button></span>';
  if(document.getElementById('image').value=='')
      {
        document.getElementById('affichage12').style.display="block";
    // Afficher le nom du fichier sélectionné
    document.getElementById('affichage13').style.display="none";
    document.getElementById('selectedFileName').innerHTML = '';
      }
  
  }
    else
    {
      document.getElementById('affichage12').style.display="block";
    // Afficher le nom du fichier sélectionné
    document.getElementById('affichage13').style.display="none";
    document.getElementById('selectedFileName').innerHTML = '';
    }
  


  
   

    window.addEventListener('pageshow', function (event) {
        // Vérifie si la page est chargée à partir du cache de retour en arrière
        if (event.persisted) {
            // Recharge la page pour réinitialiser son état
            location.reload(true); // Le paramètre true force un rechargement depuis le serveur
        }
    });

    // Si le navigateur prend en charge history.replaceState, utilisez-le pour remplacer l'état de l'historique
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }
       
    
        // Affiche le nom du fichier et le bouton de suppression
         
        
        var selectedFile = null;  // Variable pour stocker l'objet de fichier

document.getElementById('image').addEventListener('change', function() {
    var input = this;
    selectedFile = input.files[0];  // Stocke l'objet de fichier dans la variable
    var fileName = selectedFile ? selectedFile.name : '';
    var fichier=fileName
    document.getElementById('affichage12').style.display="none";
    // Afficher le nom du fichier sélectionné
    document.getElementById('affichage13').style.display="block";
    document.getElementById('selectedFileName').innerHTML = fileName+ '<span class="removeButtonWrapper"><button type="button" id="removeFileBtn" onclick="removeFile()">Supprimer</button></span>';
    
    localStorage.setItem('fichier', (fichier).toString());
});

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




    // Afficher le nom du fichier sélectionné

/*for (let i = 0; i < choix.length; i++) {
    choix[i].addEventListener('change', function () {
        if (choix[i].value === "Oui") {
affichage1.style.display="block";
affichage2.style.display="inline";
affichage3.style.display="inline";
message.value="Oui";


        } else {
affichage1.style.display="none";
affichage2.style.display="none";
affichage3.style.display="none";
message.value="Non";



        }
        localStorage.setItem('isChoixOui', (choix[0].checked).toString());
    });

     
}*/
let value="";
function cacher()
{
affichage1.style.display="none";
affichage2.style.display="none";
affichage3.style.display="none";
}
function afficher()
{
affichage1.style.display="block";
affichage2.style.display="inline";
affichage3.style.display="inline";
}

function removeFile()
{
  document.getElementById('image').value = '';
  document.getElementById('affichage12').style.display="block";
    // Afficher le nom du fichier sélectionné
    document.getElementById('affichage13').style.display="none";
    localStorage.setItem('fichier', ('').toString());
}

window.addEventListener('pageshow', function (event) {
    // Vérifie si la page est chargée à partir du cache de retour en arrière
    if (event.persisted) {
        // Recharge la page pour réinitialiser son état
        location.reload(true); // Le paramètre true force un rechargement depuis le serveur
    }
});
// Écoute l'événement popstate pour détecter les changements dans l'historique de navigation
window.addEventListener('popstate', function (event) {
    // Recharge la page pour réinitialiser son état
    location.reload(true); // Le paramètre true force un rechargement depuis le serveur
});


    // Écoute l'événement pageshow pour détecter les retours en arrière
    window.addEventListener('pageshow', function (event) {
        // Vérifie si la page est chargée à partir du cache de retour en arrière
        if (event.persisted) {
            // Réinitialise les valeurs des champs du formulaire
            resetForm();
        }
    });

   
    function resetForm() {
        // Obtient tous les éléments du formulaire
        var formElements = document.querySelectorAll('form input, form select, form textarea');

        // Parcourt tous les éléments et efface leurs valeurs
        formElements.forEach(function (element) {
            element.value = '';
        });
    }

    // Si le navigateur prend en charge history.replaceState, utilisez-le pour remplacer l'état de l'historique
    if (window.history.replaceState) {
        window.history.replaceState(null, null, window.location.href);
    }

    function clearHistory() {
    if (window.history && window.history.replaceState) {
        window.history.replaceState({}, document.title, window.location.href);
    }
}

// Appelle la fonction pour supprimer l'entrée d'historique lors du chargement de la page
window.addEventListener('load', clearHistory);
let prixCounter = 0;


function validerFormulaire() {
        // Vérifiez ici si toutes les conditions nécessaires sont remplies avant d'envoyer le formulaire
        // Par exemple, vérifiez si au moins un prix a été ajouté

        const prixContainers = document.querySelectorAll('#prix-container div');
        
        if (prixContainers.length === 0) {
            // Affichez un message d'erreur
            alert('Veuillez ajouter au moins un prix avant de soumettre le formulaire.');
            return false; // Empêche l'envoi du formulaire
        }

        // Ajoutez d'autres validations si nécessaire

        // Si toutes les validations passent, retournez true pour permettre l'envoi du formulaire
        return true;
    }
    function ajouterCategorie() {
      var input = document.getElementById("categorieInput").value.trim();
   
      if (input !== "") {  
        value+=document.getElementById("categorieInput").value+"/";
        var newCategory = document.createElement("div");
        newCategory.textContent = input;

        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Supprimer";
        deleteButton.onclick = function() {
          categoriesContainer.removeChild(newCategory);
        };
        
        newCategory.appendChild(deleteButton);

        var categoriesContainer = document.getElementById("categoriesContainer");
        categoriesContainer.appendChild(newCategory);
       
        

        verifierCategories();
      } else  {
        alert("Veuillez entrer au moins un caractère pour la catégorie.");
      }
    }
   

 

    function onlyPositiveNumberWithOneComma(evt) {
    var existingValue = evt.target.value;

    if (
        (evt.key === ',' && existingValue.includes(',')) || // Vérifie si la virgule est déjà présente
        (evt.key === ',' && existingValue.length === 0) || // Vérifie si la virgule est la première valeur
        (evt.key === '-' && existingValue.includes('-')) || // Vérifie si le signe négatif est déjà présent
        (evt.key === '-' && existingValue.length !== 0) || // Vérifie si le signe négatif est la première valeur
        (evt.key === '.' && existingValue.includes('.')))  // Vérifie si un point est ajouté (peut être remplacé par la virgule selon la localisation)
    
     {
        evt.preventDefault();
        return false;
    }

    return true;
}
// Appeler la fonction une fois que la page a été chargée
</script>

<style>
   .removeButtonWrapper {
    margin-right:30px; /* Ajustez la marge à droite selon vos préférences */
  }
       #customUploadBtn {
            border: 1px solid #ccc;
            color: #333;
            background-color: #f5f5f5;
            padding: 8px 12px;
            cursor: pointer;
            border-radius: 4px;
            display: inline-block;
        }

        #customUploadBtnLabel {
            font-size: 14px;
            margin-right: 8px;
        }

        #image {
            display: none;
        }

        #selectedFileName {
            display: inline-block;
        }

        /* Style pour le bouton de suppression */
        #removeFileBtn {
            background:none;
            color: blue;
            text-decoration: underline;
            border:none;
            cursor: pointer;
           display:flex;
           float:right;
          

           
        }

        /* Style pour le texte informatif */
        #fileInfo {
            font-size: 12px;
            color: #666;
            margin-top: 5px;
        }
  
 
</style>

</html>
