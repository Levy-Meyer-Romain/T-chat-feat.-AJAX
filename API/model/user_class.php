<?php

class User
{
    protected $userId;
    protected $userNickname;

    public function __construct($id, $nickname)
    {
        $this->setId($id);
        $this->setNickname($nickname);
    }
    /*************Setter***************/
    public function setId($userIdDefined)
    {
        $this->userId = $userIdDefined;
    }

    public function setUserNickname($userNicknameDefined)
    {
        $this->userNickname = $userNicknameDefined;
    }
    /*************Getter***************/
    public function getId()
    {
        return $this->userId;
    }
}