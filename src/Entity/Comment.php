<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Attributes\TargetRepository;
use Core\Attributes\Table;

#[Table(name: 'comments')]
#[TargetRepository(repoName: CommentRepository::class)]
class Comment
{
    private int $id;

    private string $comment;

    private string $album_id;

    public function getId(): int
    {
        return $this->id;
    }

    public function getComment(): string
    {
        return $this->comment;
    }

    public function setComment(string $comment): void
    {
        $this->comment = $comment;
    }

    public function getAlbumId(): int
    {
        return $this->album_id;
    }

    public function setAlbumId(string  $album_id): void
    {
        $this->album_id = $album_id;
    }

}