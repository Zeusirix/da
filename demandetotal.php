<?php
$sql="SELECT COUNT(*) AS id_demande,rapport FROM demande";
$nbr=mysqli_query($con,$sql);
$total=mysqli_fetch_assoc($nbr);

$sql2="SELECT COUNT(*) As avis FROM rapport WHERE avis='Satisfait'";
$nbr2=mysqli_query($con,$sql2);
$total2=mysqli_fetch_assoc($nbr2);

$sql3="SELECT COUNT(*) As avis FROM rapport WHERE avis='Non-Satisfait'";
$nbr3=mysqli_query($con,$sql3);
$total3=mysqli_fetch_assoc($nbr3);

$sql4="SELECT COUNT(*) As creation_affect FROM demande";
$nbr4=mysqli_query($con, $sql4);
$total4=mysqli_fetch_assoc($nbr4);

$sqlI="SELECT COUNT(*) As service_affect FROM demande WHERE  service_affect='Informatisation'";
$nbrI=mysqli_query($con, $sqlI);
$totalI=mysqli_fetch_assoc($nbrI);

$sqlA="SELECT COUNT(*) As service_affect FROM demande WHERE service_affect='Application Informatique'";
$nbrA=mysqli_query($con, $sqlA);
$totalA=mysqli_fetch_assoc($nbrA);

$sqlE="SELECT COUNT(*) As service_affect FROM demande WHERE service_affect='Exploitation et Maintenance'";
$nbrE=mysqli_query($con, $sqlE);
$totalE=mysqli_fetch_assoc($nbrE);
?>

<div>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?= $total['id_demande'];?></span>
            Nombre de Demande Action
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Nombre de Demande Action Trait&eacute;e (Satisfait)
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Nombre de Demande Action Trait&eacute;e (Non-Satisfait)
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total4['creation_affect'];?></span>
            Nombre de Demande d'affect&eacute;e
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $totalI['service_affect'];?></span>
            Nombre de Demande d'affectation service: Informatisation
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $totalA['service_affect'];?></span>
            Nombre de Demande d'affectation service: Application Informatique
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $totalE['service_affect'];?></span>
            Nombre de Demande d'affectation service: Exploitation et Maintenance
        </li>
    </ul>
</div>