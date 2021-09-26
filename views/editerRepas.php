<?php 
    require_once("../BD/connexion.php"); // Connexion à la BD

    $id = isset($_GET['id'])?$_GET['id']:0;

    $requete = "SELECT * FROM repas where idRepas = $id";

    $resultat = $pdo->query($requete);
    $repas = $resultat->fetch();

    $nom = $repas['nom'];
    $prix = $repas['prix'];
    $detail =$repas['detail'];
    $detail =$repas['detail'];
    $photo =$repas['photo'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editer Repas</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="../css/font-awesome.css">
    </head>

    <style>
        .container{
            margin-top: 70px;
            border: 1px solid silver;
            height: auto;
            border-radius: 4px;
            padding:10px;
        }
        input[type="file"]{
            width: auto;
        }
        button{
            margin-bottom: 10px !important;
        }
    </style>

    <body>
    <?php include "menu.php"?>
    <div class="container">
            <h3>Editer repas </h3>
            <form action="../back/updateRepas.php" method="post" enctype="multipart/form-data">
                <div class="form-group"> 
                    <label for="idI">id : <?php echo $id ?></label>
                    <input type="hidden" name="idUp" class="form-control" id="idUp" value = "<?php echo $id ?>"/> 
                </div>
                <div class="form-group">
                    <label>Entrer le nom du repas</label>
                    <input type="text" placeholder="Nom du repas" name="nomUp" class="form-control" value="<?php echo $nom ?>" >
                </div>

                <div class="form-group">
                    <label>Entrer le prix en $ </label>
                    <input type="number" placeholder="Prix du repas" name="prixUp" class="form-control" value="<?php echo $prix ?>" >
                </div>

                <div class="form-group">
                    <label>La Description </label>
                    <input type="text" placeholder="Description" name="detailUp" class="form-control" value="<?php echo $detail ?>" >
                </div>

                <div class="form-group">Choisir une photo : <br><br>
                        <input type="file" name="photo" value="photo">
                </div>

                <button type="submit" class="btn btn-success"> 
                    <span class="glyphicon glyphicon-save"> </span> Enregistrer
                </button>
            </form>
        </div>
    </body>
</html>