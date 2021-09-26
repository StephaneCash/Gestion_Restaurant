<?php
require_once "../views/identifier.php";
require_once "../BD/connexion.php"; // Connexion à la BD

// Verification des données

$id = isset($_GET['id']) ? $_GET['id'] : 0;

$requete = "delete from repas where idRepas=?";
$param = array($id);
$resultat = $pdo->prepare($requete);
$resultat->execute($param);

header('location: ../views/home.php');

?>
