<?php include 'partials/header.php' ?>
<div id="hero">
    <div id="hero-background"></div>

    <header>
        <h1>Domowe Wypieki <?= $data['auth'] ?></h1>
        <p>Najlepsze przepisy na Twoim localhostcie.</p>
    </header>

    <div id="cards">
        <div class="card hero-card">
            <a href="/recipes">
                <h2>Przepisy</h2>
                <p>Znajdź inspiracje do swoich wypieków.</p>
                <img src="/static/assets/icons/right.svg" alt="przejdź do linku" />
            </a>
        </div>
        <div class="card hero-card">
            <a href="/gallery">
                <h2>Galeria</h2>
                <p>Przejrzyj galerię rozmaitych smakołyków.</p>
                <img src="/static/assets/icons/right.svg" alt="przejdź do linku" />
            </a>
        </div>
        <div class="card hero-card">
            <a href="/form">
                <h2>Podziel się Przepisem</h2>
                <p>
                    Podziel się z innymi własnym pomysłem na domowy
                    wypiek.
                </p>
                <img src="/static/assets/icons/right.svg" alt="przejdź do linku" />
            </a>
        </div>
        <div class="card hero-card">
            <a href="#article">
                <h2>Przejrzyj tekst</h2>
                <p>Przejdź do tekstu w dalszej części strony.</p>
                <img src="/static/assets/icons/right.svg" alt="przejdź do linku" />
            </a>
        </div>
    </div>

    <a href="#article">
        <svg width="60" height="50" id="scroll-svg">
            <line x1="5" y1="5" x2="30" y2="45" style="
                            stroke-width: 5;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                        " class="svg-line" />
            <line x1="30" y1="45" x2="55" y2="5" style="
                            stroke-width: 5;
                            stroke-linecap: round;
                            stroke-linejoin: round;
                        " class="svg-line" />
        </svg>
    </a>
</div>

<article id="article">
    <h2>Pieczywo i Desery</h2>
    <p>
        Wyroby wypiekane z mąki, wody i soli w połączeniu z różnymi
        dodatkami. Stanowi jeden z podstawowych składników codziennej
        diety człowieka. Inne surowce wchodzące w skład pieczywa to
        mleko, środki spulchniające (zakwas, drożdże, proszek do
        pieczenia), cukier oraz dodatki zależne od rodzaju pieczywa, np.
        substancje zapachowo-smakowe, przyprawy ziołowe, mak, sezam,
        dynia, słonecznik, soja i suszone śliwki.
    </p>
    <p>
        Pod względem wartości odżywczej najzdrowsze jest pieczywo razowe
        - wypiekane z mąki razowej pszennej lub żytniej, która zawiera
        więcej witamin i soli mineralnych oraz błonnik - obecny w
        zewnętrznej osłonce ziaren i niezbędny do prawidłowego
        funkcjonowania jelit. Pieczywo białe posiada niewielką wartość
        odżywczą, a przy tym z reguły charakteryzuje się większą liczbą
        kilokalorii, np. grahamki 258 kcal/100 gramów, kajzerki 296
        kcal/100 g, rogaliki maślane 326 kcal/100 g, a bułeczki do hot
        dogów 340 kcal/100 g. W przypadku chleba: żytni pełnoziarnisty
        237 kcal/100 g, pumpernikiel 252 kcal/100 g, pszenny 249
        kcal/100 g, bagietki 283 kcal/100 g, a bułka wrocławska 293
        kcal/100 g. Dietetycy zalecają spożywanie różnych rodzajów
        pieczywa, tak aby dostarczyć do organizmu dużo różnorodnych
        składników odżywczych oraz błonnik. Pieczywo z dodatkiem pełnych
        nasion roślin oleistych: słonecznika, dyni, sezamu, lnu, soi,
        maku, kukurydzy oraz przyprawy kminku stanowi dodatkowe źródło
        witamin, soli mineralnych oraz nienasyconych kwasów
        tłuszczowych. Małym dzieciom i osobom nietolerującym chleba
        razowego poleca się chleb graham i bułki grahamki (z mąki
        pszennej z pełnego przemiału), które są delikatniejsze w smaku.
        Natomiast nie jest wskazane podawane dzieciom chleba, który
        zawiera polepszacze, konserwanty, środki antypleśniowe oraz
        pieczywa o przedłużonej trwałości, np. chleb tostowy.
    </p>
    <p>
        W przypadku przyjęcia okolicznościowego o specjalnym
        charakterze, np. bankietu wydawanego na cześć głowy państwa, gdy
        serwowany jest kompletny zestaw potraw i napojów, w tym nie
        jeden, lecz różnorodne desery, to są one podawane po daniach
        mięsnych i serach szlachetnych. W takim wypadku desery są
        serwowane w odpowiedniej kolejności (a nie jednocześnie) - owoce
        szlachetne są podawane dopiero po pierwszym deserze, a kawa,
        herbata, torty i ciastka jako ostatnie. Nakrywając do stołu do z
        góry zamówionego posiłku, sztućce do deseru kładzie się na stole
        nad talerzami: zwrócony w prawo mały widelczyk z trzema ząbkami
        do ciasta kremowego oraz skierowaną w lewą stronę łyżeczkę. W
        innych przypadkach sztućce do deseru podaje się razem z deserem.
        Desery gorące podaje się na talerzach porcelanowych, desery
        owocowe w naczyniach szklanych, a mrożone w pucharkach szklanych
        lub platerowanych. Ważną rolę w podawaniu deserów odgrywają sosy
        do deserów, które wzbogacają ich smak oraz pełnią funkcję
        dekoracyjną, nadając atrakcyjny wygląd. Sosy do deserów są
        słodkie w smaku; mogą być zimne lub gorące. Zimne sosy do
        deserów (np. sos malinowy lub brzoskwiniowy) są robione z
        przecierów owocowych z dodatkiem cukru, miodu oraz ewentualnie
        alkoholu (rumu, advocaatu). Gorące sosy do deserów są
        przyrządzane z mleka, śmietanki lub wina i najczęściej
        zagęszczane żółtkami lub mąką ziemniaczaną i żółtkami. Sosy
        gorące mogą być też podawane na zimno (np. sos szodonowy czy
        waniliowy). Częstymi dodatkami smakowymi do sosów są wanilia,
        kakao, czekolada i karmel. Z napojów do deseru serwuje się wina
        deserowe oraz szampana. W przypadku deserów ważny jest nie tylko
        smak i estetyczny sposób podania, ale również atrakcyjny wygląd,
        który ma wywołać uczucie podziwu dla kreatywności kulinarnej i
        ucieszyć konsumenta.
    </p>
</article>
<?php include 'partials/footer.php' ?>