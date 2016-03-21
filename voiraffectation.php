<div class="container">

	<div>
	
		<?php
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

$s="SELECT * FROM service";
$req=mysqli_query($con,$s);
$exe=mysqli_fetch_assoc($req);

$a="SELECT * FROM agent";
$req=mysqli_query($con,$a);
$ex=mysqli_fetch_assoc($req);

$aff="SELECT * FROM affectation";
$re=mysqli_query($con,$aff);
$res=mysqli_fetch_assoc($re);
?>
<html>
<head>
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <!-- Load jQuery from Google's CDN -->
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
    <link rel="stylesheet" href="gallery/css/bootstrap.css">
    <link rel="stylesheet" href="gallery/css/jquery-ui.css">
    <link rel="stylesheet" href="gallery/css/bootstrap.min.css">

</head>
<body>
<br><br><br><br>

<div class="container-fluid">
    <br><br>
    <div>
        <button class="btn btn-info btn-xs" onclick="goBack()">Retour</button>
        <script>
            function goBack()
            {
                window.history.back();
            }
        </script>
    </div>

    <form class="form-horizontal" action="" method="post" id="centre">

        <div class="form-group">
            <label class="col-lg-2 control-label">Service:</label>
            <div class="col-lg-3">
                <select class="form-control" id="service" name="service">
                    <option><?= $exe['nom_service'];?></option>
                    <?php foreach($services as $service):?>
                        <option value="<?= $service['name'];?>"><?= $service['name'];?></option>
                    <?php endforeach;?>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Agent:</label>
            <div class="col-lg-3">
                <select class="form-control" id="agent" name="agent">
                    <option><?= $ex['nom_agent'];?></option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Du:</label>
            <div class="col-lg-3">
                <input class="form-control" id="pickup_date" type="text" name="temps1" value="<?= $res['datestart'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Au:</label>
            <div class="col-lg-3">
                <input class="form-control" id="dropoff_date" type="text" name="temps2" value="<?= $res['dateend'];?>">
            </div>
        </div>

        <div class="form-group">
            <label class="col-lg-2 control-label">Commentaire:</label>
            <div class="col-lg-3">
                <input class="form-control" id="detail" type="text" name="detail" value="<?= $res['detail'];?>">
            </div>
        </div>

        <div class="form-group">
            <div class="col-lg-offset-2 col-lg-3">
                <button class="btn btn-success" type="submit" name="submit">Envoyer</button>
                <button class="btn btn-primary" type="reset" name="cancel">Annuler</button>
            </div>
        </div>
    </form>
</div>
<div>
    <?php
        if(isset($_POST['submit']))
        {
            //on récupère la valeur de chaque champ individuellement
            $service=$_POST['service'];
            $agent=$_POST['agent'];
            $comment=$_POST['detail'];
            $dateS=$_POST['temps1'];
            $dateF=$_POST['temps2'];

            //on peut ensuite les enregistrer dans une base de donnees ou les afficher
            $sql="UPDATE affectation SET service=$service,agent=$agent,datestart=$dateS,dateend=$dateF,detail=$comment,temps=NOW()";
            $query=mysqli_query($con,$sql);
            header("Refresh:2;url=profil_directeur.php");

            if(empty($_POST['service']) && empty($_POST['agent']))
            {
                echo "Veuillez selectionnez un service!";
            }
            if(isset($_POST['service']) == true)
            {
                echo "Le service ".$service." traitera la demande d'action";
            }
            else
            {

            }
            if(!empty($_POST['agent']) == true)
            {
                echo " par ".$agent ;
            }
            else
            {

            }

            if(!empty($_POST['temps1']) && !empty($_POST['temps2']))
            {
                echo " " .$dateS." - ".$dateF. " ";
            }
            elseif(!empty($_POST['temps1']) && empty($_POST['temps2']))
            {
                echo " " .$dataS;
            }
            if(!empty($_POST['detail']) == true)
            {
                echo $comment;
            }
            else
            {

            }

        }
    ?>
</div>
<!--script recuperer service et agent-->
<script src="script-treatment.js"></script>
</body>
</html>
	
	</div>

</div>