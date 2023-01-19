<?php include 'partials/header.php' ?>
<main id="content">
    <h2 id="gallery-header">Galeria Zdjęć</h2>

    <form action="/images/remember" method="POST">
        <a href="/images/add" class="btn-link">Dodaj zdjęcie</a>
        <a href="/images/favourites" class="btn-link" style="margin-left: 10px;">Pokaż wybrane</a>
        <a href="/images/search" class="btn-link" style="margin-left: 10px;">Szukaj zdjęć</a>
        <button type="submit" class="btn-link" style="margin-left: 10px;">Zapamiętaj wybrane</button>

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
                            <input type="checkbox" name="favourites[]" value="<?= $img['_id'] ?>" <?php if (in_array($img['_id'], $data['favourites'])) : ?> checked <?php endif; ?>>
                            <span class="checkmark checkmark-inverted" />
                        </label>
                    </div>
                </div>

            <?php endforeach; ?>
        </div>
    </form>

    <div id="page-arrows">
        <?php if ($data['page'] != 1) : ?>
            <a href="/images/<?= (string)((int)$data['page'] - 1) ?>">&lt;</a>
        <?php endif; ?>
        <p><?= $data['page'] ?></p>
        <?php if ($data['page'] != ($data['count'] % 9 == 0 ? $data['count'] / 9 : (int)($data['count'] / 9) + 1) && $data['count'] != 0) : ?>
            <a href="/images/<?= (string)((int)$data['page'] + 1) ?>">&gt;</a>
        <?php endif; ?>
    </div>

</main>
<?php include 'partials/footer.php' ?>