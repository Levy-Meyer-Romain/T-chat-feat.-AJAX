<?php

class MessageManager
{
    protected $PDOConnection;

    public function __construct($messagePDOConnection)
    {
        $this->setConnexionDb($messagePDOConnection);
    }

    /*************************Setter/Getter**************************/
    public function setConnexionDb(PDO $messageConnexionEtablished)
    {
        $this->PDOConnection = $messageConnexionEtablished;
    }

    public function getConnexionDb()
    {
        $this->PDOConnection;
    }
    /******************************************************************/

    public function listAll()
    {
        $query = "SELECT * FROM messages INNER JOIN users ON messages.userId = users.userId ORDER BY messageDate";
        $statement = $this->PDOConnection->prepare($query);
        $statement->execute();

        //Retourne la représentation JSON d'une valeur, il n'y a pas mieux pour le transfert de fichier. Le JSON est claire et leger, voila !
        echo json_encode($statement->fetchAll());
    }

    public function add($values, $userId)
    {
        $query="INSERT INTO messages(messageValue, userId)
				 VALUES(:values,:userId)";

        $boundValues = [
            "values" => $values,
            "userId" => $userId
           ];

        $statement = $this->PDOConnection->prepare($query);
        $statement ->execute($boundValues);

        //retourn l'identifiant du dernier message ajouté
        return $this->PDOConnection->lastInsertId();
    }
}