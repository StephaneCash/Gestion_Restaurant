<?php 
    require_once("../BD/connexion.php"); // Connexion à la BD

    $requete = "SELECT * FROM commande ";
    $requeteCount = "SELECT count(*) countCommande FROM commande";

    $resultExe = $pdo->query($requete);
    $resultCunt = $pdo->query($requeteCount);

    $tabCount = $resultCunt->fetch();
    $nbreRepas = $tabCount['countCommande'];
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page d'accueil</title>
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
        table thead tr th{
            font-size: 17px;
            font-family: Segoe UI;
        }
        table tbody tr td{
            font-size: 15px;
            font-family: Segoe UI;
        }
    </style>

    <body>
    <?php include "menu.php"?>
        <div class="container">
            <h4>Nombre de commande : <?php echo $nbreRepas ?></h4>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="font-family: 'Segoe UI'; width: 350px ">Nom</th>
                    <th>Quantité</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                
                <?php while($commande=$resultExe->fetch()){?> 
                    <tr>
                    <td style="font-family:Segoe UI"> <?php echo $commande['idCommande'] ?> </td>
                    <td style="font-family: 'Segoe UI'; "> <?php echo $commande['nomRepas'] ?> </td> 
                    <td> <?php echo $commande['quantite'] ?> </td>
                
                    <?php if($commande['status'] == 0){?>
                        <td style="color:red"> <i class="fa fa-square"></i> En attente</td>
                    <?php } ?>
                    <?php if($commande['status'] == 1){?>
                        <td style="color:green"> <i class="fa fa-square"></i> Servi</td>
                    <?php } ?>

                    </td>
                    <td>
                    <?php if ($commande["status"] == 1) {?>
                        Déjà répondu
                    <?php }?>
                    <?php if ($commande["status"] == 0) {?>
                            <a onclick="return confirm('Avez-vous répondu à la commande ?')"
                                href="../back/statusCommande.php?id=<?php echo $commande['idCommande'] ?>&status=<?php echo 0  ?>">
                                    ?? Répondre à la commande
                            </a>
                            
                    <?php }?>
                    </td>

                    </tr>
                <?php }?>
                
            </tbody>
        </table>
        </div>
    </body>
</html>