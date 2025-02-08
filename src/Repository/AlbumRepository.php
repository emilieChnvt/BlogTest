<?php

namespace App\Repository;

use App\Entity\Album;
use Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(entityName: Album::class)]
class AlbumRepository extends Repository
{
    public function edit(Album $album): int
    {
        $query = $this->pdo->prepare("UPDATE album SET title = :title, author = :author WHERE id = :id");
        $query->execute([
            'id' => $album->getId(),
            'title' => $album->getTitle(),
            'author' => $album->getAuthor(),

        ]);

        return $album->getId();
    }
    public function save(Album $album): int
    {
        $query = $this->pdo->prepare("INSERT INTO album (title, author) VALUES (:title, :author)");
        $query->execute([
            'title' => $album->getTitle(),
            'author' => $album->getAuthor(),
        ]);
        $id  = $this->pdo->lastInsertId();
        return $id;
    }

}