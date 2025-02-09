<?php

namespace App\Repository;

use App\Entity\Album;
use App\Entity\Comment;
use Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(entityName: Comment::class)]
class CommentRepository extends Repository
{
    public function findAllByAlbum(Album $album): array
    {
        $query = $this->pdo->prepare('SELECT * FROM comments WHERE album_id = :album_id');
        $query->execute(['album_id' => $album->getId()]);
        $comments = $query->fetchAll(\PDO::FETCH_CLASS, $this->targetEntity);
        return $comments;
    }

    public function save(Comment $comment): int
    {
        $query = $this->pdo->prepare('INSERT INTO comments (comment, album_id) VALUES (:comment, :album_id)');
        $query->execute([
            'comment' => $comment->getComment(),
            "album_id"=>$comment->getAlbumId()
        ]);

        return $this->pdo->lastInsertId();
    }

}