
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h3><?= $album->getTitle() ?></h3>
            <h6 class="card-subtitle mb-2 text-body-secondary"><h3><?= $album->getAuthor() ?></h3></h6>
            <a href="?type=album&action=edit&id=<?=$album->getId() ?>" class="card-link">modifier</a>
            <a href="?type=album&action=delete&id=<?=$album->getId() ?>" class="card-link">supprimer</a>
        </div>


        <div>
            <?php foreach ($album->getComments() as $comment):?>
            <p><?= $comment->getComment()?></p>
            <?php endforeach; ?>
        </div>

        <form action="?type=comment&action=add" method="post">
            <input type="text" name="content">
            <input type="hidden" name="postId" value="<?= $album->getId() ?>">
            <button type="submit">send</button>
        </form>
    </div>