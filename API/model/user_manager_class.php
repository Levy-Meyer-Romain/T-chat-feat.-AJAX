<?php

class UserManager
{
    protected $PDOConnection;

    public function __construct($userPDOConnection)
    {
        $this->setConnexionDb($userPDOConnection);
    }

    /*************************Setter/Getter**************************/
    public function setConnexionDb(PDO $userConnexionEtablished)
    {
        $this->PDOConnection = $userConnexionEtablished;
    }

    public function getConnexionDb()
    {
        $this->PDOConnection;
    }
    /******************************************************************/

    public function listAll()
    {
        $query = "SELECT * FROM users ORDER BY userId";
        $statement = $this->PDOConnection->prepare($query);
        $statement->execute();

        //Retourne la représentation JSON d'une valeur, il n'y a pas mieux pour le transfert de fichier. Le JSON est claire et leger, voila !
        echo json_encode($statement->fetchAll());
    }

    public function add($userNickname)
    {
        $query="INSERT INTO users(userNickname)
				 VALUES(:userNickname)";

        $boundValues = [
            "userNickname" => $userNickname
        ];

        $statement = $this->PDOConnection->prepare($query);
        $statement ->execute($boundValues);

        //retourn l'identifiant du dernier nickname ajouté
        return $this->PDOConnection->lastInsertId();
    }

    public function exist($userNickname)
    {
        $query = "SELECT * FROM users WHERE userNickname=:userNickname";

        $boundValues = [
          "userNickname"=>$userNickname
        ];

        $statement = $this->PDOConnection->prepare($query);
        $statement ->execute($boundValues);

        if($statement->rowCount() ===0)
        {
            return false;
        }
        else
        {
            return true;
        }

    }


}
