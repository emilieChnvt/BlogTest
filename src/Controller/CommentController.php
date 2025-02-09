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

        if(!empty($_POST['content'])&& !empty($_POST['albumId'])){
            $id=$_POST['albumId'];
            $content=$_POST['content'];
        }
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
            $comment->setAlbumId($album->getId());
            $this->getRepository(Comment::class)->save($comment);

        }
        return $this->redirect([
            'id' => $id,
            'type' => "album",
            "action" => "show",
        ]);
    }

    public function update(): Response
    {
        $id = null;
        // Utiliser $_GET pour récupérer l'ID depuis l'URL
        if (!empty($_GET['id']) && ctype_digit($_GET['id'])) {
            $id = $_GET['id'];
        }

        if (!$id) {
            // Si l'ID est manquant ou invalide, redirige
            return $this->redirect();
        }

        $comment = $this->getRepository(Comment::class)->find($id);

        if (!$comment) {
            return $this->redirect();
        }

        $content = null;
        if (!empty($_POST['content'])) {
            $content = $_POST['content'];
            $comment->setComment($content);
            $this->getRepository(Comment::class)->update($comment);

            return $this->redirect([
                'id' => $comment->getAlbumId(),
                'type' => "album",
                "action" => "show",
            ]);
        }

        return $this->render('comment/update', [
            'comment' => $comment,
        ]);
    }

    public function delete():Response
    {
        $id=null;
        if(!empty($_POST['id']) && ctype_digit($_POST['id'])){
            $id=$_POST['id'];

        }

        if(!$id)
        {
            return $this->redirect();
        }

        $comment = $this->getRepository()->find($id);
        if(!$comment)
        {
            return $this->redirect();
        }
        $albumId = $comment->getAlbumId();
        $this->getRepository(Comment::class)->delete($comment);

        return $this->redirect([
            'id' => $albumId,
            'type' => "album",
            "action" => "show",
        ]);
    }
}