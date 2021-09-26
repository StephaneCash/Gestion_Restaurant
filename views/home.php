<?php 
    require_once("identifier.php");
    require_once("../BD/connexion.php"); // Connexion à la BD

    $repas=isset($_GET['nomRepas'])?$_GET['nomRepas']:"";

    $requete = "SELECT * FROM repas WHERE nom like '%$repas%' ";
    $requeteCount = "SELECT count(*) countUser FROM repas";

    $resultExe = $pdo->query($requete);
    $resultCunt = $pdo->query($requeteCount);

    $tabCount = $resultCunt->fetch();
    $nbreRepas = $tabCount['countUser'];

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Page d'accueil</title>
        <link rel="stylesheet" href="../css/bootstrap.css">
    </head>

    <style>
        body{
            padding: 20px;
        }
        table{
            margin-top: 10px !important;
        }
        .form1{
            margin-top: 65px;
        }
        input[type="search"]{
            width:400px;
        }
        #commanderRepas{
            background-color:#282c34;
            border:1px solid black;
            padding: 8px;
            border-radius: 5px;
            color: aliceblue;
        }
        a{
            text-decoration: none  ;
        }
        a:hover, a:focus{
            text-decoration: none;
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
        <!-- Insertion de la page menu -->
        <?php include("menu.php") ?> 

        <div>
            <form method="get" action="home.php" class="form-inline form1"> 
                <div class="form-group"> 
                    <input type="search" name="nomRepas" placeholder="Taper le nom d'un repas" class="form-control inputRecherche" 
                        value="<?php  ?>"> 
                </div>
                         <!-- Bouton de recherche -->
                    <button type="submit" class="btn btn-success"> 
                        <span class="glyphicon glyphicon-search"> </span> Rechercher... 
                    </button> &nbsp; &nbsp;

                    <a href="commandeRepas.php" id="commanderRepas">Commander un repas</a> &nbsp; &nbsp;
                    <a href="newRepas.php">
                        <span class="glyphicon glyphicon-plus "  title="Ajouter un repas"> </span>Nouveau repas
                    </a> &nbsp;
                                
            </form>
        </div>

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th style="font-family: 'Segoe UI'; width: 350px ">Nom</th>
                    <th>Prix</th>
                    <th>Déscription</th>
                    <th><center>Actions</center></th>
                </tr>
            </thead>
            <tbody>
                
                <?php while($repas=$resultExe->fetch()){?> 
                    <tr>
                    <td style="font-family:Segoe UI"> <?php echo $repas['idRepas'] ?> </td>
                    <td style="font-family: 'Segoe UI'; "> <?php echo $repas['nom'] ?> <p style="text-align:center">
                    <img src="../Images/<?php echo $repas['photo']?>" width="40%">
                     </p> </td> 
                    
                    <td> <?php echo $repas['prix']. " $" ?> </td>
                    <td> <?php echo $repas['detail'] ?> </td>
                    <td> <center>

                    <a href="editerRepas.php?id=<?php echo $repas['idRepas'] ?>">
                        <span class="glyphicon glyphicon-edit "  title="Modifier ce repas"> </span>
                    </a> &nbsp;

                    <a onclick="return confirm('Etes-vous sûr de vouloir supprimer ce repas ?')"    
                        href="../back/SupprimerRepas.php?id=<?php echo $repas['idRepas'] ?>" title="Suppression du repas">
                            <span class="glyphicon glyphicon-trash"> </span>
                    </a>
                    </center>
                    </td>
                    </tr>
                <?php }?>
                
            </tbody>
        </table>
    </body>
</html>