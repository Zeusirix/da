 <!-- tab content-->
    <div class="container">
        <h3>Reception Demande Action</h3>
        <table class="table table-bordered table-hover">
            <thead>
            <tr>
                <th class="text-center">ID Demande Action</th>
                <th class="text-center">Direction</th>
                <th class="text-center">Objet</th>
                <th class="text-center">Date de Reception</th>
                <th class="text-center">Action</th>
                <th class="text-center">Affectation</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $result=mysqli_query($con," SELECT utilisateur.direction, demande.id_demande,demande.objet, demande.creation FROM utilisateur,demande ORDER BY id_demande ASC ") or die("<strong>Erreur rencontr&eacute;:</strong>" .mysqli_error($con));
            while($reception=mysqli_fetch_assoc($result)):
                extract($reception);
                ?>
                <tr>
                    <td><?= $id_demande;?></td>
                    <td><?= $direction;?></td>
                    <td><?= $objet;?></td>
                    <td><?= $creation;?></td>
                    <td><a class="btn btn-primary btn-xs" href="affectation.php?id=<?= $id_demande;?>">affectation</a></td>
                    <td>
                        <p>
                            <?php
                            //recuperation de id de la table affectation
                            /*$sql="SELECT id_affectation FROM affectation";
                            $query=mysqli_query($con,$sql) or die("Erreur de la requete: ".mysqli_error($con));
                            $res=mysqli_fetch_assoc($query);
                            $id=(int)$res['id_affectation'];*/

                            //afficher les infos a partir de l'id de table_affectation
                            $sql1="SELECT service_affect,agent_affect,date_debut_affect,date_fin_affect,detail_affect FROM demande";
                            $query=mysqli_query($con,$sql1) or die("Erreur de la selection affectation: ".mysqli_error($con));
                            while($res=mysqli_fetch_assoc($query))
                            {
                                echo "<p>".$res['service_affect']. " - " .$res['agent_affect']."<br>";
                                echo " <br>".$res['date_debut_affect']." - ".$res['date_fin_affect']."<br>".$res['detail_affect']."</p>";
                            }""
                            ?>
                        </p>
                    </td>
                </tr>
            <?php endwhile;?>
            </tbody>
        </table>
    </div>
    <!-- ./tab-content-->
