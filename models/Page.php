<?php 

class Page
{
    protected $id = null;
    protected $creatorId = null;
    protected $title = null;
    protected $content = null;
    protected $category = null;
    protected $dateAdded = null;
    protected $dateUpdated = null;

    function getID()
    {
        return $this->id;
    }

    function getCreatorID()
    {
        return $this->creatorId;
    }
    
    function getTitle()
    {
        return $this->title;
    }

    function getContent()
    {
        return $this->content;
    }

    function getImage()
    {
        $image;

        switch($this->category)
        {
            case 'linux':
                $image = 'linux';
                break;
            case 'apache':
                $image = 'apache';
                break;
            case 'mysql':
                $image = 'mysql';
                break;
            case 'php':
                $image = 'php';
            default:
                $image = 'dead_ass';
        }
        
        return $image;
    }

    function getCategory()
    {
        return $this->category;
    }

    function getDateAdded()
    {
        return $this->dateAdded;
    }

    function getDateUpdate()
    {
        return $this->dateUpdated; 
    }

    function getIntro($count = 200)
    {
        return substr(strip_tags($this->content), 0, $count) . '...';  
    }
}
