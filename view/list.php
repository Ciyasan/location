<h2>Liste des Clients</h2>
<?php

//Création d'un tableau avec les valeurs des codes clients
$array_code_client = array();
foreach ($clients as $client){
    $array_code_client[] = $client["code_client"];
};

//Création du tableau
$array_client = [
    'action' => "list",
    'entity' => "client",
    'data' => $array_code_client
];

//Conversion du tableau en json
$json_client = json_encode($array_client);

echo $json_client;
?>

    