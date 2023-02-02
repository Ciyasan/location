<?php

// Récupération du modèle
require_once "./model/ModelClient.php";

class ControllerClient
{

    private ModelClient $model;

    public function __construct()
    {
        // Instantiation du modèle
        $this->model = new ModelClient();
    }   
    
    // Lister les clients
    public function list()
    {
        $clients = $this->model->getAllClients();

        require_once "./view/list.php";
    }
    
    // Ajouter un client
    public function add()
    {        
        //a faire
        echo "action ajouter";
    }

    // Suppimer un client
    public function remove()
    {
       //a faire
       echo "action supprimer";
    }

    // Mettre à jour un client
    public function edit()
    {
         //a faire
        echo "action éditer";
    }

    // Lister les clients
    public function list()
    {
        $clients = $this->model->getAllClients();

        require_once "./view/list.php";
    }
}