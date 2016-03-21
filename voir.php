<?php
session_start();
require 'database.php';
$id=null;
if(isset($_GET['id']))
{
	$id=$_REQUEST['id'];
}
$sql="select * from demande where id_demande=$id";
$query=mysqli_query($con,$sql) or die("erreur pour l'affichage:".mysqli_error($con));
$demande=mysqli_fetch_assoc($query);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
	<!-- script pour afficher la date et temps -->
	<script type="text/javascript" src="gallery/js/showtime.js"></script>

	<!-- offline -->
	<link rel="stylesheet" href="gallery/css/cerulean.css">
	<script type="text/javascript" src="gallery/js/jquery.min.js"></script>
	<script type="text/javascript" src="gallery/js/bootstrap.min.js"></script>

	<!--en ligne
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->

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
	<label>Num&eacute;ro de R&eacute;f&eacute;rence de la Demande d'Action: &nbsp;&nbsp;&nbsp;</label><strong><?php echo $demande['id_demande'];?></strong>
	<div>
		<button class="btn btn-info btn-xs" onclick="goBack()">Retour</button>
		<script>function goBack(){window.history.back();}</script>
	</div>
</div>
<hr>
<div class="container">

	<p class="text-center">
		Bonjour <?php echo $_SESSION['name'];?>,<br>
		Votre demande a &eacute;t&eacute; cr&eacute;&eacute; <?php echo $demande['creation'];?>.<br>
		L'objet de votre demande est : <?php echo $demande['objet'];?>.<br>
		Le description de votre objet est : <?php echo $demande['description'];?>.<br>
		<?php if($demande['document']==true):?>
			<a class="btn btn" href="rapport_demande/<?php echo $demande['document'];?>">T&eacute;lecharger le document</a>
		<?php endif;?>
	</p>

	<p class="text-center">
		<span style="color: red;">Veuillez valider la r&eacute;ception de la demande d'action en nous retournant votre apr&eacute;ciation:</span>
		<a  class="btn btn" data-toggle="modal" data-target="#avis">Votre appr&eacute;ciation</a>

		<div id="avis" class="modal fade" role="dialog">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<form method="post" action="">

						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal">&times;</button>
							<h4 class="modal-title">Appr&eacute;ciation</h4>
						</div>

						<div class="modal-body">
							<input class="radio-inline" type="radio" name="avis" value="Satisfait">Satisfait
							<input class="radio-inline" type="radio" name="avis" value="Non-Satisfait">Non-Satisfait
						</div>

						<div class="modal-footer">
							<button class="btn btn-success" type="submit" name="send">Envoyer</button>
							<button class="btn btn-default" type="button" data-dismiss="modal">Fermer</button>
						</div>

					</form>
				</div>
			</div>
		</div>

		<?php

		if(isset($_POST['send'])):
			$avis=$_POST['avis'];
			$sql1="INSERT INTO rapport(avis) VALUES('$avis')";
			$query1=mysqli_query($con,$sql1) or die("Erreur rencontr&eacute; pendant l'&eacute;x&eacute;cution de la requete: " .mysqli_error($con));

			if(isset($query1)):
				echo '<script>alert("Merci pour votre collaboration.")</script>';
				#header('Refresh:2; url=profil_utilisateur.php');
			endif;
		endif;

		$aff="SELECT avis FROM rapport WHERE id_demande=$id";var_dump($aff);
		$req=mysqli_query($con,$aff);var_dump($req);
		while($exe=mysqli_fetch_assoc($req)):

		if(isset($_POST['send'])):?>
			<div align="center">Vous etes <?= $exe['avis'];?> du traitement de votre demande.</div>
		<?php
		endif;
		endwhile;
		?>
	</p>

</div>
</body>
</html>