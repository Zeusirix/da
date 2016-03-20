<div class="container">
    <h3>Rapport traitement</h3>
    <div class="table-responsive">
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
                <th class="text-center">Date de R&eacute;ception</th>
                <th class="text-center">Evolution du taitement</th>
                <th class="text-center">Probleme rencontr&eacute;</th>
                <th class="text-center">Date retour</th>
                <th class="text-center">Avis du Demandeur</th>
            </tr>
            </thead>
            <tbody>
            <?php
            //requete pour un rapport agent et service
            $s=mysqli_query($con,"SELECT service_affect,agent_affect FROM demande") or die("".mysqli_error($con));
            $srv=mysqli_fetch_assoc($s);

            //requete pour agent
            $a=mysqli_query($con,"SELECT nom_agent FROM agent") or die("".mysqli_error($con));
            $agt=mysqli_fetch_assoc($a);

            //requete pour demande
            $r=mysqli_query($con,"SELECT rapport FROM demande") or die("".mysqli_error($con));
            $rd=mysqli_fetch_assoc($r);

            //requete pour afficher specifiquement tout le contenu de la table rapportdemande
            $e=mysqli_query($con,"SELECT * FROM rapport WHERE id_rapport=$id") or die("".mysqli_error($con));
            $eu=mysqli_fetch_assoc($e);
            $id=(int)$eu['id_rapport'];
            $req=mysqli_query($con,"SELECT * FROM rapport WHERE id_rapport=$id") or die("".mysqli_error($con));
            $cons=mysqli_fetch_assoc($req);

            //requete pour demande
            $result2=mysqli_query($con,"SELECT id_demande,objet,rapport,creation FROM demande") or die("".mysqli_error($con));
            while($work=mysqli_fetch_assoc($result2)):
                ?>
                <tr>
                    <td><?= $work['id_demande'];?></td>
                    <td><?= $work['reference'];?></td>
                    <td><?= $work['direction'];?></td>
                    <td><?= $work['fonction'];?></td>
                    <td><?= $work['nom'];?></td>
                    <td><?= $work['objet'];?></td>
                    <td><?= $srv['service_affect']."<br>".$srv['agent_affect'];?></td>
                    <td><?= $work['creation_affect'];?></td>
                    <td><?= $cons['evolution'];?></td>
                    <td><?= $rd['rapport'];?></td>
                    <td></td>
                    <td>
                        <?php echo $cons['avis'];?>
                    </td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
</div>
