<div class="container">

    <!--navigation tab-->
    <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#totaldemande">Demande Action Total</a></li>
        <li><a data-toggle="tab" href="#servicesdemande">Demande Action par Service</a></li>
        <li><a data-toggle="tab" href="#agentdemande">Demande Action par Agent</a></li>
        <!--<li><a data-toggle="tab" href="#directiondemande">Demande Action par Direction</a></li>
        <li><a data-toggle="tab" href="#servicedemande">Demande Action par Service</a></li>-->
    </ul><!--./navigation-tab-->
    <br><br><br>
    <!-- contenu tab-->
    <div class="tab-content">
        <div id="totaldemande" class="tab-pane fade in active">
            <?php include 'demandetotal.php';?>
        </div>
        <div id="servicesdemande" class="tab-pane fade">
            <?php include 'demandeservices.php';?>
        </div>
        <div id="agentdemande" class="tab-pane fade">
            <?php include 'demandeagent.php';?>
        </div>
        <!--<div id="directiondemande" class="tab-pane fade">
            <?php #include 'demandedirection.php';?>
        </div>-->
        <!--<div id="servicedemande" class="tab-pane fade">
            <?php #include 'demandeservice.php';?>
        </div>-->
    </div><!--./contenu-tab-->

</div>