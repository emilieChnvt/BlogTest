
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h3><?= $album->getTitle() ?></h3>
            <h6 class="card-subtitle mb-2 text-body-secondary"><h3><?= $album->getAuthor() ?></h3></h6>
            <a href="?type=album&action=edit&id=<?=$album->getId() ?>" class="card-link">modifier</a>
            <a href="?type=album&action=delete&id=<?=$album->getId() ?>" class="card-link">supprimer</a>
        </div>
    </div>