<?php 
    require_once("../BD/connexion.php"); // Connexion à la BD

    $requte = "SELECT * FROM users";

    $resultatRepas = $pdo->query($requte);
    $users = $resultatRepas->fetch();

    $requeteRepas = "SELECT * FROM repas";
    $resultatR = $pdo->query($requeteRepas);

    $repas = $resultatR->fetch();
    $nomRepas = $repas['nom'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Commande repas</title>
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
        <form action="../back/insertCommande.php" method="post">
            <h3>Passer votre commande </h3>
            <label for="repas"> Choisir un repas : </label>
            <div class="form-group"> 
                <select name="repas" class="form-control" id="repas">
                    <?php while($repas = $resultatR->fetch()) { ?>
                        <option value=" <?php echo $repas['nom']; ?> "
                                <?php if ($nomRepas === $repas['nom'] ) echo "selected" ; ?>>
                                <?php echo $repas['nom']; ?>
                        </option>
                    <?php } ?>                 
                </select>      
            </div>

            <div class="form-group">
                <label>Défnir une quantité</label>
                <input type="number" name="quantite" class="form-control" placeholder="Défnir une quantité" required>
            </div>

            <button type="submit" class="btn btn-primary"> 
                    <span class="glyphicon glyphicon-save"> </span> Commander
            </button>
        </form>
    </div>
    </body>
</html>