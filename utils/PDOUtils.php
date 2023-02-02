<?php
//Classe utilitaire PDO
  class PDOUtils {
    // Nom du serveur ou adresse IP :
    private const HOST = 'localhost';
    // Nom de la base de donnée MySQL :
    private const DB = 'db_location';
    //Utilisateur de connexion à la base de données :
    private const USER = 'app_loc';
    //Mot de passe de connexion à la base de données : 
    private const PWD = '8y-toP#';

    //Connexion unique PDO : 
    static private $connection;

    //Execute une requête préparée SQL : 
    static public function query($prepared_sql, $parameters_array, $select_query)
    {
      $result_set =null;
      //On récupère la connexion : 
        $conn = self::getConnection();

      try {
        //Préparation de la requête SQL : 
          $pdo_statement = $conn->prepare($prepared_sql);
        //Liage aux paramètres : 
          for ($i = 0; $i < count($parameters_array); $i++){
            $pdo_statement->bindParam($i + 1, $parameters_array[$i]);
          }
        //Execution de la requête :
          $pdo_statement->execute();
        
        //Vérification de l'existence de lignes dans le jeu de résultat dans l'unique cas d'une requête SELECT : 
          if ($select_query && $pdo_statement->rowCount() > 0) {
            //Récupération et renvoi du jeu de résultats sous la forme d'un tableau associatif
            $result_set = $pdo_statement->fetchAll(PDO::FETCH_ASSOC);
          }
      } catch (PDOException $e){
        echo "Erreur général ! " . $e->getMessage() . " " . $e->getLine();
        die();
      }
      return $result_set;
    }

    //Récupère la connexion à MySQL et gère l'unicité de la connexion :
    static private function getConnection(){
      //Vérification d'une connexion existante :
        if(is_null(self::$connection)){

          //Création et stockage de la connexion :
          try{
            self::$connection = new PDO (
              'mysql:host=' . self::HOST . ';dbname=' . self::DB,
              self::USER,
              self::PWD,
              [PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8']
            );

            //Activation des exceptions PDO :
            self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

          } catch (PDOException $e) {
            echo "Erreur de connexion à la base de données : " . $e->getMessage();
            // On force l'absence de connexion :
              self::$connection = null;
            //Pas de connexion, on arrête :
            die();
          }
        }
        // On renvoie la connection :
        return self::$connection;
    }
  }
  ?>