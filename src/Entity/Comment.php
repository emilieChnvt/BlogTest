<?php

namespace App\Entity;

use Core\Attributes\Table;

#[Table(name: 'comments')]
class Comment
{
    private int $id;

    private string $comment;

    private string $post_id;

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

    public function getPostId(): string
    {
        return $this->post_id;
    }

    public function setPostId(string $post_id): void
    {
        $this->post_id = $post_id;
    }

}