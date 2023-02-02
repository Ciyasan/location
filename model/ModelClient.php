<?php

//Récupération de PDOUtils
require_once "./utils/PDOUtils.php";

//Création de la classe Client
class ModelClient
{
    // Identifiant unique client
    private $code_client;

    // Siren du client
    private $siren;

    // Nom du client
    private $nom;

    // Fonctions de récupération des données   
    //Récupération du code client
    public function getCode()
    {
        return $this->code_client;
    }

    //Récupération du numéro Siren du client
    public function getSiren()
    {
        return $this->siren;
    }

    //Récupération du nom du client
    public function getNom()
    {
        return $this->nom;
    }

    // Fonctions d'attribution des données
    //Attribution du code client  
    public function setCode($code_client)
    {
        $this->code_client = $code_client;
    }

    //Attribution du numéro de Siren du client
    public function setSiren($siren)
    {
        $this->siren = $siren;
    }

    //Attribution du nom du client
    public function setNom($nom)
    {
        $this->nom = $nom;
    }

    // Méthodes du CRUD

    public function getAllClients()
    {
        $prepared_sql = "SELECT code_client, siren, nom FROM loueur";
        $array_values = [];

        return PDOUtils::query($prepared_sql, $array_values, true);
    }

    public function add()
    {
       //a faire
    }    
    public function update()
    {
        //a faire
    }
    public function delete()
    {
        //a faire
    }
}