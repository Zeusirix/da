<div id="consultation" class="tab-pane fade">
    <br>
    <table class="table table-bordered">
        <thead class="">
        <tr class="text-uppercase">
            <th class="text-center">ID demande</th>
            <th class="text-center">Objet</th>
            <th class="text-center">Date de Cr&eacute;ation</th>
            <th class="text-center">Evolution de la Demande</th>
            <th class="text-center">Accuse de R&eacute;ception</th>
        </tr>
        </thead>
        <tbody>

        <?php
        //requete pour recuperer l'id
        $s="SELECT * FROM rapport";
        $req=mysqli_query($con,$s);
        $exe=mysqli_fetch_assoc($req);
        $id=(int)$exe['id_rapport'];
        $req=mysqli_query($con,"SELECT evolution,document_retour FROM rapport WHERE id_rapport=$id");
        $rap=mysqli_fetch_assoc($req);
        //afficher table demande
        $result=mysqli_query($con,"SELECT * FROM demande") or die("<strong>Erreur rencontre:</strong> " .mysqli_error($con));
        #if(isset($_SESSION['name']) == $_SESSION['email'])
        while($consult=mysqli_fetch_assoc($result)):
            ?>

            <tr>
                <td><?= $consult['id_demande'];?></td>
                <td><?= $consult['objet'];?></td>
                <td><?= $consult['creation'];?></td>
                <td><?= $rap['evolution'];?></td>
                <td align="center">
                    <a class="btn btn-default btn-xs" href="voir.php?id=<?=$consult['id_demande'];?>">A voir</a>
                </td>
            </tr>

        <?php endwhile;?>

        </tbody>
    </table>
</div><!--./consultation de la demande -->