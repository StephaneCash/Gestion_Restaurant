<?php
    session_start();
    if(isset($_SESSION['Erreurlogin']))
        $erreurLogin = $_SESSION['Erreurlogin'];
    else{
        $erreurLogin="";
    }
    session_destroy();
?>

<! DOCTYPE HTML>
<html>
    <head>
        <meta charset="utf-8">
        <title>Authentification</title>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    </head>

    <style>
        .panel-primary .panel-heading {
            background-color: #282c34;
            border-color: #282c34;
        }
        .panel{
            border-color: #282c34;

        }
    </style>

    <body>
    
          
        <!-- Centrer le contenu de la page -->
        <div class="container col-lg-4 col-lg-offset-4 col-md-6 col-md-offset-3">  
            
            <!-- Premier block composé d'entête et du corps (Côté recherche) -->
            <div class="panel panel-primary" style="margin-top: 80px;"> 
                <div class="panel-heading"><h4> Veuiller vous connecter en utilisant votre username et votre password </h4>   
                <span  class="glyphicon glyphicon-user" style="font-size: 50px;" > </span>
                </div>
                <div class="panel-body">
                    
                    <form method="post" action="../back/seConnecter.php" class="form">   
                          <?php if(!empty($erreurLogin)){?>
                            <div class="alert alert-danger">
                                <?php echo $erreurLogin; ?> 
                            </div>
                         <?php } ?>
                            
                        <div class="form-group"> 
                            <label for="login">Nom d'utilisateur ou email  </label>
                            <input type="text" name="login" placeholder="Nom d'utilisateur" class="form-control" id="login"  required />
                            
                            <label for="pwd">Mot de passe  </label>
                            <input type="password" name="pwd" placeholder="Mot de passe" class="form-control" id="pwd" required />                            
                        </div>

                         <!-- Bouton de recherche -->
                        <button type="submit" class="btn btn-primary"> 
                            <span class="glyphicon glyphicon-log-in"> </span> Se connecter
                         </button>
                    </form>
                </div>            
            </div>
        </div>
        
    </body>
</html>


