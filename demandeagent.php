<?php
$sql="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Ingrid Marcka NGUEMA EDOU'";
$req=mysqli_query($con,$sql) or die("Probleme rencontre: ".mysqli_error($con));
$exe=mysqli_fetch_assoc($req);

$sql1="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='William Didier MBA NDONG'";
$req1=mysqli_query($con,$sql1) or die("Probleme rencontre: ".mysqli_error($con));
$exe1=mysqli_fetch_assoc($req1);

$sql2="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Freddie LINGOU'";
$req2=mysqli_query($con,$sql2) or die("Probleme rencontre: ".mysqli_error($con));
$exe2=mysqli_fetch_assoc($req2);

$sql3="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Fiacre Pergaud MASSOUSSA'";
$req3=mysqli_query($con,$sql3) or die("Probleme rencontre: ".mysqli_error($con));
$exe3=mysqli_fetch_assoc($req3);

$sql4="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Willy PEBY'";
$req4=mysqli_query($con,$sql4) or die("Probleme rencontre: ".mysqli_error($con));
$exe4=mysqli_fetch_assoc($req4);

$sql5="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Annette AFOBE NGOUA'";
$req5=mysqli_query($con,$sql5) or die("Probleme rencontre: ".mysqli_error($con));
$exe5=mysqli_fetch_assoc($req5);

$sql6="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Ulrich AUBIN-IGOUERHA'";
$req6=mysqli_query($con,$sql6) or die("Probleme rencontre: ".mysqli_error($con));
$exe6=mysqli_fetch_assoc($req6);

$sql7="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Juldas MANIANGA'";
$req7=mysqli_query($con,$sql7) or die("Probleme rencontre: ".mysqli_error($con));
$exe7=mysqli_fetch_assoc($req7);

$sql8="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Damsy Seka MOUSSAVOU'";
$req8=mysqli_query($con,$sql8) or die("Probleme rencontre: ".mysqli_error($con));
$exe8=mysqli_fetch_assoc($req8);

$sql9="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Morgan NDOUNDOU'";
$req9=mysqli_query($con,$sql9) or die("Probleme rencontre: ".mysqli_error($con));
$exe9=mysqli_fetch_assoc($req9);

$sql10="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Mireille MARTIN'";
$req10=mysqli_query($con,$sql10) or die("Probleme rencontre: ".mysqli_error($con));
$exe10=mysqli_fetch_assoc($req10);

$sql11="SELECT COUNT(*) AS agent_affect FROM demande WHERE agent_affect='Mireille NKOGHE'";
$req11=mysqli_query($con,$sql11) or die("Probleme rencontre: ".mysqli_error($con));
$exe11=mysqli_fetch_assoc($req11);
?>
<div>
    <h4>Demande Action</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?= $exe['agent_affect'];?></span>
            Ingrid Marcka NGUEMA EDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe1['agent_affect'];?></span>
            William Didier MBA NDONG
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe2['agent_affect'];?></span>
            Freddie LINGOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe3['agent_affect'];?></span>
            Fiacre Pergaud MASSOUSSA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe4['agent_affect'];?></span>
            Willy PEBY
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe5['agent_affect'];?></span>
            Annette AFOBE NGOUA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe6['agent_affect'];?></span>
            Ulrich AUBIN-IGOUERHA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe7['agent_affect'];?></span>
            Juldas MANIANGA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe8['agent_affect'];?></span>
            Damsy Seka MOUSSAVOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe9['agent_affect'];?></span>
            Morgan NDOUNDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe10['agent_affect'];?></span>
            Mireille MARTIN
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $exe11['agent_affect'];?></span>
            Mireille NKOGHE
        </li>
    </ul>

    <?php
    //afficher total de demande traite avec succes
    $sql2="SELECT COUNT(*) As avis FROM rapport WHERE avis='Satisfait'";
    $nbr2=mysqli_query($con,$sql2);
    $total2=mysqli_fetch_assoc($nbr2);
    ?>

    <h4>Demande Action Trait&eacute;e Satisfait</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Ingrid Marcka NGUEMA EDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            William Didier MBA NDONG
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Freddie LINGOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Fiacre Pergaud MASSOUSSA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Willy PEBY
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Annette AFOBE NGOUA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Ulrich AUBIN-IGOUERHA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Juldas MANIANGA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Damsy Seka MOUSSAVOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Morgan NDOUNDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Mireille MARTIN
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total2['avis'];?></span>
            Mireille NKOGHE
        </li>
    </ul>

    <?php
    //afficher total de demande traite avec echec
    $sql3="SELECT COUNT(*) As avis FROM rapport WHERE avis='Non-Satisfait'";
    $nbr3=mysqli_query($con,$sql3);
    $total3=mysqli_fetch_assoc($nbr3);
    ?>
    <h4>Demande Action Non-Trait&eacute;e</h4>
    <ul class="list-group">
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Ingrid Marcka NGUEMA EDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            William Didier MBA NDONG
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Freddie LINGOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Fiacre Pergaud MASSOUSSA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Willy PEBY
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Annette AFOBE NGOUA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Ulrich AUBIN-IGOUERHA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Juldas MANIANGA
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Damsy Seka MOUSSAVOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Morgan NDOUNDOU
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Mireille MARTIN
        </li>
        <li class="list-group-item">
            <span class="badge"><?= $total3['avis'];?></span>
            Mireille NKOGHE
        </li>
    </ul>
</div>