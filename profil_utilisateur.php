<?php
session_start();

require 'database.php';

if (!isset($_SESSION['email']) || !isset($_SESSION['name']))
{
    header ('Location: index.php');
    exit();
}

$id=null;

if(isset($_GET['id']))
{
    $id=$_REQUEST['id'];
}

$message="";

if(isset($_POST['submit']))
{
    if(empty($_POST['objet']) && empty($_POST['description']))
    {
        $message="<div class='alert alert-danger alert-dismissible text-center' role='alert'>Veuillez remplir les champs: objet et description sont obligatoires!</div>";
    }
    elseif(!empty($_POST['objet']) && empty($_POST['description']))
    {
        $message="<div class='alert alert-danger alert-dismissible text-center' role='alert'>Veuillez remplir le champ description !</div>";
    }
    elseif(empty($_POST['objet']) && !empty($_POST['description']))
    {
        $message="<div class='alert alert-danger alert-dismissible text-center' role='alert'>Veuillez remplir le champ objet !</div>";
    }

    if(!empty($_POST['objet']) && !empty($_POST['description']))
    {
        if(isset($_POST['materiel']))
        {
            $materiel = isset($_POST['materiel']) ? $_POST['materiel'] : null;
            //variables pour storer es differentes values si elles sont coches
            $routine_array = $_POST['materiel'];
            //variable pour avoir plusieurs valeurs et separes d'une virgule
            //$routine_en_string_avec_virgules =
            is_null($routine_en_string_avec_virgules);
            $routine_en_string_avec_virgules = implode(',', $routine_array);
            $tableau_de_routines = explode(',',$routine_en_string_avec_virgules);
        }

        $objet=$_POST['objet'];
        $description=htmlentities($_POST['description'],ENT_QUOTES);
        $comment=htmlentities($_POST['detail'],ENT_QUOTES);
        $reference = "DGI_".date('Ymd').rand(1,9999);

        //upload fchier
        if(isset($_FILES['document']))
        {
            #$fileInfos=pathinfo($_FILES['document']['name']);
            #$extension=$fileInfos['extension'];
            #$doc="PJ_".$reference.".".$extension;
            $folder="demande/";
            $fichier=$_FILES['document']['name'];
            move_uploaded_file($_FILES['document']['tmp_name'], $folder.$fichier);
        }
        else
        {
            echo '<script>alert("Fichier non charge!")</script>';
        }

        if(!isset($routine_en_string_avec_virgules)) $routine_en_string_avec_virgules=null;

        //formatage du id_demande
        $id_dm="DA".rand(1,1000);
        //c_util
        $id_cu=$_POST['numuser'];

        $sql="INSERT INTO demande(id_demande,materiel,objet,description,detail,document,creation)
VALUES('".$id_dm."','".$routine_en_string_avec_virgules."','".$objet."','".$description."','".$comment."','".$fichier."', NOW())";
        
        $query=mysqli_query($con, $sql) or die("<script>alert('Ne peut executer la requete!')</script>" .mysqli_error($con));
        if($query)
        {
            $message="<div class='alert alert-success alert-dismissible text-center' role='alert'>Formulaire enregistr&eacute; avec succ&egrave;s !</div>";
            header("Refresh: 2; url=profil_utilisateur.php");

        }
        else
        {
            $message="<div class='alert alert-danger alert-dismissible text-center' role='alert'>Erreur rencontr&eacute; a l'enregistrement!</div>";
        }
    }
}
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Utilisateur | GDA</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- script pour afficher la date et temps -->
    <script type="text/javascript" src="gallery/js/showtime.js"></script>

    <!-- offline -->
    <link rel="stylesheet" href="gallery/css/cerulean.css">
    <script type="text/javascript" src="gallery/js/jquery.min.js"></script>
    <script type="text/javascript" src="gallery/js/bootstrap.min.js"></script>

    <!--en ligne-->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
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
                <li><a href="#"></a></li>
                <li><a href="#"></a></li>
                <!--<li><a href="#">Statistique du Personnel</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a>Bienvenue <?php echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
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
    <input type="hidden" name="c_util">
<div class="container">

    <!--navigation tab-->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#formulaire">Saisie de la Demande</a></li>
        <li><a data-toggle="tab" href="#consultation">Consultation de Demande</a></li>
    </ul>

    <!-- contenu tab-->
    <div class="tab-content">

        <!-- saisie de la demande -->
        <?php include 'formulaire.php';?>

        <!-- contenu consultation de la demande -->
        <?php include 'consultation.php';?>

    </div><!-- fin tab contenu -->

</div><!--./container-->

</body>
</html>
