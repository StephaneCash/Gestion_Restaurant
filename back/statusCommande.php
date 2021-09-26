
<?php 
    require_once("../BD/connexion.php"); // Connexion à la BD
    
    // Verification des données 

    $id = isset($_GET['id'])?$_GET['id']:0;
    $etat = isset($_GET['status'])?$_GET['status']:0;
    
    if($etat == 0)
        $newEtat = 1;

    $requete = "update commande set status=? where idCommande=?";
    $param = array($newEtat, $id);
    $resultat = $pdo->prepare($requete);
    $resultat->execute($param);

    header('location: ../views/commandes.php');
?>