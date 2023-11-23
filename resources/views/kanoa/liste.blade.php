<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kanoa:Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  </head>
  <body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
  </body>
       <div class="container text-center">
          <div class="row">
            <div class="col s12">
            <h1>Afficher les Utilisateurs</h1>
            <hr>
            <a href="/ajouter" class="btn btn-primary">Ajouter un utilisateur</a>
            <hr>
            @if(session('status'))
            <div class="alert alert-success">
              {{session('status')}}
            </div>
            @endif
            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>NOM</th>
                        <th>Prénom</th>
                        <th>Email</th>
                        <th>Naissance</th>
                        <th>Passeword</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $currentPage = $kanoas->currentPage();
                    $paginationValue = $kanoas->perPage();
                    $ide=$paginationValue*($currentPage-1)+1;
                    @endphp
                @foreach($kanoas as $kanoa)
                    <tr>
                        <td>{{$ide}}</td>
                        <td>{{$kanoa->Nom}}</td>
                        <td>{{$kanoa->Prenom}}</td>
                        <td>{{$kanoa->Email}}</td>
                        <td>{{$kanoa->Naissance}}</td>
                        <td>{{$kanoa->password}}</td>
                  
                        <td>
                            <a href="/delete-kanoa/{{$kanoa->id}}/{{$currentPage}}" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                    @php
                    $ide+=1;
                    @endphp
                @endforeach
                </tbody>
</table>
{{$kanoas->links()}}
</html>