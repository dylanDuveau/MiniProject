<?php

require_once '../../Modele/Modele.php';


class ModeleVille extends Modele {

    public function ObtenirEnseignant($enseignant) {
        try {
            $requete = $this->_bdd->prepare("select nom,prenom from Utilisateurs where statut = 1");
          
            $condition = '%'.$enseignant.'%';
            $requete->bindParam(":code_postal", $condition);            
            $requete->execute();
 
            $villes = array();
            while ($ligne = $requete->fetch()) {
                array_push($villes, $ligne["nom"]);        
            }
            header('Content-Type: application/json');
            return json_encode($villes);
            
        } catch (PDOException $exc) {
            die("<br/> Pb Obtenirvilles :" . $exc->getMessage());
        }
    }

}
