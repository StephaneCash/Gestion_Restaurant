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
    </style>

    <body>
    <?php include "menu.php"?>

        <div class="container">
            <h3>Ajouter un repas </h3>
            <form action="../back/insertRepas.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label>Entrer le nom du repas</label>
                    <input type="text" placeholder="Nom du repas" name="nom" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Entrer le prix en $ </label>
                    <input type="number" placeholder="Prix du repas" name="prix" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>La Description </label>
                    <textarea type="text" placeholder="Description" name="detail" class="form-control" required></textarea>
                </div>

                <div class="form-group">Choisir une photo : <br><br>
                            <input type="file" name="photo" value="photo">
                </div>

                <button type="submit" class="btn btn-primary"> 
                    <span class="glyphicon glyphicon-save"> </span> Enregistrer
                </button>
            </form>
        </div>
    </body>
</html>

