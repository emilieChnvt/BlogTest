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
}