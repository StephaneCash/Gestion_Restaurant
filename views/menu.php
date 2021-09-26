
<?php
    require_once("identifier.php");
?>

<style>
    #logo{
        width: 35px;
    }
    #textG{
        margin-top: 61px !important;
    }
    
</style>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container-fluid">
        <ul class="nav navbar-nav">

           <li> <a href="home.php" class="navbar-brand" title="Page d'accueil">
                <li><img src="../Images/res.jpg" id="logo"></li>
                <span id="textG">Gestion Restaurant</span>
            </a></li>
            
                <li><a href="commandes.php" title ="Commandes des utilisateurs">Différentes commandes</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#" title ="User"><i class='glyphicon glyphicon-user '></i> <?php echo " ". $_SESSION['user']['nom']; ?></a></li>
                <li><a href="../back/seDeconnecter.php" title="Déconnexion"><i class='glyphicon glyphicon-log-out '></i> Se déconnecter</a></li>
            </ul>
    </div>
</nav>