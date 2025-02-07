<?php foreach ($albums as $album): ?>

    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h3><?= $album->getTitle() ?></h3>
            <h6 class="card-subtitle mb-2 text-body-secondary"><?= $album->getAuthor() ?></h6>
            <a href="?type=album&action=show&id=<?=$album->getId() ?>" class="card-link">See</a>
            <a href="#" class="card-link">Another link</a>
        </div>
    </div>
<?php endforeach;?>
