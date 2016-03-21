<?php
session_start();

require 'database.php';

if (!isset($_SESSION['email']))
{
    header ('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <!-- script pour afficher la date et temps -->
    <script type="text/javascript" src="gallery/js/showtime.js"></script>
    <!-- script pour recevoir et envoyer les valeurs de la liste deroulante-->
    <script type="text/javascript" src="gallery/js/script.js"></script>
    <!-- script pour datepicker-->
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script_2.js"></script>
    <!---- fin du script------>
    <link rel="stylesheet" href="gallery/css/bootstrap.css">
    <link rel="stylesheet" href="gallery/css/jquery-ui.css">
    <link rel="stylesheet" href="gallery/css/bootstrap.min.css">

    <script type="text/javascript" src="gallery/js/jquery.min.js"></script>
    <script type="text/javascript" src="gallery/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="gallery/js/jquery-ui.js"></script>
    <script type="text/javascript" src="gallery/js/jquery-1.9.1.js"></script>
    <script type="text/javascript" src="gallery/js/jquery-1.4.1.min.js"></script>
    <script type="text/javascript" src="gallery/js/jquery.1.7.1.min.js"></script>
    <script type="text/javascript" src="gallery/js/script_2.js"></script>
    <script type="text/javascript" src="gallery/js/timepicker.js"></script>
</head>
<body>
<nav class="navbar navbar-default">
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
                <li><a href="#"><span class="sr-only">(current)</span></a></li>
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a href="profil_directeur.php">Bienvenue <?php echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
                <li><a class="text-capitalize" href="logout.php">se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>

<div align="center">
    <h2>Gestion Demande d'Action</h2>
    <h5><p id="date_heure"></p></h5>
    <script type="text/javascript">window.onload = date_heure('date_heure');</script>
    <hr>
</div>

<div class="container-fluid">

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#receptiondemande">Reception Demande</a></li>
        <li><a data-toggle="tab" href="#rapporttraitement">Rapport Traitement</a></li>
        <li><a data-toggle="tab" href="#suivi">Suivi de la demande</a> </li>
        <li><a data-toggle="tab" href="#statistique">Statistique de Demande</a></li>
    </ul>

    <div class="tab-content">

        <!-- tab reception demande-->
        <div id="receptiondemande" class="tab-pane fade in active">
            <?php include 'reception.php';?>
        </div>

        <!-- tab rapport -->
        <div id="rapporttraitement" class="tab-pane fade">
            <?php include 'servicedetraitment.php';?>
        </div>

        <div id="suivi" class="tab-pane fade">
            <?php include 'suivi.php';?>
        </div>

        <!--statistique-->
        <div id="statistique" class="tab-pane fade">
            <?php include 'statistique.php';?>
        </div>

    </div>
</div>
</body>
</html>