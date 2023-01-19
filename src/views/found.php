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
        </div>
    </div>
<?php endforeach; ?>