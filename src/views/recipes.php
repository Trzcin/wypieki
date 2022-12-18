<?php include 'partials/header.php' ?>
<main id="content">
    <h2>Wzystkie Przepisy</h2>
    <div id="photos">
        <div class="recipe">
            <a href="/recipe/ciastka-z-czekoladą">
                <img src="/static/assets/recipes/choco-chip-recipe.jpg" alt="Ciastka z czekoladą" />
                <div class="recipe-info">
                    <div class="main-info">
                        <div>
                            <h3>Ciastka z czekoladą</h3>
                            <p>Kruche ciastka z kawałkami czekolady.</p>
                        </div>

                        <span class="rating">
                            <img src="/static/assets/icons/star.svg" alt="rating" />
                            <span>4.7</span>
                        </span>
                    </div>

                    <div class="tags">
                        <span>Maślane</span>
                        <span style="background: #64412f">Czekoladowe</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="recipe">
            <a href="/recipe/kremówka">
                <img src="/static/assets/recipes/kremowka-recipe.jpg" alt="Kremówka z budyniem" />
                <div class="recipe-info">
                    <div class="main-info">
                        <div>
                            <h3>Kremówka</h3>
                            <p>Kremówka z budyniem.</p>
                        </div>

                        <span class="rating">
                            <img src="/static/assets/icons/star.svg" alt="rating" />
                            <span>3.9</span>
                        </span>
                    </div>

                    <div class="tags">
                        <span>Maślane</span>
                    </div>
                </div>
            </a>
        </div>

        <div class="recipe">
            <a href="/recipe/drożdżówka">
                <img src="/static/assets/recipes/drozdzowka-recipe.jpeg" alt="Drożdżówka" />
                <div class="recipe-info">
                    <div class="main-info">
                        <div>
                            <h3>Drożdżówka</h3>
                            <p>
                                Puszysta drożdżówka z rodzinnego
                                przepisu
                            </p>
                        </div>

                        <span class="rating">
                            <img src="/static/assets/icons/star.svg" alt="rating" />
                            <span>4.8</span>
                        </span>
                    </div>

                    <div class="tags">
                        <span>Maślane</span>
                        <span style="background: #ad6526">Drożdżowe</span>
                    </div>
                </div>
            </a>
        </div>
    </div>
</main>
<?php
$footer_class = 'footer-b';
include 'partials/footer.php';
?>