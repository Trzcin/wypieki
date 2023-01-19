<?php include 'partials/header.php' ?>
<link rel="stylesheet" href="/static/css/form.css">

<form action="/images/upload" method="POST" enctype="multipart/form-data">
    <h2>Dodaj zdjęcie</h2>

    <?php if (isset($data['image_error'])) : ?>
        <p class="form-error"><?= $data['image_error'] ?></p>
    <?php endif; ?>

    <label for="image">Plik</label>
    <input type="file" name="image" id="image" accept="image/png, image/jpg, image/jpeg" required>

    <label for="title">Tytuł</label>
    <input type="text" name="title" id="title" required>

    <label for="author">Autor</label>
    <input type="text" name="author" id="author" required value="<?= $data['is_auth'] ? $data['username'] : '' ?>">

    <label for="watermark">Znak wodny</label>
    <input type="text" name="watermark" id="watermark" required>

    <?php if ($data['is_auth']) : ?>
        <p>Widoczność</p>
        <label class="radio" for="public">
            Publiczne
            <input type="radio" name="visibility" id="public" value="public" checked>
            <span class="radiomark" />
        </label>
        <label class="radio" for="private">
            Prywatne
            <input type="radio" name="visibility" id="private" value="private">
            <span class="radiomark" />
        </label>
        <br>
    <?php endif; ?>

    <button type="submit">Wyślij zdjęcie</button>
</form>
<?php include 'partials/footer.php' ?>