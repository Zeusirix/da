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
                <li class="active"><a href="add_user.php">Utilisateur <span class="sr-only">(current)</span></a></li>
                <li><a href="add_agent.php">Agent</a></li>
                <li><a href="view_service.php">Service</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="profil_directeur.php">Bienvenue <?php #echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
                <li><a href="logout.php">se deconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">

    <div class="tab-content">

        <br><br>
        <a class="btn btn-primary" href="add_user.php">Ajouter un utilisateur</a>

        <div class="container-fluid">

            <h3 align="center"><strong>Liste des Utilisateurs</strong></h3>

            <table class="table table-bordered">
                <thead>
                <tr>
                    <th>ID Utilisateur</th>
                    <th>Nom</th>
                    <th>Fonction</th>
                    <th>Administration</th>
                    <th>Direction</th>
                    <th>T&eacute;l&eacute;phone</th>
                    <th>Email</th>
                </tr>
                </thead>

                <tbody>
                <?php
                $sql="SELECT * FROM utilisateur";
                $query=mysqli_query($con,$sql) or die("Echec d'affichage du contenu: " .mysqli_error($con));
                while($exe=mysqli_fetch_assoc($query)):
                ?>
                    <tr>
                        <td><?= $exe['c_util'];?></td>
                        <td><?= $exe['nom'];?></td>
                        <td><?= $exe['fonction'];?></td>
                        <td><?= $exe['administration'];?></td>
                        <td><?= $exe['direction'];?></td>
                        <td><?= $exe['telephone'];?></td>
                        <td><?= $exe['email'];?></td>
                    </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>

    </div>

</div>
</body>
</html>