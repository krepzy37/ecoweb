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
    <div class="container">

    <section id="zoldteruletek" class="mb-5">
    <div class="row align-items-center flex-column flex-md-row">
        <div class="col-md-6 order-1 order-md-0 text-center">
            <img src="./img/zoldterulet.jpg" alt="Zöldterület kép" class="img-fluid" style="border-radius: 8px; max-width: 70%;">
        </div>
        <div class="col-md-6 order-0 order-md-1">
            <hr>
            <h2>Zöldterületek</h2>
            <p>A városi zöldterületek nemcsak esztétikai szempontból fontosak, hanem jelentős mértékben hozzájárulnak a környezet és az emberi élet minőségének javításához. Ezek a területek, például parkok, fasorok, közösségi kertek és zöld tetők, alapvető szerepet töltenek be a levegőminőség javításában, mivel a növények szén-dioxidot nyelnek el, és oxigént bocsátanak ki. Emellett hatékonyan mérséklik a zajszennyezést, ami különösen előnyös a sűrűn lakott városi környezetekben, ahol a forgalom és az ipari tevékenységek okozta zaj jelentős terhelést jelent.</p>
            <a href="zoldteruletek.php" class="btn btn-custom">További információ</a>
            <hr>
        </div>
    </div>
</section>

<section id="zoldtetok" class="mb-5">
    <div class="row align-items-center flex-column flex-md-row">
        <div class="col-md-6 order-1 order-md-1 text-center">
            <img src="./img/zoldteto.jpg" alt="Zöldtető kép" class="img-fluid" style="border-radius: 8px; max-width: 70%;">
        </div>
        <div class="col-md-6 order-0 order-md-0">
            <hr>
            <h2>Zöldtetők</h2>
            <p>A városi zöldterületek nemcsak esztétikai szempontból fontosak, hanem jelentős mértékben hozzájárulnak a környezet és az emberi élet minőségének javításához. Ezek a területek, például parkok, fasorok, közösségi kertek és zöld tetők, alapvető szerepet töltenek be a levegőminőség javításában, mivel a növények szén-dioxidot nyelnek el, és oxigént bocsátanak ki. Emellett hatékonyan mérséklik a zajszennyezést, ami különösen előnyös a sűrűn lakott városi környezetekben, ahol a forgalom és az ipari tevékenységek okozta zaj jelentős terhelést jelent.</p>
            <a href="zoldtetok.php" class="btn btn-custom">További információ</a>
            <hr>
        </div>
    </div>
</section>

</div>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Lábléc -->
    <?php 
    include "footer.php";
    ?>

