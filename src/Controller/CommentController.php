<?php

namespace App\Controller;

use App\Entity\Album;
use App\Entity\Comment;
use Attributes\DefaultEntity;
use Core\Controller\Controller;
use Core\Response\Response;

#[DefaultEntity(entityName: Comment::class)]
class CommentController extends Controller
{
    public function add():Response
    {
        $content = null;
        $id=null;

        if(!empty($_POST['content'])&&!empty($_POST['postId'])){
            $id=$_POST['postId'];
            $content=$_POST['content'];
        }
        var_dump($content);
        if(!$id)
        {
            return $this->redirect();
        }

        $album = $this->getRepository(Album::class)->find($id);

        if(!$album)
        {
            return $this->redirect();
        }

        if($album && $content)
        {
            $comment = new Comment();
            $comment->setComment($content);
            $comment->setPostId($album->getId());
            $this->getRepository(Comment::class)->save($comment);
        }
        return $this->redirect([
            'id' => $id,
            'type' => "album",
            "action" => "show",
        ]);
    }
}