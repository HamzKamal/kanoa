<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Ajouter des catégories</title>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
<h1>Liste des catégories</h1>
    <ul>
        @foreach($categories as $categorie)
            <li>{{ $categorie->noms_categorie }} <form  action="/delete-categorie/{{ $categorie->id }}/" method="GET"> <button href="/delete-categorie/{{$categorie->id}}" onclick="confirmationSuppression(event)" class="btn btn-danger">Supprimer</button></form></li>
        @endforeach
    </ul>
  <form id="categorieForm" action="/save-categories" method="POST">
    @csrf
    <input type="text" id="categorieInput" placeholder="Ajouter une catégorie">
    <button type="button" onclick="ajouterCategorie()">Ajouter</button>

    <div id="categoriesContainer">
      <!-- Les catégories ajoutées seront affichées ici -->
    </div>

    <button type="submit" id="envoyerButton" disabled>Envoyer les catégories</button>
  </form>

  <script>
    function ajouterCategorie() {
      var input = document.getElementById("categorieInput").value.trim();

      if (input !== "") {
        var newCategory = document.createElement("div");
        newCategory.textContent = input;

        var deleteButton = document.createElement("button");
        deleteButton.textContent = "Supprimer";
        deleteButton.onclick = function() {
          categoriesContainer.removeChild(newCategory);
          verifierCategories();
        };

        newCategory.appendChild(deleteButton);

        var categoriesContainer = document.getElementById("categoriesContainer");
        categoriesContainer.appendChild(newCategory);

        document.getElementById("categorieInput").value = "";
        verifierCategories();
      } else {
        alert("Veuillez entrer au moins un caractère pour la catégorie.");
      }
    }
    function confirmationSuppression(e) {
    // Afficher une boîte de dialogue pour confirmer la suppression
    let confirmation = confirm(`la Suppression d'une categorie entrainera la suppresion de tout ces produits ?`);

    // Vérifier si l'utilisateur a confirmé la suppression
    if (!confirmation) {
        e.preventDefault(); // Empêche l'exécution du formulaire si l'utilisateur clique sur "Non"
    }
}

    function verifierCategories() {
      var categoriesCount = $("#categoriesContainer div").length;
      if (categoriesCount > 0) {
        $("#envoyerButton").prop("disabled", false);
      } else {
        $("#envoyerButton").prop("disabled", true);
      }
    }

    $(document).ready(function() {
      $("#categorieForm").submit(function(event) {
        var categories = [];
        $("#categoriesContainer div").each(function(index) {
          var categoryName = $(this).text();
          categories.push({ name: "categorie[" + index + "]", value: categoryName });
        });

        categories.forEach(function(category) {
            let chaine=category.value.replace("Supprimer", "");
            console.log(chaine);
            $("<input>")
            .attr("type", "hidden")
            .attr("name", category.name)
            .attr("value", chaine)
            .appendTo("#categorieForm");
        });
      });
    });
    
  </script>
</body>
</html>