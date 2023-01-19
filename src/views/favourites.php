<?php include 'partials/header.php' ?>
<link rel="stylesheet" href="/static/css/images.css">

<main id="content">
    <h2 id="gallery-header">Wybrane Zdjęcia</h2>

    <form action="/images/forget" method="POST">
        <a href="/images/" class="btn-link">Wszystkie Zdjęcia</a>
        <button type="submit" class="btn-link" style="margin-left: 10px;">Usuń zaznaczone z wybranych</button>

        <div id="photos">
            <?php foreach ($data['images'] as $img) : ?>
                <div class="image">
                    <a href="<?= $img['path'] ?>" target="_blank">
                        <img src="<?= $img['thumbnail'] ?>" alt="<?= $img['title'] ?>" />
                    </a>
                    <div class="info">
                        <div>
                            <p class="title"><?= $img['title'] ?></p>
                            <p class="author"><?= $img['author'] ?></p>
                        </div>

                        <label class="check">
                            <input type="checkbox" name="favourites[]" value="<?= $img['_id'] ?>">
                            <span class="checkmark checkmark-inverted" />
                        </label>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </form>

</main>
<?php include 'partials/footer.php' ?>