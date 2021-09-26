<?php 

    require_once("../BD/connexion.php"); // Connexion à la BD

     $nom = isset($_POST['nom'])?$_POST['nom']:"";
     $prix = isset($_POST['prix'])?$_POST['prix']:"";
     $detail = isset($_POST['detail'])?$_POST['detail']:"";
 
     $photo = isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
     $imageTem = $_FILES['photo']['tmp_name'];
     move_uploaded_file($imageTem,"../Images/".$photo);

     $requeteInsert = " INSERT INTO repas(nom, prix, detail, photo) VALUES(?, ?, ?, ?)";

     $param = array($nom, $prix, $detail, $photo);
     $resultat = $pdo->prepare($requeteInsert);
     $resultat->execute($param);

     header('location: ../views/home.php');
     
?>