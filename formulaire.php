<div id="formulaire" class="tab-pane fade in active">
    <div class="container">
        <div class="col-lg-10">
            <h1 class="page-header">Formulaire de la Demande d'Action</h1>
            <?php if(!empty($message)):?><div><p><strong><?php echo $message;?></strong></p></div><?php endif;?>
            <div>
                <button class="btn btn-default" type="submit" name="print" onclick="window.print()"><span class="glyphicon glyphicon-print"></span> Imprimer Formulaire Saisie</button>
            </div>
            <hr>
            <div class="panel-body">
                <form class="form-horizontal" action="#" method="post" enctype="multipart/form-data">
                    <!--MATERIEL-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Mat&eacute;riel:</label>
                        <div class="col-lg-10">
                            <div class="checkbox">
                                <input type="checkbox" name="materiel[]" value="Ecran" <?php if(!empty($tableau_de_routines) && in_array('Ecran', $tableau_de_routines)){echo " checked";}?>>Ecran&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Clavier" <?php if(!empty($tableau_de_routines) && in_array('Clavier', $tableau_de_routines)){echo " checked";}?>>Clavier&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Souris" <?php if(isset($tableau_de_routines) && in_array('Souris', $tableau_de_routines)){echo " checked";}?>>Souris&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="UC" <?php if(isset($tableau_de_routines) && in_array('UC', $tableau_de_routines)){echo " checked";}?>>UC&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Switch" <?php if(isset($tableau_de_routines) && in_array('Switch', $tableau_de_routines)){echo " checked";}?>>Switch&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Prise Reseau" <?php if(isset($tableau_de_routines) && in_array('Prise reseau', $tableau_de_routines)){echo " checked";}?>>Prise Reseau&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Imprimante" <?php if(isset($tableau_de_routines) && in_array('Imprimante', $tableau_de_routines)){echo " checked";}?>>Imprimante&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                <input type="checkbox" name="materiel[]" value="Photocopieuse/Scanner" <?php if(isset($tableau_de_routines) && in_array('Photocopieuse/Scanner', $tableau_de_routines)){echo " checked";}?>>Photocopieuse/Scanner
                            </div>
                        </div>
                    </div>
                    <!--OBJET-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Objet:</label>
                        <div class="col-lg-10">
                            <select class="form-control" name="objet">
                                <option>
                                    <?php if(isset($_POST['objet'])) echo htmlentities(trim($_POST['objet'])); ?>
                                </option>
                                <optgroup label="Service Informatisation">
                                    <option>Analyse du projet</option>
                                    <option>Conception du Projet</option>
                                </optgroup>
                                <optgroup label="Service Application et Informatique">
                                    <option>Demande de Statistique</option>
                                    <option>Demande de Confirmation</option>
                                    <option>Modifier le centre du contribuable</option>
                                    <option>Modifier la configuration des utilisateurs</option>
                                    <option>Demande amelioration de LIIR</option>
                                </optgroup>
                                <optgroup label="Service Exploitation et Maintenance">
                                    <option>Probleme reseau</option>
                                    <option>Probleme d'identification</option>
                                    <option>Probleme materiel</option>
                                    <option>Probleme materiel: ecran</option>
                                    <option>Probleme materiel: imprimerie</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                    <!--DESCRIPTION DEMANDE-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Description de la Demande:</label>
                        <div class="col-lg-10">
                            <textarea class="form-control" cols="50" rows="5" name="description"><?php if (isset($_POST['description'])) echo htmlentities(trim($_POST['description'])); ?></textarea>
                        </div>
                    </div>
                    <!--INFORMATION SUPPLEMENTAIRE-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Information Suppl&eacute;mentaire:</label>
                        <div class="col-lg-10">
                            <input class="form-control" type="text" name="detail" value="<?php if(isset($_POST['detail'])) echo $_POST['detail'];?>">
                        </div>
                    </div>
                    <!--PIECE JOINTE-->
                    <div class="form-group">
                        <label class="col-lg-2 control-label">Pi&egrave;ce-Jointe:</label>
                        <div class="col-lg-10">
                            <input type="file" name="document">
                            <?php if(!empty($msgU)):?><div><p><strong><?php echo $msgU;?></strong></p></div><?php endif;?>
                        </div>
                    </div>
                    <!--ENVOI-->
                    <div class="form-group">
                        <div class="col-lg-5 col-lg-offset-8">
                            <button class="btn btn-default" type="reset" name="reset">Annuler</button>
                            <button class="btn btn-primary" type="submit" name="submit">Envoyer</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div><!--./container-->
</div><!--./saisie de la demande-->