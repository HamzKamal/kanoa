

    <ol class="custom-error-list"> 
       @error('Nom')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">Le Nom est obligatoire</li>
       @enderror
       @error('Prenom')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">Le Prenom est obligatoire</li>
       @enderror
       @error('Email')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">Email est obligatoire</li>
       @enderror
       @error('Naissance')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">La date de naissance est obligatoire</li>
       @enderror
       @error('Passeword')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">Le mot de passe est obligatoire</li>
       @enderror
       @error('ConfPass')
       <li style="color:red;font-weight:bold; list-style-type:none" class="custom-error-item">La confirmation de mot de passe est obligatoire</li>
       @enderror
    </ul>

