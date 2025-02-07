<?php

namespace App\Entity;

use App\Repository\AlbumRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'album')]
#[TargetRepository(repoName: AlbumRepository::class )]
class Album
{
    private int $id;
    private string $title;
    private string $author;

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
    public function getAuthor()
    {
        return $this->author;
    }

    /**
     * @param mixed $author
     */
    public function setAuthor($author): void
    {
        $this->author = $author;
    }


}