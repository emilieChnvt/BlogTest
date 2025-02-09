<?php

namespace App\Controller;

use App\Entity\Album;
use Attributes\DefaultEntity;
use Core\Controller\Controller;
use Core\Response\Response;

#[DefaultEntity(entityName: Album::class)]
class AlbumController extends Controller
{
    public function index(): Response
    {
        $albums=$this->getRepository()->findAll();
        return $this->render('album/index', [
            'albums' => $albums,
        ]);
    }
    public function show(): Response
    {
        $id=null;
        if(!empty($_GET['id'])&&ctype_digit($_GET['id']))
        {
            $id=$_GET['id'];
        }
        if(!$id)
        {
            return $this->redirect();
        }
        $album=$this->getRepository()->find($id);
        if (!$album) {
            return $this->redirect();
        }
        return $this->render('album/show', [
            'album' => $album,
        ]);
    }
    public function edit(): Response
    {
        $id=null;
        if(!empty($_GET['id'])&&ctype_digit($_GET['id']))
        {
            $id=$_GET['id'];
        }
        if(!$id)
        {
            return $this->redirect();
        }

        $album=$this->getRepository()->find($id);
        if (!$album) {
            return $this->redirect();
        }
        $title=null;
        $author=null;
        if(!empty($_POST['title'])&&!empty($_POST['author']))
        {
            $title=$_POST['title'];
            $author=$_POST['author'];
        }
        if ($title && $author)
        {
            $album->setTitle($title);
            $album->setAuthor($author);
            $id = $this->getRepository()->edit($album);


            return $this->redirect([
                "type"=>"album",
                "action"=>"show",
                "id" => $id
            ]);
        }

        return $this->render('album/edit', [
            'album' => $album,
        ]);
    }

    public function delete(): Response
    {
        $id=null;
        if(!empty($_GET['id'])&&ctype_digit($_GET['id']))
        {
            $id=$_GET['id'];
        }
        if(!$id)
        {
            return $this->redirect();
        }
        $album=$this->getRepository()->find($id);

        if (!$album) {
            return $this->redirect();
        }
        $this->getRepository()->delete($album);
        return $this->redirect([
            "type"=>"album",
            "action"=>"index"
        ]);
    }
    public function create(): Response
    {
        $album=new Album();
        $title=null;
        $author=null;
        if(!empty($_POST['title'])&&!empty($_POST['author']))
        {
            $title=$_POST['title'];
            $author=$_POST['author'];
        }
        if ($title && $author)
        {
            $album->setTitle($title);
            $album->setAuthor($author);
            $id = $this->getRepository()->save($album);

            return $this->redirect([
                "type"=>"album",
                "action"=>"index",
            ]);
        }
        return $this->render('album/create', [
            'album' => $album,
        ]);
    }
}