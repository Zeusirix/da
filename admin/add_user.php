<?php
include '../database.php';
/*
 * ADD USERS
 */
if(isset($_POST['add'])):

    $id=$_POST['numuser'];
    $nom=$_POST['nom'];
    $fonction=$_POST['fonction'];
    $admin=$_POST['administration'];
    $direction=$_POST['direction'];
    $telephone=$_POST['telephone'];
    $email=$_POST['email'];

    $req=mysqli_query($con,"INSERT INTO utilisateur(c_util, nom, fonction, administration, direction, telephone, email) VALUES ('$id','$nom','$fonction','$admin','$direction','$telephone','$email')" or die("Echec d'insertion: ".mysqli_error($con)));

    $message='';

    if($req):
        echo $msg="<div class='alert alert-success alert-dismissible text-center' role='alert'>Enregistrement reussi!</div>";
        header("REFRESH:1;URL=view_user.php");
    else:
        echo $msg="<div class='alert alert-danger alert-dismissible text-center' role='alert'>Echec d'enregistrement</div>";
    endif;

    #header("REFRESH:1");
endif;
?>
<!doctype html>
<html>
<head>
    <link rel="stylesheet" href="css/cerulean.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
<nav class="navbar navbar-default navbar-static-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">DGI</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="active"><a href="add_user.php">Utilisateur <span class="sr-only">(current)</span></a></li>
                <li><a href="add_agent.php">Agent</a></li>
                <li><a href="add_service.php">Service</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profil_directeur.php">Bienvenue <?php #echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
                <li><a href="logout.php">se deconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>



<div class="container">
    <br><br>
    <a class="btn btn-primary" href="view_user.php">Voir les utilisateurs</a>
    <h3 align="center"><strong>Ajouter Utilisateur</strong></h3>

    <?php if(!empty($message)):?><div><p><strong><?php echo $message;?></strong></p></div><?php endif;?>

    <form class="form-horizontal" method="post" action="">
            <div class="form-group">
                <label class="col-md-4 control-label">Num&eacute;ro utilisateur:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="numuser">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Nom:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="nom">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Fonction:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="fonction">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Administration:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="administration">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">Direction:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="direction">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">T&eacute;l&eacute;phone:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="telephone">
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-4 control-label">E-mail:</label>
                <div class="col-md-4">
                    <input class="form-control" type="text" name="email">
                </div>
            </div>
            <div class="form-group">
                <div class="col-lg-4 col-lg-offset-4">
                    <button class="btn btn-default" type="reset">Annuler</button>
                    <button class="btn btn-primary" type="submit" name="add">Enregistrer</button>
                </div>
            </div>
    </form>

</div>