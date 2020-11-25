<?php
/* (1) créer une class qui auras pour fonction de se connecter à la base de donnée*/

/**
 * Database
 */
class Database
{
    /*
    *Fonction connextion à la base 
    */
    public function Connect()
    {
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=maintenance', 'root','');
            return $bdd;
        }
        catch (PDOException $e) {
            print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
}

?>