<?php
require 'database.php';
if (isset($_POST['connexion']))
{

    if ((isset($_POST['email']) && !empty($_POST['email'])) && (isset($_POST['password']) && !empty($_POST['password'])))
    {
        // on teste si une entrée de la base contient ce couple login / pass
        $email=$_POST['email'];
        $password=$_POST['password'];

        $sql="SELECT COUNT(id) as rows,id,name,email,password,type FROM login WHERE email='$email' AND password='$password'";
        $res=mysqli_query($con,$sql) or die("erreur:".mysqli_error($con));
        $data=mysqli_fetch_assoc($res);

        if($data['rows']>0)
        {
            session_start();

            $_SESSION['id']=$data['id'];
            $_SESSION['type']=$data['type'];
            $_SESSION['name']=$data['name'];
            $_SESSION['email']=$data['email'];

            $location='';

            if($data=="admin"):
                header("Location:profil_admin.php");
            elseif($data=="user"):
                header("Location: profil_utilisateur.php");
            elseif($data=="di" || $data=="dia"):
                header("Location: profil_directeur.php");
            elseif($data=="sce_inf" || $data=="sce_app" || $data=="sce_exp"):
                header("location:profil_service.php");
            elseif($data=="agent"):
                header("Location:profil_agent.php");
            endif;
        }
        else// le visiteur s'est trompé soit dans son email, soit dans son mot de passe
        {
            $message = "<div class='alert alert-danger alert-dismissible' role='alert'>Les informations identifiants sont incorrectes !</div>";
        }
    }
    elseif(!empty($_POST['email']) && empty($_POST['password']))
    {
        $message = "<div class='alert alert-danger alert-dismissible' role='alert'>Veuillez remplir le champ de mot de passe !</div>";
    }
    elseif(empty($_POST['email']) && !empty($_POST['password']))
    {
        $message = "<div class='alert alert-danger alert-dismissible' role='alert'>Veuillez remplir le champ d'email !</div>";
    }
    else
    {
        $message = "<div class='alert alert-danger alert-dismissible' role='alert'>Veuillez remplir les champs !</div>";
        #header("Refresh:0; url=index.php");
    }
}
?>
<!doctype html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="gallery/css/signin.css">
    <link rel="stylesheet" href="gallery/css/style.css">
    <title>LOGIN</title>
</head>

<body>

<div class="header">
    <h2>Gestion de Demande d' Action</h2>
    <img src="images/dgi.jpg" alt="Direction General des Impots" width="250"/>
</div>

<div class="container">

    <form class="form-signin" action="index.php" method="post">

        <h3 class="form-signin-heading text-center">Connexion</h3>

        <?php if(!empty($message)):?>
            <div><p><strong class="text-center"><?php echo $message;?></strong></p></div>
        <?php endif;?>

        <input class="form-control" type="email" name="email" placeholder="votre email" value="<?php if (isset($_POST['email'])) echo htmlentities(trim($_POST['email'])); ?>">
        <input class="form-control" type="password" name="password" placeholder="votre mot de passe" value="<?php if (isset($_POST['password'])) echo htmlentities(trim($_POST['password'])); ?>">
        <button type="submit" name="connexion" class="btn btn-md btn-primary text-uppercase"><strong>se connecter</strong></button>

    </form>

</div>

</body>
</html>