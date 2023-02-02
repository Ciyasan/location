<?php
  //Récupération du header :
  require_once "./view/header.php";
  //
  
  if(isset($_GET["page"])) {    
        // Inclusion du routeur "client"
        require_once "./router/client.php";
       
  }else{
    //la homepage a faire
    echo "La Homepage";
  }
  //Récupération du footer
  require_once "./view/footer.php";

?>