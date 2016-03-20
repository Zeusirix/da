<?php
//afficher total de demande action recu
$sql="SELECT COUNT(*) AS creation_affect FROM demande";
$req=mysqli_query($con,$sql);
$total=mysqli_fetch_assoc($req);

//afficher total de demande traite avec succes
$sql2="SELECT COUNT(*) As avis FROM rapport WHERE avis='Satisfait'";
$nbr2=mysqli_query($con,$sql2);
$total2=mysqli_fetch_assoc($nbr2);

//afficher total de demande traite avec echec
$sql3="SELECT COUNT(*) As avis FROM rapport WHERE avis='Non-Satisfait'";
$nbr3=mysqli_query($con,$sql3);
$total3=mysqli_fetch_assoc($nbr3);

/*
 * INFORMATISATION
 */
//afficher total de demande traite par l'informatisation
$sqlinf="SELECT COUNT(*) AS service_affect FROM demande WHERE service_affect='Informatisation'";
$reqinf=mysqli_query($con,$sqlinf);
$totalinf=mysqli_fetch_assoc($reqinf);
//afficher total de demande traite avec succes
$sqlinf2="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Satisfait'";
$reqinf2=mysqli_query($con,$sqlinf2);
$totalinf2=mysqli_fetch_assoc($reqinf2);
//afficher total de demande traite avec echec
$sqlinf3="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Non-Satisfait'";
$reqinf3=mysqli_query($con,$sqlinf3);
$totalinf3=mysqli_fetch_assoc($reqinf3);

/*
 * APPLICATION INFORMATIQUE
 */

//afficher total de demande traite par l'application informatique
$sqlapp="SELECT COUNT(*) AS service_affect FROM demande WHERE service_affect='Application Informatique'";
$reqapp=mysqli_query($con,$sqlapp);
$totalapp=mysqli_fetch_assoc($reqapp);
//afficher total de demande traite avec succes
$sqlapp2="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Satsifait'";
$reqapp2=mysqli_query($con,$sqlapp2);
$totalapp2=mysqli_fetch_assoc($reqapp2);
//afficher total de demande traite avec echec
$sqlapp3="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Non-Satisfait'";
$reqapp3=mysqli_query($con,$sqlapp3);
$totalapp3=mysqli_fetch_assoc($reqapp3);

/*
 * EXPLOITATION ET MAINTENANCE
 */

//afficher total de demande traite par l'exploitation et maintenance
$sqlexp="SELECT COUNT(*) AS service_affect FROM demande WHERE service_affect='Exploitation et Maintenance'";
$reqexp=mysqli_query($con,$sqlexp);
$totalexp=mysqli_fetch_assoc($reqexp);
//afficher total de demande traite avec succes
$sqlexp2="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Satisfait'";
$reqexp2=mysqli_query($con,$sqlexp2);
$totalexp2=mysqli_fetch_assoc($reqexp2);
//afficher total de demande traite avec echec
$sqlexp3="SELECT COUNT(*) AS avis FROM rapport WHERE avis='Non-Satisfait'";
$reqexp3=mysqli_query($con,$sqlexp3);
$totalexp3=mysqli_fetch_assoc($reqexp3);
?>
<div>
    <li class="list-group-item">
        <span class="badge"><?= $total['creation_affect'];?></span>
        Nombre de Demande affect&eacute;e
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalI['service_affect'];?></span>
        Nombre de Demande d'affectation service: Informatisation
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalI['service_affect'];?></span>
        Nombre de Demande d'affectation service: Informatisation Trait&eacute;e(Satisfait)
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalI['service_affect'];?></span>
        Nombre de Demande d'affectation service: Informatisation Trait&eacute;e (Non-Satisfait)
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalA['service_affect'];?></span>
        Nombre de Demande d'affectation service: Application Informatique
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalA['service_affect'];?></span>
        Nombre de Demande d'affectation service: Application Informatique Trait&eacute;e (Satisfait)
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalA['service_affect'];?></span>
        Nombre de Demande d'affectation service: Application Informatique Trait&eacute;e (Non-Satisfait)
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $totalE['service_affect'];?></span>
        Nombre de Demande d'affectation service: Exploitation et Maintenance
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $total3['avis'];?></span>
        Nombre de Demande d'affectation service: Exploitation et Maintenance Trait&eacute;e (Satisfait)
    </li>
    <li class="list-group-item">
        <span class="badge"><?= $total3['avis'];?></span>
        Nombre de Demande d'affectation service: Exploitation et Maintenance Trait&eacute;e (Non-Satisfait)
    </li>
</div>