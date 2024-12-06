<?php 
include "./head.html";
include "./menu.html";

?>

    <!-- Hős szakasz -->
    <header class="hero">
        <div class="container">
            <h1>Zöldterületek Listája</h1>
            <p>Ismerd meg a városaink zöld területeit és azok hatásait!</p>
        </div>
    </header>

    <!-- Fő tartalom -->
    <main class="container my-5">
    <h2>Városi Zöldterületek</h2>
    <p>Az alábbi táblázat a különböző zöldterületek adatait tartalmazza, beleértve azok típusát, méretét, és hatásait a környezetre.</p>
    
    <!-- Városi zöldterületek táblázat -->
    <table class="table table-bordered bg-light-green" id="greenAreaTable">
        <thead>
            <tr>
                <th>Név</th>
                <th>Típus</th>
                <th>Méret (m²)</th>
                <th>Levegőminőség Javulás (%)</th>
                <th>Zajcsökkentés (%)</th>
                <th>Hőmérséklet Csökkentés (°C)</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dinamikusan generált sorok -->
        </tbody>
    </table>
    <div class="chart-container">
        <h2 style="text-align: center;">Zöldterületek kialakításának változása (négyzetmerben) az évek alatt</h2>
        <canvas id="greenAreaChart"></canvas>
    </div>



    <hr>

    <h3>Zöldtetők Adatbázisa</h3>
    <p>A zöldtetők pozitív hatásai az épületek energiahatékonyságára és a város ökoszisztémájára szintén lenyűgözőek:</p>
    <!-- Zöldtetők táblázat -->
    <table class="table table-bordered bg-light-green" id="greenRoofTable">
        <thead>
            <tr>
                <th>Épület neve</th>
                <th>Cím</th>
                <th>Zöldtető mérete (m²)</th>
                <th>Építés dátum</th>
            </tr>
        </thead>
        <tbody>
            <!-- Dinamikusan generált sorok -->
        </tbody>
    </table>

    <div class="chart-container">
        <h2 style="text-align: center;">Zöldtetők négyzetmétereinek növekedése az évek alatt</h2>
        <canvas id="greenRoofChart"></canvas>
    </div>
</main>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Városi zöldterületek táblázat
        fetch('greenarea_api.php')
            .then(response => response.json())
            .then(json => {
                if (json.status === 'success') {
                    const tableBody = document.querySelector('#greenAreaTable tbody');
                    json.data.forEach(area => {
                        const row = `
                            <tr>
                                <td>${area.name}</td>
                                <td>${area.type_name}</td>
                                <td>${area.area_m2}</td>
                                <td>${area.air_quality_improvement || '-'}</td>
                                <td>${area.noise_reduction || '-'}</td>
                                <td>${area.temperature_reduction || '-'}</td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML('beforeend', row);
                    });
                } else {
                    console.error('Hiba történt az adatok betöltése során:', json.message);
                }
            });

        // Zöldtetők táblázat és diagram
        fetch('greenroofs_api.php')
            .then(response => response.json())
            .then(json => {
                if (json.status === 'success') {
                    const tableBody = document.querySelector('#greenRoofTable tbody');
                    const years = [];
                    const cumulativeAreas = [];

                    let totalArea = 0;
                    json.data.forEach(roof => {
                        const year = new Date(roof.creation_date).getFullYear();
                        totalArea += roof.area_m2;

                        // Táblázat feltöltése
                        const row = `
                            <tr>
                                <td>${roof.building_name}</td>
                                <td>${roof.address}</td>
                                <td>${roof.green_roof_area_m2}</td>
                                <td>${roof.construction_date}</td>
                            </tr>
                        `;
                        tableBody.insertAdjacentHTML('beforeend', row);

                        
                    });

                    
                    
                } else {
                    console.error('Hiba történt az adatok betöltése során:', json.message);
                }
            });
        });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="./areaChart.js"></script>
    <script src="./roofChart.js"></script>

    <!-- Lábléc -->
<?php 
    include "footer.php";
    ?>