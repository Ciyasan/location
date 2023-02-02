<?php

//Récupération du Contrôleur
require_once "./control/ControllerClient.php";

//Récupération du header :
  require_once "./view/header.php";

//Création du contrôleur
$control = new ControllerClient();

// Vérification de l'action demandée, si elle est demandée
if (isset($_GET["action"])) {   

    switch ($_GET["action"]) {
        
        //Action ajouter
        case "add":            
            $control->add();
            break;

        //Action Editer
        case "edit":            
            $control->edit();
            break;

        //Action supprimer
        case "remove":            
            $control->remove();
            break;

        //Action Lister
        case "list":            
            $control->list();
            break;

        //Cas par défault si la valeur d'action n'est pas conforme
        default:   
                 
            $control->list();
            break;
    }
} else {
    // Action si le paramètre action n'est pas défini    
    $control->list();
    
}
//Récupération du footer
require_once "./view/footer.php";