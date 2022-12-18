<?php include 'partials/header.php' ?>
<script src="/static/js/form.js" defer></script>

<form action="zasób.php" method="post" id="recipe-form" enctype="multipart/form-data">
    <h2>Podziel się swoim przepisem</h2>

    <label for="name">Nazwa Przepisu</label>
    <input type="text" id="name" name="name" required />

    <label for="thumbnail">Zdjęcie</label>
    <div>
        <input type="file" name="thumbnail" id="thumbnail" accept="image/*" />

        <div id="thumbnail-preview"></div>
    </div>

    <p>Rodzaj Przepisu</p>

    <label for="sweet" class="radio">
        Na Słodko
        <input type="radio" name="type" id="sweet" value="sweet" required />
        <span class="radiomark"></span>
    </label>
    <label for="salty" class="radio">
        Na Słono
        <input type="radio" name="type" id="salty" value="salty" required />
        <span class="radiomark"></span>
    </label>

    <p>Etykiety</p>
    <label for="yeast" class="check">
        Drożdżowe
        <input type="checkbox" name="tag" id="yeast" value="yeast" />
        <span class="checkmark"></span>
    </label>
    <label for="fruit" class="check">
        Owocowe
        <input type="checkbox" name="tag" id="fruit" value="fruit" />
        <span class="checkmark"></span>
    </label>
    <label for="choco" class="check">
        Czekoladowe
        <input type="checkbox" name="tag" id="choco" value="choco" />
        <span class="checkmark"></span>
    </label>
    <label for="butter" class="check">
        Maślane
        <input type="checkbox" name="tag" id="butter" value="butter" />
        <span class="checkmark"></span>
    </label>

    <label for="difficulty" class="extra-spacing">Poziom Skomplikowania</label>
    <select name="difficulty" id="difficulty">
        <option value="0">Dla Początkujących</option>
        <option value="1">Łatwe</option>
        <option value="2">Średnie</option>
        <option value="3">Dla Doświadczonych</option>
    </select>

    <label for="description">Opis</label>
    <textarea name="description" id="description" cols="30" rows="10" required></textarea>

    <label for="ingredients">Składniki</label>
    <textarea name="ingredients" id="ingredients" cols="30" rows="10" title="Wypisz wszystkie składniki w osobnych linijkach, po myślnikach." required></textarea>

    <label for="instructions">Przygotowanie w Krokach</label>
    <textarea name="instructions" id="instructions" cols="30" rows="10" title="Wypisz wszystkie kroki w osobnych linijkach." required></textarea>

    <button type="submit">Wyślij</button>
    <button type="reset">Wyczyść</button>
</form>

<div id="extra-imgs">
    <img src="/static/assets/recipes/butter-cokkies-berries.jpg" alt="fruity cookies" />
    <img src="/static/assets/recipes/choco-chip-cookies.jpg" alt="choco cookies" style="margin-left: 50%; margin-top: -20px" />
    <img src="/static/assets/recipes/red-beary-pie.jpg" alt="berry pie" style="margin-left: 100%; margin-top: -40px" />
</div>
<?php include 'partials/footer.php' ?>