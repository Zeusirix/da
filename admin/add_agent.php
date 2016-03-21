<?php
include '../database.php';

/*
 * AJOUT D'UN AGENT
 */

if(isset($_POST['save-agent'])):

    $idAgent=$_POST['id_agent'];
    $nomAgent=$_POST['nom_agent'];
    $idService=$_POST['id_service'];

    $sql="INSERT INTO agent(id_agent,nom_agent,id_service) VALUES('$idAgent','$nomAgent','$idService')" or die('erreur d\'insertion: '.mysqli_error($con));
    $query=mysqli_query($con,$sql);
    header("REFRESH:1;URL=view_agent.php");

    $message='';

    if($query):
        $message="<div class='alert alert-success alert-dismissible text-center'>Agent ajouter avec succes</div>";
    else:
        $message="<div class='alert alert-danger alert-dismissible text-center'><strong>Echec d'ajout du agent!</strong></div>";
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
                <li class="active"><a href="add_agent.php">Agent <span class="sr-only">(current)</span></a></li>
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
    <a class="btn btn-primary" href="view_agent.php">Voir les agents</a>
    
    <h3 align="center"><strong>Ajouter Agent</strong></h3>

    <?php if(!empty($message)):?><div><p><strong><?php echo $message;?></strong></p></div><?php endif;?>

    <form class="form-horizontal" method="post" action="">

        <div class="form-group">
            <label class="col-md-4 control-label">ID Agent:</label>
            <div class="col-md-4">
                <input class="form-control" type="number" name="id_agent">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nom Agent:</label>
            <div class="col-md-4">
                <input class="form-control" type="text" name="nom_agent">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">ID Service:</label>
            <div class="col-md-4">
                <input class="form-control" type="number" name="id_service">
            </div>
        </div>

        <div class="form-group">
            <label class="col-md-4 control-label">Nom service:</label>
            <div class="col-md-4">
                <select class="form-control" name="nom_service">
                    <option>Choisir un service</option>
                    <option value="Direction">1- Direction</option>
                    <option value="Informaitsation">2- Informatisation</option>
                    <option value="Application Informatique">3- Application Informatique</option>
                    <option value="Exploitation et Maintenance">4- Exploitation et Maintenance</option>
                </select>
            </div>
        </div>
        <div class="form-group">
            <div class="col-md-4 col-lg-offset-4">
                <button class="btn btn-primary" type="submit" name="save-agent">Sauvegarder</button>
            </div>
        </div>
    </form>
</div>