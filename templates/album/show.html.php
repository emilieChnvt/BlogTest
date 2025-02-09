
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h3><?= $album->getTitle() ?></h3>
            <h6 class="card-subtitle mb-2 text-body-secondary"><h3><?= $album->getAuthor() ?></h3></h6>
            <a href="?type=album&action=edit&id=<?=$album->getId() ?>" class="card-link">modifier</a>
            <a href="?type=album&action=delete&id=<?=$album->getId() ?>" class="card-link">supprimer</a>
        </div>


        <div>
            <?php foreach ($album->getComments() as $comment):?>
            <div class="border d-flex">
                <p><?= $comment->getComment()?></p>
                <form action="?type=comment&action=delete" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                    <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                    <button type="submit" class="btn btn-danger"><strong>X</strong></button>
                </form>
                <form action="?type=comment&action=update&id=<?= $comment->getId() ?>" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?');">
                    <input type="hidden" name="id" value="<?= $comment->getId() ?>">
                    <button type="submit" class="btn btn-warning"><strong>edit</strong></button>
                </form>
            </div>

            <?php endforeach; ?>
        </div>

        <form action="?type=comment&action=add" method="post">
            <input type="text" name="content">
            <input type="hidden" name="albumId" value="<?= $album->getId() ?>">
            <button type="submit">send</button>
        </form>
    </div>