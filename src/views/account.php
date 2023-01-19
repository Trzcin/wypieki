<?php include 'partials/header.php' ?>
<main>
    <form action="/users/register" method="POST">
        <h2>Załóż Konto</h2>

        <?php if (isset($data['register_error'])) : ?>
            <p class="form-error"><?= $data['register_error'] ?></p>
        <?php endif; ?>

        <label for="email">Adres email</label>
        <input type="email" id="email" name="email" required>
        <label for="name">Nazwa Użytkownika</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Hasło</label>
        <input type="password" id="password" name="password" required>
        <label for="confirm_password">Powtórz Hasło</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Załóz Konto</button>
    </form>

    <form action="/users/login" method="POST">
        <h2>Zaloguj Się</h2>

        <?php if (isset($data['login_error'])) : ?>
            <p class="form-error"><?= $data['login_error'] ?></p>
        <?php endif; ?>

        <label for="name">Nazwa Użytkownika</label>
        <input type="text" id="name" name="name" required>
        <label for="password">Hasło</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Zaloguj Się</button>
    </form>
</main>
<?php include 'partials/footer.php'; ?>