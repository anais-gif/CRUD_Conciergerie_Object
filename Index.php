<?php
include('Interventions.php');
?>
<!doctype html >
    <html  lang='fr'>
        <head >
            <!-- CSS -->
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
            integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <link rel="stylesheet" href="style.css">
            <!-- jQuery and JS bundle w/ Popper.js -->
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
            integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
            </script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous">
            </script>
                <meta charset="UTF-8">
                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <title>Maintenance</title>
        </head>
    <body>

        <div class="container">
            <div class="row">
                <div class="col-12 text-center back">
                    <h1> Maintenance </h1>
                </div>
            </div>
        </div>
<?php 
 
 ?>
 <!-- ADD AN INTERVENTION  -->
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3> Veuillez ajouter une intervention</h3>
                        <form method='GET' class="form-inline">
                            <input type="date"  class="form-control mb-2 mr-sm-5" name="Date" >
                            <input type="text" class="form-control mb-2 mr-sm-5" name="Type"placeholder='Description' >
                            <input type="number" class="form-control mb-2 "  name="Etage" placeholder='Etage'>
                                <button type="submit" value="add" name="add" class="btn btn-secondary mb-2">Ajouter</button>
        
                        </form>
<?php
    
    // Si la condition est remplie, le bouton ajouter fonctionne
        if(isset($_GET['add']) && !empty($_GET['Date']) && !empty($_GET['Type']) && !empty($_GET['Etage'])){

    //Créer un objet qui utilise la class Intervention
        $ajouter = new Intervention();

    //Appeller la méthode add dans notre objet
        $ajouter->Add();
        }
?>
                </div>
            </div>
        </div>
                                            

<!-- EDIT AN INTERVENTION  -->
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3> Voulez-vous modifier une intervention ?</h3>
                        <form method='GET'class="form-inline" >
                            <input type="text"  class="form-control mb-2 mr-sm-5" name="edit_id" placeholder='id'>
                            <input type="date" class="form-control mb-2 mr-sm-5"  name="edit_Date">
                            <input type="text" class="form-control mb-2 mr-sm-5"  name="edit_Type"placeholder='Description'>
                            <input type="text"  class="form-control mb-2 " name="edit_Etage"placeholder="Etage">
                            <button type="submit" value="edit" name="modiv"class="btn btn-secondary mb-2" >Modifier</button>
                        </form>   

<?php
    
    //Si la condition est remplie, le bouton modifier fonctionne
        if(isset($_GET['modiv']) && $_GET['modiv']=="edit" && !empty($_GET['edit_id'])&& !empty($_GET['edit_Date']) && !empty($_GET['edit_Type']) && !empty($_GET['edit_Etage'])){
    
    //Créer un objet qui utilise la class Intervention
        $modifier = new Intervention();

    //Appeller la méthode edit dans notre objet
         $modifier->Edit();        
        }           
?>
                </div>
            </div>
        </div>
                                            
<!-- REMOTE AN INTERVENTION -->
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3> Voulez-vous supprimer une intervention ?</h3>
                        <form method='GET'class="form-inline" >
                            <input type="text"  name="id" class="form-control mb-2 "placeholder='id'>
                                <button type="submit" value="remote" name="supp"class="btn btn-secondary mb-2" >Supprimer</button>
                        </form>
                </div>
            </div>
        </div>
                                          
<!-- DISPLAY HISTORIQUE  -->
        <div class="container">
            <div class="row">
                <div class="col text-center">
                    <h3> Voir les historiques des interventions </h3>
                        <form method="GET"class="form-inline" >
                            <input type="date" class="form-control mb-2 " name="date" id="date" placeholder="Recherche">
                                <button type="submit" name="actionn" value="historique_date"class="btn btn-secondary mb-2 mr-sm-5">Entrer</button>

                            <input type="number" name="etage" class="form-control mb-2 " placeholder="choisir un etage">
                                <button type="submit" name="action" value="historique"class="btn btn-secondary mb-2 ">Entrer</button><br>
                        </form>
<?php 
    
    // Si la condition est remplie, l'action historique fonctionne
        if(isset($_GET['action']) && $_GET['action']=="historique"){

    //Créer un objet qui utilise la class Intervention
        $historique = new Intervention();

    //Appeller la méthode historique dans notre objet
        $historique->Historique();
} 
    
    // Si la condition est remplie, l'action historique_date fonctionne
        if(isset($_GET['actionn']) && $_GET['actionn']=="historique_date"){

    //Créer un objet qui utilise la class Intervention
        $historique2 = new Intervention();

    //Appeller la méthode historique_date dans notre objet
        $historique2->Historique_date();
        }
?>
                </div>
            </div>
        </div>
<?php
    
    // Si la condition est remplie, le bouton supprimer fonctionne
        if(isset($_GET['supp']) && $_GET['supp']=="remote"){
     
    //Créer un objet qui utilise la class Intervention
        $supprimer = new Intervention();

    //Appeller la méthode supprimmer dans notre objet
        $supprimer->Remote();
        }  
?>
        </body>
    </html>



