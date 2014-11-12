//ready, le DOM est chargé
/*
$(function () {

	if($('#connexion').keypress(function(e)
	{
		if(e.which ==13)
		{
			$('#connexion').css("display","none")
		}
	}
	))
*/	
/************************AJAX function********************/


/*****User connexion******/




// Une fois que le DOM est bien chargé
$(function () {

  
  // Si l'utilisateur appuie sur une touche
  // dans le champ imput d'id #userNickname
  $('#connexion').keypress(function(eventObject) {
    // Si cette touche est la touche "entrée"
    if (eventObject.which == 13)
    {
      // On appelle la fonction userConnect()
      userConnect();
    }

  });

    usersListRefresh();
    messageListRefresh();


// Si l'utilisateur appuie sur une touche
    // dans le champ imput d'id #writeMessage
    $('#writeMessage').keypress(function(eventObject) {
        // Si cette touche est la touche "entrée"
        if (eventObject.which == 13)
        {
            // On appelle la fonction sendAMessage()
            console.log('bouton entrer fonctionne');
            sendAMessage();
        }

    });

    usersListRefresh();
    messageListRefresh();
/**Fin du ready**/
});







































	//http://9gag.com/gag/a8bAw6Y