<?php

namespace App\Entity;

class Album
{
    private $id;
    private $title;
    private $auhtor;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title): void
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getAuhtor()
    {
        return $this->auhtor;
    }

    /**
     * @param mixed $auhtor
     */
    public function setAuhtor($auhtor): void
    {
        $this->auhtor = $auhtor;
    }


}