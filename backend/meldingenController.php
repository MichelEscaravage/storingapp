<?php

//Variabelen vullen
$attractie = $_POST['attractie'];
$type = $_POST['type'];
$capaciteit = $_POST['capaciteit']; 
$melder = $_POST['melder'];
if(isset($_POST['prioriteit']))
{
    $prioriteit = true;
}
else
{
    $prioriteit = false;
}

//1. Verbinding
require_once 'conn.php';


//2. Query
$query = "INSERT INTO meldingen (attractie, type, capaciteit, melder)
VALUES(:attractie, :type, :capaciteit, :prioriteit, :melder)";

//3. Prepare
$statement = $conn->prepare($query);

//4. Execute
$statement->execute([
    ":attractie" => $attractie,
    ":type" => $type,
    ":capaciteit" => $capaciteit,
    ":prioriteit" => $prioriteit,
    ":melder" => $melder]);
header("Location: ../meldingen/index.php?msg=Melding opgeslagen");