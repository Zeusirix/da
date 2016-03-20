<?php include '../database.php';?>
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
                <li ><a href="add_user.php">Utilisateur</a></li>
                <li><a href="add_agent.php">Agent</a> </li>
                <li class="active"><a href="add_service.php">Service <span class="sr-only">(current)</span></a> </li>
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
    <a class="btn btn-primary" href="add_service.php">Ajouter un Service</a>

    <h3 align="center"><strong>Services</strong></h3>

    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID SERVICE</th>
            <th>NOM SERVICE</th>
            <th>ID AGENT</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $q=mysqli_query($con,"SELECT * FROM service");/*INNER JOIN agent ON agent.id_agent=service.id_service");*/
        while($showService=mysqli_fetch_assoc($q)):
            ?>
            <tr>
                <td align="center"><?= $showService['id_service'];?></td>
                <td align="center"><?= $showService['nom_service'];?></td>
                <td align="center"><?= $showService['id_agent'];?></td>
            </tr>
        <?php endwhile;?>
        </tbody>
    </table>
</div>