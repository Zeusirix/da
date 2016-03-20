<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<?php
session_start();
$id=null;
if(isset($_GET['id']))
{
	$id=$_REQUEST['id'];
}
echo $id;
?>
<button type="button" class="btn btn-info btn-md" data-toggle="modal" data-target="#avis">Votre appreciation</button>

<div id="avis" class="modal fade" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<form method="post" action="">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Appr&eacute;ciation</h4>
				</div>

				<div class="modal-body">
					<input type="hidden" name="id_demande">
					<?php
					#$query1=mysqli_query($con,"select id_demande from demande");
					#$req=mysqli_fetch_assoc($query1);
					#$id=(int)$req['id_demande'];
					echo $id;
					?>
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
if(isset($_POST['send']))
{
	$avis=$_POST['avis'];
	$con=mysqli_connect('localhost','root','','gestion');
	$sql="INSERT INTO rapportdemande(avis) VALUES('$avis')";
	$query=mysqli_query($con,$sql);
}
?>