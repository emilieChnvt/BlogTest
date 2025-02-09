<form action="?type=comment&action=update&id=<?= $comment->getId() ?>" method="post">
    <textarea name="content" cols="30" rows="10" class="form form-control"><?= $comment->getComment() ?></textarea>

    <button type="submit" class="btn btn-success">update</button>
</form>