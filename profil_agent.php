<?php
session_start();
require 'database.php';
if (!isset($_SESSION['name']))
{
    header ('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="fr">
<head>
    <title>Agent | GDA</title>
    <meta charset="utf-8">
    <!-- script date et heure -->
    <script type="text/javascript" src="gallery/js/showtime.js"></script>

    <!-- offline -->
    <link rel="stylesheet" href="gallery/css/bootstrap.css">
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
                <li><a href="#">Service de traitement</a></li>
                <!--<li><a href="#">Statistique du Personnel</a></li>-->
            </ul>

            <ul class="nav navbar-nav navbar-right">
                <li><a>Bienvenue <?php echo htmlentities(trim($_SESSION['name'])); ?> !</a></li>
                <li><a class="text-capitalize" href="logout.php">se déconnecter</a></li>
            </ul>
        </div>
    </div>
</nav>
<h2>Gestion de Demande d'Action</h2>
<h5><p id="date_heure"></p></h5>
<script type="text/javascript">window.onload = date_heure('date_heure');</script>
<hr>

<div class="container-fluid">

    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#receptiondemande">Demande en cours</a></li>
        <li><a data-toggle="tab" href="#servicetraitement">Service Traitement</a></li>
    </ul>

    <div class="tab-content">

        <!-- tab reception demande-->
        <div id="receptiondemande" class="tab-pane fade in active">
            <div class="container-fluid">
                <h3>Demande en cours</h3>
                <table class="table table-bordered table-hover">
                    <thead>
                    <tr>
                        <th class="text-center">ID Demande Action</th>
                        <th class="text-center">Reference Demande Action</th>
                        <th class="text-center">Direction</th>
                        <th class="text-center">Objet</th>
                        <th class="text-center">Date de Reception</th>
                        <th class="text-center">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    $result=mysqli_query($con," SELECT id_demande,reference,direction,objet,creation FROM demande ") or trigger_error("<strong>Erreur rencontre:</strong> " .mysqli_error($con), E_USER_ERROR);
                    while($reception=mysqli_fetch_assoc($result)):
                        ?>
                        <tr>
                            <td><?= $reception['id_demande'];?></td>
                            <td><?= $reception['reference'];?></td>
                            <td><?= $reception['direction'];?></td>
                            <td><?= $reception['objet'];?></td>
                            <td><?= $reception['creation'];?></td>
                            <td>
                                <a class="btn btn-info btn-xs" href="view.php?id=<?=$reception['reference'];?>">Voir</a>
                            </td>
                        </tr>
                    <?php endwhile;?>
                    </tbody>
                </table>
            </div>
        </div><!--./tab reception -->

        <div id="servicetraitement" class="tab-pane fade">
            <h3>Traitement de Demande d'action</h3>
            <table class="table table-bordered">
                <thead>
                <tr>
                    <th class="text-center">ID Demande</th>
                    <th class="text-center">Reference Demande Action</th>
                    <th class="text-center">Direction</th>
                    <th class="text-center">Fonction</th>
                    <th class="text-center">Nom</th>
                    <th class="text-center">Objet</th>
                    <th class="text-center">R&eacute;ception Demande</th>
                    <th class="text-center">Compteur</th>
                    <th class="text-center">Evolution du taitement</th>
                    <th class="text-center">Probleme rencontr&eacute;</th>
                    <th class="text-center">Action par piece jointe</th>
                    <th class="text-center">Action par mail</th>
                </tr>
                </thead>
                <tbody>
                <?php $s=mysqli_query($con, "SELECT nom_service FROM service") or trigger_error("erreur de la requete:".mysqli_error($con), E_USER_ERROR);
                $srv=mysqli_fetch_assoc($s);
                $a=mysqli_query($con, "SELECT nom_agent FROM agent") or trigger_error("erreur de la requete:".mysqli_error($con), E_USER_ERROR);
                $agt=mysqli_fetch_assoc($a);
                ?>
                <?php
                $result2=mysqli_query($con,"SELECT * FROM demande") or trigger_error("<strong>Erreur rencontre:</strong>" .mysqli_error($con), E_USER_ERROR);
                while($work=mysqli_fetch_assoc($result2)):
                    ?>
                    <tr>
                        <td><?= $work['id_demande'];?></td>
                        <td><?= $work['reference'];?></td>
                        <td><?= $work['direction'];?></td>
                        <td><?= $work['fonction'];?></td>
                        <td><?= $work['nom'];?></td>
                        <td><?= $work['objet'];?></td>
                        <td><?= $work['creation'];?></td>
                        <!--compteur-->
                        <td><?=$work['detail'];?></td>
                        <td>

                            <form method="post" action="">

                                <div class="btn-group-vertical btn-group-md">
                                    <button class="btn btn-default" type="submit" name="evolution" value="Affect&eacute;e">Affect&eacute;e</button>
                                    <button class="btn btn-default" type="submit" name="evolution" value="Traitement">Traitement</button>
                                    <button class="btn btn-default" type="submit" name="evolution" value="Fin">Fin</button>
                                </div>
                                <!--<input class="checkbox" type="radio" name="evolution" value="Reception" onclick="this.form.submit();">Reception<br>
                                <input class="checkbox" type="radio" name="evolution" value="Execution" onclick="this.form.submit();">Execution<br>
                                <input class="checkbox" type="radio" name="evolution" value="Fin" onclick="this.form.submit();">Fin-->
                            </form>
                            <?php
                            if(isset($_POST['evolution']))
                            {
                                $evolution=$_POST['evolution'];
                                $evo=mysqli_query($con,"INSERT INTO rapportdemande (evolution,dateevolution) VALUES ('".$evolution."',NOW())");
                            }
                            ?>
                        <td>
                            <form action="" method="post">
                                <input type="hidden" name="id_demande">
                                <input type="text" name="probleme">
                                <button class="btn btn-default btn-xs" type="submit" name="valider">valider</button>
                            </form>
                            <?php
                            $sql="SELECT * FROM demande";
                            $query=mysqli_query($con,$sql);
                            $res=mysqli_fetch_assoc($query);
                            if(isset($_POST['valider']))
                            {
                                $id=(int)$res['id_demande'];
                                $probleme=$_POST['probleme'];
                                $sql="UPDATE demande SET rapport='".$probleme."' WHERE id_demande='".$id."'";
                                $query=mysqli_query($con,$sql);
                            }
                            ?>
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
                        <td><!--email-->
                            <a href="mail_demande.php?id=<?= $work['reference'];?>" class="btn btn-default btn-xs">Envoi par mail</a>
                        </td>
                    </tr>
                <?php endwhile;?>
                </tbody>
            </table>
        </div>
    </div>
</div>