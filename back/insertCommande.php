<?php 

    require_once("../BD/connexion.php"); // Connexion à la BD

     $nomRepas = isset($_POST['repas'])?$_POST['repas']:"";
     $quantite = isset($_POST['quantite'])?$_POST['quantite']:"";

    // $userCommande = ;

     $requeteInsert = " INSERT INTO commande(nomRepas, quantite) VALUES(?, ?)";

     $param = array($nomRepas, $quantite);
     $resultat = $pdo->prepare($requeteInsert);
     $resultat->execute($param);

     header('location: ../views/home.php');
     
?>