// On définit une variable globale
// permettant de stocker l'identifiant de l'utilisateur
var userId = 0;

/***Affichage liste message & user***/

function usersListRefresh()
{ 
	$.ajax({ url:"http://localhost/tchat/API/index.php?action=listUsers",
			type:"GET"
	 
		}).done(function(response)
	{
		//console.log(response);
        $('#userList ul').empty();
		for (var i = 0; i < response.length; i++) 
		{
			//console.log(i);
			$('#userList ul').append('<li>' + response[i].userNickname + '</li>');
		}	
	});	
}


function messageListRefresh()
{ 
	$.ajax({ url:"http://localhost/tchat/API/index.php?action=listMessages",
			type:"GET"
	 
		}).done(function(response2)
	{
		//console.log(response);
        $('#insideMessageList ul').empty();
		for (var i = 0; i < response2.length; i++) 
		{
			
			//console.log(response2[i].userId);
			$('#insideMessageList ul').append('<li>' + response2[i].userNickname + ' [' + response2[i].messageDate + '] : ' + response2[i].messageValue + '</li>');
		}	
	});	
}

// Fonction de connection au t'chat du nouvel utilisateur
function userConnect()
{
  $.ajax({
    // On définit l'URL appelée
    url: 'http://localhost/tchat/API/index.php',
    // On définit la méthode HTTP
    type: 'GET',
    // On définit les données qui seront envoyées
    data: {
      action: 'userAdd',
      userNickname: $('#userNickname').val()
    },
    // l'équivalent d'un "case" avec les codes de statut HTTP
    statusCode: {
      // Si l'utilisateur est bien créé
      201: function (response) {
          //console.log("Si l'utilisateur est bien créé");
          console.log(response);
        // On stocke l'identifiant récupéré dans la variable globale userId
        window.userId = response;
        // On masque la fenêtre, puis on rafraichit la liste de utilisateurs
        //(a faire...)
         $('#connexion').css("display","none");
          usersListRefresh();
      },
      // Si l'utilisateur existe déjà
      208: function (response) {
          console.log("Si l'utilisateur existe déjà");
        // On fait bouger la fenêtre de gauche à droite
        // et de droite à gauche 3 fois
        // (à faire...)
          $("#login").animate({marginLeft:'1rem'},30)
                         .animate({marginLeft:'-1rem'},30)
                         .animate({marginLeft:'1rem'},30)
                         .animate({marginLeft:'-1rem'},30)
                         .animate({marginLeft:'1rem'},30)
      }
    }
  })
}

function sendAMessage(response)
{
    $.ajax({
        // On définit l'URL appelée
        url: 'http://localhost/tchat/API/index.php',
        // On définit la méthode HTTP
        type: 'GET',
        // On définit les données qui seront envoyées
        data: {
            action: 'addMessage',
            messageValue: $('#writeMessage').val(),
            userId: window.userId
        },
        // l'équivalent d'un "case" avec les codes de statut HTTP
        statusCode: {
            // Si le message a bien été envoyé
            201: function (response) {
                console.log("Si message envoyé");
                // On vide le champ de message
                $('#writeMessage').val(null);

                messageListRefresh();
                console.log("Si fonction messageListRefresh est appelé");

            }

        }
    })
}