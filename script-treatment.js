/*
* D'abord on cr�e un objet jQuery a partir de l'ID service et l'ID agent
* */
var service = $('#service'),
    agent   = $('#agent');

/*
* On observe l'�v�nement "change" sur service
* */

service.change(function () {
    //On est dans l'�v�nement change
    //On r�cup�re la valeur du champ et l'envoie en traitement

    $.post('treatment.php',{service: service.val()}, function (options) {
        //Apr�s traitement, le contenu genere par la page de traitement est enregistre dans responseText
        var optionAgentVide = $('<option>Choisir un agent</option>');

        //Tout d'abord on insert l'option vide
        agent.html(optionAgentVide);

        //Ensuite on ajoute les autres otoptions
        agent.append(options);
    })
})