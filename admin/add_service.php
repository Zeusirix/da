<?php
include '../database.php';

/*
 * AJOUT D'UN SERVICE
 */

if(isset($_POST['save-service'])):

    $idService=$_POST['id_service'];
    $nomService=$_POST['nom_service'];

    $sql="INSERT INTO service(id_service, nom_service) VALUES('$idService','$nomService')" or die('Echec d\'insertion dans la table service: '.mysqli_error($con));
    $query=mysqli_query($con,$sql);
    header("REFRESH:1;URL=view_service.php");

    $message='';

    if($query):
        $message="<div class='alert alert-success alert-dismissible text-center'>Service ajouter avec succes</div>";
    else:
        $message="<div class='alert alert-danger alert-dismissible text-center'>Echec</div>";
    endif;

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
                <li><a href="add_user.php">Utilisateur</a></li>
                <li><a href="add_agent.php">Agent</a></li>
                <li class="active"><a href="add_service.php">Service <span class="sr-only">(current)</span></a></li>
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
    <a class="btn btn-primary" href="view_service.php">Voir les services</a>

    <h3 align="center"><strong>Ajouter un service</strong></h3>

    <?php if(!empty($message)):?><div><p><strong><?php echo $message;?></strong></p></div><?php endif;?>

    <form class="form-horizontal" method="post" action="">

        <div class="form-group">
            <label class="col-md-4 control-label">ID Service:</label>
            <div class="col-md-4">
                <input class="form-control" type="number" name="id_service">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nom Service:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="nom_service">
            </div>
        </div>

        <div class="form-group">
            <div class="col-md-4 col-lg-offset-4">
                <button class="btn btn-primary" type="submit" name="save-service">Sauvegarder</button>
            </div>
        </div>
    </form>
    
</div>