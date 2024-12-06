<?php 
include "./head.html";
include "./menu.html";

?>
    <!-- Fejléc -->
    

    <!-- Hős szakasz -->
    <header class="hero">
        <div class="container">
            <h1>Üdvözlünk a Zöldtetők és Városi Zöldterületek Adatbázisában!</h1>
            <p>Fedezd fel a zöldterületek és zöldtetők pozitív hatásait a városi környezetre.</p>
            <a href="#zoldteruletek" class="btn btn-custom btn-lg mt-3">Fedezd fel!</a>
        </div>
    </header>

    <!-- Fő tartalom -->
    <main class="container my-5">
        <section id="zoldteruletek" class="mb-5 d-flex align-items-center">
            <div class="text-container" style="flex: 1;">
                <h2>Zöldterületek</h2>
                <p>A városi zöldterületek nemcsak esztétikai szempontból fontosak, hanem jelentős mértékben hozzájárulnak a környezet és az emberi élet minőségének javításához. Ezek a területek, például parkok, fasorok, közösségi kertek és zöld tetők, alapvető szerepet töltenek be a levegőminőség javításában, mivel a növények szén-dioxidot nyelnek el, és oxigént bocsátanak ki. Emellett hatékonyan mérséklik a zajszennyezést, ami különösen előnyös a sűrűn lakott városi környezetekben, ahol a forgalom és az ipari tevékenységek okozta zaj jelentős terhelést jelent.</p>
                <a href="zoldteruletek.php" class="btn btn-custom">További információ</a>
            </div>
            <div class="image-container" style="flex: 1; padding-left: 20px;">
                <img src="./img/zoldterulet.jpg" alt="Zöldterület kép" class="img-fluid" style="border-radius: 8px; max-width: 70%;">
            </div>
        </section>
    <hr>
        <section id="zoldtetok" class="mb-5 d-flex align-items-center">
            <div class="text-container" style="flex: 1; order: 2;">
                <h2>Zöldtetők</h2>
                <p>A zöldtetők segítenek csökkenteni a hőszigethatást, javítják az épületek energiahatékonyságát és fenntarthatóvá teszik a városi környezetet. Emellett esztétikai és közösségi értéket is teremtenek.</p>
                <a href="zoldtetok.php" class="btn btn-custom">További információ</a>
            </div>
            <div class="image-container" style="flex: 1; padding-left: 20px;">
                <img src="./img/zoldteto.jpg" alt="Zöldtető kép" class="img-fluid" style="border-radius: 8px; max-width: 70%;">
            </div>
        </section>
    </main>
    
    

    <!-- Lábléc -->
    <?php 
    include "footer.php";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
