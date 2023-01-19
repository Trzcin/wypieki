<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Domowe Wypieki</title>
    <link rel="shortcut icon" href="/static/assets/icons/bread.svg" type="image/x-icon" />
    <link rel="stylesheet" href="/static/css/global.css" />
    <?php if (file_exists(APP_ROOT . '/web/static/css/' . $data['view'] . '.css')) : ?>
        <link rel="stylesheet" href="/static/css/<?php echo $data['view'] ?>.css" />
    <?php endif; ?>
    <script src="/static/js/global.js" defer></script>
</head>

<body>
    <nav id="nav">
        <div id="nav-logo">
            <a href="<?php echo ($data['view'] == 'index' ? '#' : '/') ?>">
                <img src="/static/assets/icons/bread.svg" alt="Wypieki" />
                <p>Domowe Wypieki</p>
            </a>
        </div>

        <div id="nav-links">
            <div id="theme-toggle-container">
                <img src="/static/assets/icons/sun.svg" alt="light theme" id="img-sun" />

                <label class="switch">
                    <input type="checkbox" id="theme-toggle" />
                    <span class="slider"></span>
                </label>

                <img src="/static/assets/icons/moon.svg" alt="dark theme" id="img-moon" />
            </div>

            <div id="desktop-nav">
                <a <?php if ($data['view'] == 'index') : ?> href="#" class="active" <?php else : ?> href="/" <?php endif; ?>>Strona Główna</a>
                <a <?php if ($data['view'] == 'images') : ?> href="#" class="active" <?php else : ?> href="/images/" <?php endif; ?>>Zdjęcia</a>
                <div class="dropdown-wrapper">
                    <a <?php if ($data['view'] == 'recipes') : ?> href="#" class="active" <?php else : ?> href="/recipes" <?php endif; ?>>Przepisy</a>

                    <div class="dropdown">
                        <a <?php if ($data['view'] == 'recipes/ciastka-z-czekoladą') : ?> href="#" class="active" <?php else : ?> href="/recipe/ciastka-z-czekoladą" <?php endif; ?>>Ciastka z czekoladą</a>
                        <a <?php if ($data['view'] == 'recipes/drożdżówka') : ?> href="#" class="active" <?php else : ?> href="/recipe/drożdżówka" <?php endif; ?>>Drożdżówka</a>
                        <a <?php if ($data['view'] == 'recipes/kremówka') : ?> href="#" class="active" <?php else : ?> href="/recipe/kremówka" <?php endif; ?>>Kremówka</a>
                    </div>
                </div>
                <a <?php if ($data['view'] == 'form') : ?> href="#" class="active" <?php else : ?> href="/form" <?php endif; ?>>Podziel się Przepisem</a>
                <?php if (!$data['is_auth']) : ?>
                    <a <?php if ($data['view'] == 'account') : ?> href="#" <?php else : ?> href="/users/account" <?php endif; ?> class="btn-link">
                        <img src="/static/assets/icons/User.svg" alt="użytkownik">
                        <p>Konto</p>
                    </a>
                <?php else : ?>
                    <a href="/users/logout" class="btn-link">
                        <img src="/static/assets/icons/User.svg" alt="użytkownik">
                        <p>Wyloguj</p>
                    </a>
                <?php endif; ?>
            </div>

            <div id="mobile-nav">
                <input type="checkbox" name="mobile-nav-toggle" id="mobile-nav-toggle" />
                <label for="mobile-nav-toggle" id="mobile-toggle-label">
                    <img id="mobile-icon-open" src="/static/assets/icons/HamburgerMenu.svg" alt="mobile menu icon" />
                    <img id="mobile-icon-close" src="/static/assets/icons/CloseMenu.svg" alt="mobile menu icon" />
                </label>

                <div id="mobile-nav-container">
                    <a <?php if ($data['view'] == 'index') : ?> href="#" class="active" <?php else : ?> href="/" <?php endif; ?>>Strona Główna</a>
                    <a <?php if ($data['view'] == 'images') : ?> href="#" class="active" <?php else : ?> href="/images/" <?php endif; ?>>Zdjęcia</a>
                    <div class="dropdown-mobile-wrapper">
                        <input type="checkbox" id="mobile-drop-toggle" />
                        <label for="mobile-drop-toggle">Przepisy</label>

                        <div class="mobile-dropdown">
                            <a <?php if ($data['view'] == 'recipes') : ?> href="#" class="active" <?php else : ?> href="/recipes" <?php endif; ?>>Wszystkie Przepisy</a>
                            <a h<?php if ($data['view'] == 'recipes/ciastka-z-czekoladą') : ?> href="#" class="active" <?php else : ?> href="/recipe/ciastka-z-czekoladą" <?php endif; ?>>Ciastka z czekoladą</a>
                            <a <?php if ($data['view'] == 'recipes/drożdżówka') : ?> href="#" class="active" <?php else : ?> href="/recipe/drożdżówka" <?php endif; ?>>Drożdżówka</a>
                            <a <?php if ($data['view'] == 'recipes/kremówka') : ?> href="#" class="active" <?php else : ?> href="/recipe/kremówka" <?php endif; ?>>Kremówka</a>
                        </div>
                    </div>
                    <a <?php if ($data['view'] == 'form') : ?> href="#" class="active" <?php else : ?> href="/form" <?php endif; ?>>Podziel się Przepisem</a>
                </div>
            </div>
        </div>
    </nav>