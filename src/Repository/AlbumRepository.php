<?php

namespace App\Repository;

use App\Entity\Album;
use Attributes\TargetEntity;
use Core\Repository\Repository;

#[TargetEntity(entityName: Album::class)]
class AlbumRepository extends Repository
{

}