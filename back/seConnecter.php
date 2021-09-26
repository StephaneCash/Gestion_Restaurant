
<?php 
    session_start();

    require_once('../BD/connexion.php');

    $login = isset($_POST['login'])?$_POST['login']:"";
    $pwd = isset($_POST['pwd'])?$_POST['pwd']:"";

    $requeteU = "select * from users where nom='$login' and password='$pwd' ";
    $resultatU = $pdo->query($requeteU);

    if($user=$resultatU->fetch()){
        if($user['etat']==1){
            $_SESSION['user']=$user;
            header('location: ../views/home.php');
        }else{
            $_SESSION['Erreurlogin']=" <strong> Erreur !! </strong> Votre compte est désactivé. <br> Veuiller contacter l'Admin";
            header('location: ../views/login.php');
        }
    }else{
        $_SESSION['Erreurlogin']=" <strong> Erreur !! </strong> Nom d'utilisateur ou mot de passe incorrect.";
        header('location: ../views/login.php');
    }
    
?>