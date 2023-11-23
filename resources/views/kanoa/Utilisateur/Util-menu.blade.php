<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Menu</title>
</head>

<body style="background-color:#0D131C;">

        <div style="text-align:center; margin-top:20px; ">
        @foreach($categories as $categorie)
    <a id="{{$categorie->noms_categorie}}" class="categorie"  onclick="filterItems('{{$categorie->noms_categorie}}');">{{$categorie->noms_categorie}}&nbsp;&nbsp;</a>
    @endforeach
    
</div>
<div class="container mt-5">
    <div class="row">
    @foreach($menus as $menu)
         <div class="col-md-3  me-5 mt-3 item {{$menu->Categorie}}" style="background: linear-gradient(159deg, rgba(0, 0, 0, 0.00) -10.45%, #0A89FF 190.5%); height:55vh;">
            <img src="{{asset($menu->Image)}}" style=";border-radius: 4px; width:100%;  height: 70%;flex-shrink: 0; margin-top:5px;" id="Image">
            <div id="order">
            <h2 id="titre">{{$menu->Titre}}</h2>
            <h2 id="montant">{{$menu->Prix}}<span id="devise">&nbsp;{{$menu->Devise}}</span></h2>
            </div> 

</div>
@endforeach
</div>
</div>


</body>
<style>

    *{
        margin:0;
        padding:0;
    }
    
    a{   
    text-align:center;
    margin-left:20px;
    padding:5px 10px 5px 10px;
    text-align: center;
    font-family: 'Open Sans';
    font-size: 15px;
    font-style: normal;
    font-weight: 600;
    line-height: normal;
    color:grey;
flex-shrink: 0;
border-radius: 13px;
width:20px;
height:20px;
text-decoration:none;
/*background: #32435C;*/
/*color:grey;*/
cursor:pointer;
    }
    
    .cadre{
height: 380px;
flex-shrink: 0;
border-radius: 5px;
border: 3px solid #000;
background: linear-gradient(159deg, rgba(0, 0, 0, 0.00) -10.45%, #0A89FF 190.5%);
    }
    
    #S1{
width: 340px;
height: 128px;
flex-shrink: 0;
    }

    #titre
    {
color: #FFF;
font-family: 'Open Sans';
font-size: 30px;
font-style: normal;
font-weight: 600;
line-height: normal;
    }
    #nombre
{
color: #FFF;
font-family: 'Open Sans';
font-size: 38px;
font-style: normal;
font-weight: 600;
line-height: normal;
}
#order{
    margin-left:10px;
}
#montant{
color: #61C6FF;
font-family: 'Open Sans';
font-size: 50px;
font-style: normal;
font-weight: 800;
line-height: normal;
}


    
</style>
<script>
 let categories = [];

// Boucle foreach pour récupérer les noms de catégorie depuis PHP et les stocker dans le tableau JavaScript
@foreach ($categories as $categorie)
    categories.push("{{ $categorie->noms_categorie }}");
@endforeach


var items = document.getElementsByClassName('item');
var categorie = document.getElementsByClassName('categorie');
var filteredItems = document.getElementsByClassName(categories[0]);
console.log(categories[0]);
for (var j = 0; j < filteredItems.length; j++) {
    filteredItems[j].style.display = 'block'; 
  }
  for (var j = 1; j < categories.length; j++) {
    var filteredItems = document.getElementsByClassName(categories[j]);
    for (var k = 0; k < filteredItems.length; k++) {
    filteredItems[k].style.display = 'none'; 
       } } 


categorie[0].style.color="white";
categorie[0].style.background="#32435C";
  for (var i = 1; i < categorie.length; i++) {
    categorie[i].style.color = 'grey'; 
    categorie[i].style.background='none';
  }
  



function filterItems(category) {
  var items = document.getElementsByClassName('item');
  console.log(category)
  for (var i = 0; i < categorie.length; i++) {
    categorie[i].style.color = 'grey'; 
    categorie[i].style.background='none';
  }
  document.getElementById(category).style.color="white";
  document.getElementById(category).style.background="#32435C";
  for (var i = 0; i < items.length; i++) {
    items[i].style.display = 'none';
  }
  
  var filteredItems = document.getElementsByClassName(category);
  for (var j = 0; j < filteredItems.length; j++) {
    filteredItems[j].style.display = 'block'; 
  }
}
</script>

</html>