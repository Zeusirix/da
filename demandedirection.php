<?php
//toutes les directions
$sql="SELECT COUNT(*) AS direction FROM demande";
$req=mysqli_query($con,$sql);
$totalD=mysqli_fetch_assoc($req);
//demande traite de toutes les directions satisfait
$sql1="SELECT COUNT(*) AS avis FROM rapportdemande WHERE avis='Satisfait'";
$req1=mysqli_query($con,$sql1);
$totalS=mysqli_fetch_assoc($req1);
//demande traite de toutes les directions non-satisfait
$sql2="SELECT COUNT(*) AS avis FROM rapportdemande WHERE avis='Non-Satisfait'";
$req2=mysqli_query($con, $sql2);
$totalN=mysqli_fetch_assoc($req2);
//demande de la DGI
$sqlDGI="SELECT COUNT(*) AS direction FROM demande WHERE direction='DGI'";
$reqDGI=mysqli_query($con,$sqlDGI);
$totalDGI=mysqli_fetch_assoc($reqDGI);
?>
<table id="stat-table" class="table table-bordered">
    <thead>
        <tr>
            <th>Nombre de Demande Action Recu</th>
            <th>Nombre de Demande Action Traite(Satisfait)</th>
            <th>Nombre de Demande Action Traite(Non-Satisfait)</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td><?php echo $totalD['direction'];?></td>
            <td><?php echo $totalS['avis'];?></td>
            <td><?php echo $totalN['avis'];?></td>
        </tr>
    </tbody>
</table>
<div>
    <table>
        <tr>
            <td>Demande Action recus de toutes les directions:</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?= $totalD['direction'];?></td>
        </tr>
        <tr>
            <td>Demande Action trait&eacute;e de toutes les directions(Satisfait):</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?= $totalS['avis'];?></td>
        </tr>
        <tr>
            <td>Demande Action trait&eacute;e de toutes les directions(Non-Satisfait):</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?= $totalN['avis'];?></td>
        </tr>
        <tr>
            <td>Demande Action recus de la DGI:</td>
            <td>&nbsp;&nbsp;&nbsp;</td>
            <td><?= $totalDGI['direction'];?></td>
        </tr>
    </table>
</div>
