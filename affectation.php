<?php
session_start();

require 'database.php';

$services = array(
    array('id' => 1, 'name' => 'Informatisation'),
    array('id' => 2, 'name' => 'Application Informatique'),
    array('id' => 3, 'name' => 'Exploitation et Maintenance')
);

$id=null;

if(isset($_GET['id']))
{
    $id=$_REQUEST['id'];
}
?>
<html>
<head>
    <meta charset="utf-8">
    <!-- script pour afficher la date et temps -->
    <script type="text/javascript" src="gallery/js/showtime.js"></script>

    <!-- Load jQuery from Google's CDN -->
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />

    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>

    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    <script src="script_2.js"></script>

    <link rel="stylesheet" href="runnable.css" />
    <link rel="stylesheet" href="gallery/css/cerulean.css">
    <link rel="stylesheet" href="gallery/css/jquery-ui.css">
    <link rel="stylesheet" href="gallery/css/bootstrap.min.css">
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
                    <li><a href="statistique.php">Statistique du Personnel</a></li>
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
    </div>

    <div align="center">
        <p>
            <?php echo "Affectation de la Demande d'Action du Num&eacute;ro: <strong>".$id."</strong>";?><br>
            <?php
            $sqlR="SELECT objet,detail FROM demande WHERE id_demande=$id";
            $reqR=mysqli_query($con, $sqlR) or die("Erreur rencontre: " .mysqli_error($con));
            $exeR=mysqli_fetch_assoc($reqR);
            extract($exeR);
            echo "Objet: <strong>".$objet."</strong><br>";
            echo "Commentaire: <strong>".$detail."</strong>";
            ?>
        </p>
        <button class="btn btn-info btn-xs" onclick="goBack()">Retour</button>
        <script>function goBack() {window.history.back();}</script>
        <hr>
    </div>

    <div  class="container">

        <form class="form-horizontal col-md-10 col-lg-push-3" action="" method="post" id="centre">
            <input type="hidden" name="id_demande">

            <div class="form-group">
                <label class="col-lg-2 control-label">Service:</label>
                <div class="col-lg-4">
                    <select class="form-control" id="service" name="service">
                        <option value="default">Choisir un service</option>
                        <?php foreach($services as $service):?>
                            <option value="<?= $service['name'];?>"><?= $service['name'];?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Agent:</label>
                <div class="col-lg-4">
                    <select class="form-control" id="agent" name="agent">
                        <option></option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Du:</label>
                <div class="col-lg-4">
                    <input class="form-control" id="pickup_date" type="text" name="temps1">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Au:</label>
                <div class="col-lg-4">
                    <input class="form-control" id="dropoff_date" type="text" name="temps2">
                </div>
            </div>

            <div class="form-group">
                <label class="col-lg-2 control-label">Commentaire:</label>
                <div class="col-lg-4">
                    <input class="form-control" id="detail" type="text" name="detail">
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-offset-2 col-lg-3">
                    <button class="btn btn-default" type="reset" name="cancel">Annuler</button>
                    <button class="btn btn-success" type="submit" name="submit">Envoyer</button>
                </div>
            </div>
        </form>
        <!--script recuperer service et agent-->
        <script src="script-treatment.js"></script>
    </div>

    <div>

        <?php
            if(isset($_POST['submit']))
            {
                //on récupère la valeur de chaque champ individuellement
                $service=$_POST['service'];
                $agent=$_POST['agent'];
                $comment=htmlentities($_POST['detail'],ENT_QUOTES) ? $_POST['detail'] : null;
                $dateS=isset($_POST['temps1']) ? $_POST['temps1'] : null;
                $dateF=isset($_POST['temps2']) ? $_POST['temps2'] : null;

                //on peut ensuite les enregistrer dans une base de donnees ou les afficher
                $sql="UPDATE demande SET service_affect=$service,agent_affect=$agent,date_debut_affect=$dateS,date_fin_affect=$dateF,detail_affect=$comment,creation_affect=NOW() WHERE c_util";
                $query=mysqli_query($con,$sql);
                if($query)
                {
                    echo "<script>window.location='profil_directeur.php';</script>";
                }
                #header("Refresh: 1; url=profil_directeur.php");

                /*if(empty($_POST['service']) && empty($_POST['agent']))
                {
                    echo "Veuillez selectionnez un service!";
                }

                if(isset($_POST['service']) == true)
                {
                    echo "Le service ".$service." traitera la demande d'action";
                }

                if(!empty($_POST['agent']) == true)
                {
                    echo " par ".$agent ;
                }

                if(!empty($_POST['temps1']) && !empty($_POST['temps2']))
                {
                    echo " " .$dateS." - ".$dateF. " ";
                }
                elseif(!empty($_POST['temps1']) && empty($_POST['temps2']))
                {
                    echo " " .$_POST['temps1'];
                }

                if(!empty($_POST['detail']) == true)
                {
                    echo ". ".$comment;
                }*/

            }
        ?>
    </div>

</body>
</html>