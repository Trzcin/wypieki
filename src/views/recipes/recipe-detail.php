<?php include APP_ROOT . '/views/partials/header.php' ?>
<link rel="stylesheet" href="/static/css/recipe-detail.css">

<main id="content">
    <img src="/static/assets/recipes/<?php echo $data['thumbnail'] ?>" alt="Maślane Ciastka z Owocami" />
    <div id="main-info">
        <div>
            <h1><?= $data['name'] ?></h1>
            <p><?= $data['description'] ?></p>
        </div>

        <table>
            <tr>
                <td>Czas Przygotowania</td>
                <td><?= $data['prep_time'] ?></td>
            </tr>
            <tr>
                <td>Poziom Trudności</td>
                <td><?= $data['difficulty'] ?></td>
            </tr>
            <tr>
                <td>Rodzaj</td>
                <td><?= $data['type'] ?></td>
            </tr>
            <tr>
                <td>Etykiety</td>
                <td><?= $data['tags'] ?></td>
            </tr>
        </table>
    </div>

    <h2>Składniki</h2>
    <ul>
        <?php foreach ($data['ingredients'] as $ingredient) : ?>
            <li><?= $ingredient ?></li>
        <?php endforeach; ?>
    </ul>

    <h2>Przygotowanie</h2>
    <ol>
        <?php foreach ($data['steps'] as $step) : ?>
            <li><?= $step ?></li>
        <?php endforeach; ?>
    </ol>
</main>
<?php include APP_ROOT . '/views/partials/footer.php' ?>