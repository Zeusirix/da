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
    <title>Chef de Service | GDA</title>
    <meta charset="utf-8">
    <!-- script date et heure -->
    <script type="text/javascript" src="gallery/js/date_heure.js"></script>

    <!-- offline -->
    <link rel="stylesheet" href="gallery/css/bootstrap.min.css">
    <script type="text/javascript" src="gallery/js/jquery.min.js"></script>
    <script type="text/javascript" src="gallery/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="gallery/js/ui_timepicker_addon.js"></script>
    <!--en ligne
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
    <style>
        body
        {
            margin: 0px;
            /* margin-bottom: 20px;*/
            padding: 0px;
            font-family: Candara, Constantia, "Trebuchet MS",Comfortaa , cursive;
            text-align: center;
        }

        .header
        {
            margin-top: 20px;
            margin-bottom: 15px;
        }
    </style>
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
                <li class="active"><a href="#">Reception <span class="sr-only">(current)</span></a></li>
                <li><a href="#">Rapport de traitement</a></li>
                <!--<li><a href="#">Statistique du Personnel</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a>Bienvenue <?php echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
                <li>
                    <h4><span id="date_heure"></span></h4>
                    <script type="text/javascript">window.onload = date_heure('date_heure');</script>
                </li>
                <li><a class="text-capitalize" href="logout.php">se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>
<h2>Gestion Demande d'Action</h2>
<h5><p id="date_heure"></p></h5>
<script type="text/javascript">window.onload = date_heure('date_heure');</script>
<hr>

<div class="container">

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#receptiondemande">Reception Demande</a></li>
        <li><a data-toggle="tab" href="#rapporttraitement">Rapport Traitement</a></li>
    </ul>

    <div class="tab-content">

        <!-- tab reception demande-->
        <div id="receptiondemande" class="tab-pane fade in active">
            <div class="container">
                <h3>Reception Demande Action</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">ID Demande Action</th>
                        <th class="text-center">Reference Demande Action</th>
                        <th class="text-center">Direction</th>
                        <th class="text-center">Objet</th>
                        <th class="text-center">Date de Reception</th>
                        <th class="text-center">Action</th>
                        <th class="text-center">Action par attachement</th>
                        <th class="text-center">Action par mail</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result=mysqli_query($con,"SELECT id_demande,reference,direction,objet,creation FROM demande") or trigger_error("<strong>Erreur rencontre:</strong> " .mysqli_error($con), E_USER_ERROR);
                    while($reception=mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?= $reception['id_demande'];?></td>
                            <td><?= $reception['reference'];?></td>
                            <td><?= $reception['direction'];?></td>
                            <td><?= $reception['objet'];?></td>
                            <td><?= $reception['creation'];?></td>
                            <td>
                                <a class="btn btn-default btn-xs" href="voiraffectation.php">Voir</a>
                                <a class="btn btn-default btn-xs" href="affectation.php">Affecter</a>
                            </td>
                            <td>
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_rapport">
                                    <input type="file" name="fichier">
                                    <input class="btn btn-default btn-xs" type="submit" name="upload" value="Envoyer">
                                </form>
                                <?php
                                if(isset($_POST['upload']))
                                {
                                    $s="SELECT * FROM rapportdemande";
                                    $req=mysqli_query($con,$s);
                                    $exe=mysqli_fetch_assoc($req);
                                    $id=(int)$exe['id_rapport'];
                                    $folder="rapport_demande/";
                                    $file_name = $_FILES['fichier']['name'];
                                    $fileInfos = pathinfo($_FILES['fichier']['name']);
                                    $extension = $fileInfos['extension'];
                                    $file = $work['reference']."DA".date('YmdHis').".".$extension;
                                    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $folder.$file))
                                    {
                                        $query = mysqli_query($con, "UPDATE rapportdemande SET document=$file,dateretour=NOW() WHERE id_rapport=$id");
                                    ?>
                                        <script>alert('Fichier envoye!')</script>
                                    <?php
                                    }
                                    else
                                    {
                                    ?>
                                        <script>alert('Fichier non envoye!')</script>
                                        <?php
                                    }
                                }
                                ?>
                            </td>
                            <td>
                                <a href="mail_demande.php?id=<?= $reception['reference'];?>" class="btn btn-default btn-xs">Envoi par mail</a>
                            </td>
                        </tr>
                    <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div><!--./tab reception -->

        <div id="rapporttraitement" class="tab-pane fade">
            <h3>Rapport traitement</h3>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID Demande</th>
                        <th class="text-center">Reference Demande Action</th>
                        <th class="text-center">Direction</th>
                        <th class="text-center">Fonction</th>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Objet</th>
                        <th class="text-center">Executif du Traitement</th>
                        <th class="text-center">Date envoy&eacute;e</th>
                        <th class="text-center">Evolution du taitement</th>
                        <th class="text-center">Probleme rencontr&eacute;</th>
                        <th class="text-center">Date retour</th>
                        <th class="text-center">Avis du Demandeur</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                //afficher le service
                $s=mysqli_query($con,"SELECT nom_service FROM service") or trigger_error("erreur de la requete:".mysqli_error($con), E_USER_ERROR);
                $srv=mysqli_fetch_assoc($s);
                //afficher l'agent
                $a=mysqli_query($con,"SELECT nom_agent FROM agent") or trigger_error("erreur de la requete:".mysqli_error($con), E_USER_ERROR);
                $agt=mysqli_fetch_assoc($a);
                //afficher les elements de tbl_affectation
                $x=mysqli_query($con,"SELECT * FROM affectation");
                $aff=mysqli_fetch_assoc($x);
                //requete pour afficher specifiquement tout le contenu de la table rapportdemande
                $tes=mysqli_query($con,"SELECT * FROM rapportdemande");
                $test=mysqli_fetch_assoc($tes);
                $id=(int)$test['id_rapport'];
                $req=mysqli_query($con,"SELECT * FROM rapportdemande WHERE id_rapport=$id") or die("erreur de rapport demande".mysqli_error($con));
                $cons=mysqli_fetch_assoc($req);
                //afficher la demande
                $result2=mysqli_query($con," SELECT id_demande,reference,direction,fonction,nom,objet,creation FROM demande ") or trigger_error("<strong>Erreur rencontre:</strong> " .mysqli_error($con), E_USER_ERROR);
                while($work=mysqli_fetch_assoc($result2)):
                    ?>
                    <tr>
                        <td><?= $work['id_demande'];?></td>
                        <td><?= $work['reference'];?></td>
                        <td><?= $work['direction'];?></td>
                        <td><?= $work['fonction'];?></td>
                        <td><?= $work['nom'];?></td>
                        <td><?= $work['objet'];?></td>
                        <td><?= $aff['service']."<br>".$aff['agent'];?></td>
                        <td><?= $work['creation'];?></td>
                        <td><?= $cons['evolution'];?></td>
                        <td><?= $cons['probleme'];?></td>
                        <td></td>
                        <td><?= $cons['avis'];?></td>
                    </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>

</div>