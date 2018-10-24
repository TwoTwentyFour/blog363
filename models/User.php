<?php 

class User
{
    protected $id;
    protected $userType;
    protected $userName;
    protected $email;
    protected $pass;
    protected $dateAdded;

    function getID()
    {
        return $this->id;
    }

    function isAdmin()
    {
        return ($this->userType == 'admin'); 
    }

    function canEditPages(Page $p)
    {
        return ($this->isAdmin() || ($this->id == $page->getCreatorID()));
    }

    function canCreatePages()
    {
        return ($this->isAdmin() || ($this->userType == 'author'));
    }
}

