<?php 
    require_once("../BD/connexion.php"); // Connexion à la BD

    $id = isset($_POST['idUp'])?$_POST['idUp']:0;
    $nomUp = isset($_POST['nomUp'])?$_POST['nomUp']:"";
    $prixUp = isset($_POST['prixUp'])?$_POST['prixUp']:"";
    $detailUp = isset($_POST['detailUp'])?$_POST['detailUp']:"";

    $nomphoto = isset($_FILES['photo']['name'])?$_FILES['photo']['name']:"";
    $Img_temp = $_FILES['photo']['tmp_name'];
    move_uploaded_file($Img_temp, "../Images/" .$nomphoto);

    echo $id . $nomUp .$prixUp;

    // VERIFICATION SI LE CHAMP DE PHOTO CONTIENT UN NOM POUR MODIFIER

    if(!empty($nomphoto)){

        $requete = "update repas set nom=?, prix=?, detail=?, photo=? where idRepas=?";
        $param = array($nomUp, $prixUp, $detailUp, $nomphoto, $id);
        $resultat = $pdo->prepare($requete);
        $resultat->execute($param);
    } else{

        $requete = "update repas set nom=?, prix=?, detail=? where idRepas=?";
        $param = array($nomUp, $prixUp, $detailUp, $id);
        $resultat = $pdo->prepare($requete);
        $resultat->execute($param);
    }

    header('location: ../views/home.php'); 
?>