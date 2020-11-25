<?php

require_once ('Database.php');

// Créer une class qui contiendra toutes nos fontion qui on un rapport avec la table intervention suivi de l'extension Database.

class Intervention extends Database
{
    public function Add()
    {
        //On prépare la requete Ajouter de la table intervention.
        $add =$this->Connect()->prepare('INSERT INTO intervention (Date_intervention, Type_intervention, Etage_intervention) VALUES (:Date, :Type, :Etage)');

        //On associe nos paramètre aux champs envoyés par le formulaire.
            $add->bindParam(':Date',$_GET['Date'],
            PDO::PARAM_STR);
            $add->bindParam(':Type',$_GET['Type'],
            PDO::PARAM_STR);
            $add->bindParam(':Etage',$_GET['Etage'],
            PDO::PARAM_INT);
        
        //On exécute la requête
            $push = $add->execute();

        //Afficher
            if($push){
                echo "Vôtre intervention à bien été enregistré !";
    
            }else{
                echo "Vôtre intervention n'a pas été enregistré !";
            }
        }
    
    public function Edit()
    {
        //On prépare la requete d'insertion 
            $edit =$this->Connect()->prepare('UPDATE intervention SET Date_intervention=:editDate,Type_intervention=:editType,Etage_intervention=:editEtage WHERE id= :id');

        //On associe nos paramètre aux champs envoyés par le formulaire
            $edit->bindParam(':id',$_GET['edit_id'], PDO::PARAM_STR);
            $edit->bindParam(':editDate',$_GET['edit_Date'], PDO::PARAM_STR);
            $edit->bindParam(':editType',$_GET['edit_Type'], PDO::PARAM_STR);
            $edit->bindParam(':editEtage',$_GET['edit_Etage'], PDO::PARAM_INT);

        //On exécute la requête
            $edit=$edit->execute();

        //Afficher
            if($edit){
                 echo "Vôtre modification a bien été pris en compte ! ";
            }else{
                echo "Vôtre modification n'a pas pu être pris en compte !";
            }
        }

    public function Remote(){
       
        //On prépare la requete d'insertion 
            $remote =$this->Connect()->prepare('DELETE  FROM intervention WHERE id= :id');

        //On associe nos paramètre aux champs envoyés par le formulaire
            $remote ->bindParam(':id',$_GET['id'], PDO::PARAM_INT);

        //On exécute la requête
            $remote=$remote->execute();

        //Afficher
            if($remote){
                echo"Vôtre enregistrement a bien été supprimer";
                }else{
                    "Veuillez recommencer svp,une erreur est survenue";
            }
        }
    
    public function Historique(){
        
        //On prépare la requete d'insertion 
            $etage = $_GET['etage'];
            $recup=$this->Connect()->prepare('SELECT * FROM intervention WHERE Etage_intervention = :etage');

        //On associe nos paramètre aux champs envoyés par le formulaire
            $recup->bindParam(':etage', $etage);

        //On exécute la requête
            $recup->execute();

        //Afficher
            echo '<table class="table ">
            <h4 class=" text-center py-3"> HISTORIQUE ETAGE '.$etage.'</h4>
        
            <thead class="thead-dark">
    
                <tr>
                    <th scope="col">ID </th>
                    <th scope="col">ETAGE </th>
                    <th scope="col">DESCRIPTION</th>
                    <th scope="col">DATE</th>  
                </tr>
            </thead>';
        
        while($donnees = $recup->fetch()){
            echo '<tr class=" "><td>'.$donnees['id'].'</td><td>'.$donnees['Etage_intervention'].'</td><td>'.$donnees['Type_intervention'].'</td><td>'.$donnees['Date_intervention'].'</td></tr>';
        
        }
            echo'</tbody></table></div>';
            }
        
    public function Historique_date(){
        
        //On prépare la requete d'insertion 
            $date = $_GET['date'];
            $recupe=$this->Connect()->prepare('SELECT * FROM intervention WHERE Date_intervention = :date');
        
        //On associe nos paramètre aux champs envoyés par le formulaire 
            $recupe->bindParam(':date', $date);

        //On exécute la requête
            $recupe->execute();

        //Afficher
            echo '<table class="table ">
            <h4 class=" text-center py-3"> HISTORIQUE PART DATE '.$date.'</h4>
                <thead class="text-center  thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">ETAGE</th>
                        <th scope="col">TYPE</th>
                        <th scope="col">DATE</th>
                    </tr>
                </thead>
        <tbody>';
        
        
        
            while($donnes = $recupe->fetch()){
            echo '<tr class=" "><td>'.$donnes['id'].'</td><td>'.$donnes['Etage_intervention'].'</td><td>'.$donnes['Type_intervention'].'</td><td>'.$donnes['Date_intervention'].'</td></tr>';
            }
            echo'</tbody></table></div>';
            }
        
}
?>