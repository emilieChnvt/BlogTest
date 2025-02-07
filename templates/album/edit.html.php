<h3>Modifier le contenu</h3>
<form action="" method="post" class="d-flex flex-column">
    <input name="title" type="text" value="<?= $album->getTitle()?>">
    <textarea name="author" cols="30" rows="10"><?= $album->getAuthor()?></textarea>
    <button class="submit">send</button>
</form>