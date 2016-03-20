<?php
if(isset($_POST['service'])){
    //On r�cup�re l'ID du service
    $service = $_POST['service'];

    /*
     * L� maintenant on peut effectuer une requ�te SQL
     * pour r�cup�rer la liste des agents appartenent au service choisi
     *
     * Je cr�e un tableau pour simuler les r�sultats de recherche par service ID
     * */
    $informatisation = array(
        array('id' => 1, 'name'  => 'Ingrid Marcka NGUEMA EDOU')
    );

    $application = array(
        array(
            'id'    => 1,
            'name'  => 'William Didier MBA NDONG'
        ),
        array(
            'id'    => 2,
            'name'  => 'Freddie LINGOU'
        ),
        array(
            'id'    => 3,
            'name'  => 'Fiacre Pergaud MASSOUSSA'
        ),
        array(
            'id'    => 4,
            'name'  => 'Willy PEBY'
        ),
        array(
            'id' 	=> 5,
            'name'	=> 'Annette AFOBE NGOUA'
        )
    );

    $exploitation = array(
        array(
            'id'    => 1,
            'name'  => 'Ulrich AUBIN-IGOUERHA'
        ),
        array(
            'id'    => 2,
            'name'  => 'Juldas MANIANGA'
        ),
        array(
            'id'    => 3,
            'name'  => 'Damsy Seka MOUSSAVOU'
        ),
        array(
            'id'    => 4,
            'name'  => 'Morgan NDOUNOU'
        ),
        array(
            'id'    => 5,
            'name'  => 'Mireille MARTIN'
        ),
        array(
            'id'    => 6,
            'name'  => 'Mireille NKOGHE'
        )
    );

    //On utilise l'ID du service pour determiner les resultats de reherche
    if($service == "Informatisation"){
        $data = $informatisation;
    }
    elseif($service == "Application Informatique"){
        $data = $application;
    }
    elseif($service == "Exploitation et Maintenance"){
        $data = $exploitation;
    }


    //Ensuite en publie les resultats sous forme d' <option></option>
    foreach($data as $value){
        echo "<option value='".$value['name']."'>".$value['name']."</option>";
    }
}