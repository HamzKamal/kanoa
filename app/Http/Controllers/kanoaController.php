<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kanoa;
use App\Models\evenement;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Support\Facades\Auth;
use Session;
use Srmklive\PayPal\Services\PayPal as PayPalClient;
use App\Models\Categorie;




class kanoaController extends Controller
{
    public function afficher()
    {
        $messageA="";
        $messageB="";
        $Email="";
        return view('kanoa.authentification',compact('messageA','messageB','Email'));
    }
    public function liste_kanoa()
    {
        $kanoas=Kanoa::paginate(4);
        return view('kanoa.liste',compact('kanoas'));
    }
    public function ajouter_kanoa()
    {
        return view('kanoa.ajouter');
    }
    public function ajouter_kanoa_traitement(Request $request)
    {   
        $request->validate([
            'Email'=>['required','email','unique:kanoas', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
            'Prenom'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Nom'=>['required','regex:/^[a-zA-Z ]+$/'],
            'Naissance'=>'required',
            'password'=>'required|confirmed',
            'password_confirmation'=>'required',
            'accept_term'=>'accepted',
            'password' => ['required','confirmed','string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'password_confirmation' => ['required','string', 'min:6', 'regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],
            'nombre'=>'numeric|max:0'
        ]);

        $kanoa= new Kanoa();
        $kanoa->Nom = trim($request->Nom);
        $kanoa->Prenom = trim($request->Prenom);
        $kanoa->Email = trim($request->Email);
        $kanoa->Naissance = $request->Naissance;
        $kanoa->password = md5($request->password);
        $kanoa->password_confirmation = md5($request->password_confirmation);
        $kanoa->nombre=$request->nombre;
        $kanoa->save();

        return redirect('/ajouter')->with('status','L\'utilisateur a bien été ajouté avec succes .');

    }
    public function update_kanoa($id)
    {   
        $kanoas=Kanoa::find($id);
        return view('kanoa.update',compact('kanoas'));

    }
    public function update_kanoa_traitement(Request $request)
    {
        $request->validate([
            'Email'=>'required',
            'Prenom'=>'required',
            'Nom'=>'required',
            'Naissance'=>'required',
            'password'=>'required',
            'password_confirmation'=>'required'
        ]);
        $kanoa=Kanoa::find($request->id);
        $kanoa->Nom = trim($request->Nom);
        $kanoa->Prenom = trim($request->Prenom);
        $kanoa->Email = trim($request->Email);
        $kanoa->Naissance = $request->Naissance;
        $kanoa->password = $request->password;
        $kanoa->password_confirmation = $request->password_confirmation;
        $kanoa->update();
        return redirect('/kanoa')->with('status','kanoa a bien été modifié avec succes .');
    }
    public function delete_kanoa($id,$page)
    {
        
        $kanoa= Kanoa::find($id);
        $kanoa->delete();
        return redirect("/kanoa?page=$page")->with('status','kanoa a bien été supprimé avec succes .');
        
    }
 
    public function traitement(Request $request)
   {   
    $kanoas = Kanoa::all();
    $request->validate([
        'Email' => ['required', 'email', 'regex:/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/'],
        'password' => ['required', 'string'],
    ]);
  
    $Email=$request->Email;

    $messageA = ""; // Initialisez la variable $message1
    $messageB = ""; // Initialisez la variable $message2
    
    $user= kanoa::where('Email','=',$Email)->first();
    if($user && md5($request->password) == $user->password)
    {

    Auth::login($user);
    if(Auth::check())
    {
       return redirect()->intended('connexion')->with('status','Vous  etes authentifié avec succes ');
    }
    }
    else
    {
    foreach ($kanoas as $kanoa) {
        if ($kanoa->Email == $request->Email) {
            $messageB = "Le mot de passe n'est pas correct";
            return view('kanoa.authentification', compact('messageB', 'messageA','Email'));
        }
    }  
     $messageA = "L'adresse email est incorrecte";
     return view('kanoa.authentification', compact('messageA', 'messageB','Email'));
    }
    }
    public function connexion()
    {
        if(Auth::check())
        {
        return view('kanoa.connexion');
        }
        return redirect('/authentification');
    }
    public function signOut() {
        Session::flush();
        Auth::logout();
   
        return redirect('/authentification');
    }
    public function utilevenement() {
    return view('kanoa.Utilisateur.Util-evenement');
    }
    public function profevenement() {
     return view('kanoa.professionnel.prof-evenement');
    }
    public function verification(Request $request )
    {
      
        $request->validate([
            'image' => ['required'],
            'prix'=>['required','numeric','min:0'],
            'lieu'=>['required'],
            'nom'=>['required'],
            'jourDebut'=>['required'],
            'moisDebut'=>['required'],
            'heuresDebut'=>['required'],
            'heuresFin'=>['required'],
            'minutesDebut'=>['required'],
            'minutesFin'=>['required'],
            'Devise'=>['required'],
            'message'=>['required'],

        ]);
        $message=$request->message;
        $nom=$request->nom;

        $prix=$request->prix;
        $lieu=$request->lieu;
        $jourDebut=$request->jourDebut;
        $moisDebut=$request->moisDebut;
        $jourFin=$request->jourFin;
        $moisFin=$request->moisFin;
        $heuresDebut=$request->heuresDebut;
        $heuresFin=$request->heuresFin;
        $minutesDebut=$request->minutesDebut;
        $minutesFin=$request->minutesFin;
        $Devise=$request->Devise;
        $evenement= new evenement();
        $evenement->nom=$nom;
        $evenement->prix=$prix;
        $evenement->lieu=$lieu;
        
        $evenement->moisDebut=$moisDebut;
        $evenement->jourFin=$jourFin;
        $evenement->moisFin=$moisFin;
        $evenement->heuresDebut=$heuresDebut;
        $evenement->heuresFin=$heuresFin;
        $evenement->minutesDebut=$minutesDebut;
        $evenement->minutesFin=$minutesFin;
        $evenement->Devise=$Devise;
        $evenement->jourDebut=$jourDebut;
       


        if($prix==0)
        {
            $prix="Gratuit";
            $Devise="";
            $evenement->prix=$prix;
            $evenement->Devise=$Devise;
        }
        if($message=="Non")
        {
            $jourFin="";
            $moisFin="";
            $evenement->jourFin=$jourFin;
            $evenement->moisFin=$moisFin;
        }
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(''), $imageName); 
            $evenement->image=$imageName; 
            $evenement->save();
            return redirect('/evenement');
        }
        return redirect()->back()->with('error', 'Une erreur est survenue lors du téléchargement de l\'image.');
       
    }
    public function evenement()
    {
        $evenements=evenement::all();
        return view('kanoa.Utilisateur.Util-evenement',compact('evenements'));
    }
    public function delete_evenement($id,$nom)
    {
        
        $evenement= evenement::find($id);
        $evenement->delete();
        return redirect("/evenement")->with('status',"l'evenement  a bien été supprimé avec succes .");
        
    }
    public function payment(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken=$provider->getAccessToken();

        $response = $provider->createOrder([
            "intent"=>"CAPTURE",
            "application_context"=>[
                "return_url"=>route('paypal_success'),
                "cancel_url"=>route('paypal_cancel')
            ],
            "purchase_units"=>[
                [
                  "amount"=>[
                    "currency_code"=>"USD",
                    "value"=>$request->price
                  ]

                ]
            ]

        ]);
        
        if(isset($response['id']) && $response['id']!=null)
        {
            foreach($response['links'] as $link)
            {
                if($link['rel']==='approve')
                {
                    return redirect()->away($link['href']);
                }
            }
        }
        else
        {
            return redirect()->route('paypal_cancel');
        }
    }

    public function success(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken= $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request->token);

        if(isset($response['status']) && $response['status']=="COMPLETED") 
        {
            return redirect("/evenement")->with('status',"La commande a été passé avec succés");
        }
        else
        {
            return redirect()->route('paypal_cancel');
        }

    }
    public function cancel()
    {
        return redirect("/evenement")->with('status',"echec de la commande");
    }
    public function profmenu() {
        $categories=Categorie::all();
        return view('kanoa.professionnel.prof-menu',compact('categories'));
    }
    public function utilmenu() {
        
        $menus= Menu::all();
        $categories=Categorie::all();
        return view('kanoa.Utilisateur.Util-menu',compact('menus','categories'));
       
     }
    
     public function afficheMenu(Request $request )
    {
      
        $request->validate([
            'Image' => ['required'],
            'Prix'=>['required'],
            'Titre'=>['required'],
            'Devise'=>['required'],
            'Categorie'=>['required'],
        ]);
        $Prix=$request->Prix;
        $Devise=$request->Devise;
        $Titre=$request->Titre;
        $Categorie=$request->Categorie;
        $menu= new Menu();
        $menu->Prix=$Prix;
        $menu->Devise=$Devise;
        $menu->Titre=$Titre;
        $menu->Categorie=$Categorie;
        if ($request->hasFile('Image') && $request->file('Image')->isValid() ) {
            $image = $request->file('Image');
         
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path(''), $imageName); 
            $menu->Image=$imageName; 
            $menu->save();
            return redirect('/util-menu');
        }
        return redirect()->back()->with('error', 'Une erreur est survenue lors du téléchargement de l\'image.');
       
    }
    
    public function afficheCategories()
    {
        $categories=Categorie::all();
        return view('kanoa.professionnel.prof-categorie',compact('categories'));
    }
   public function saveCategories(Request $request)
   {
    $categories = $request->categorie;

    // Enregistrer chaque catégorie dans la base de données
    foreach ($categories as $categoryName) {
        $category = new Categorie();
        $category->noms_categorie = $categoryName;
        $category->save();
    }
    return redirect('/prof-menu');
   }
   public function delete_categorie($id)
   {
       $Categorie= Categorie::find($id);
       Menu::where('Categorie', $Categorie->noms_categorie)->delete();
       $Categorie->delete();
       return redirect("/prof-categories")->with('status','la categorie a été supprimé avec succes .');     
   }
}