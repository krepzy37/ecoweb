document.addEventListener('DOMContentLoaded', () => {
    fetch('greenarea_api.php')
        .then(response => response.json())
        .then(json => {
            if (json.status === 'success') {
                const years = [];
                const areaByYear = {};

                // Csoportosítás évek szerint
                json.data.forEach(area => {
                    const year = new Date(area.creation_date).getFullYear();
                    if (!areaByYear[year]) {
                        areaByYear[year] = 0; // Kezdeti érték
                        years.push(year); // Év hozzáadása
                    }
                    areaByYear[year] += area.area_m2; // Hozzáadás az adott évhez
                });

                // Évek sorrendbe állítása
                years.sort();

                // Kumulatív adatok számítása
                const cumulativeAreas = [];
                let cumulativeTotal = 0;

                years.forEach(year => {
                    cumulativeTotal += areaByYear[year];
                    cumulativeAreas.push(cumulativeTotal);
                });

                // Diagram inicializálása
                const ctx = document.getElementById('greenAreaChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: years,
                        datasets: [{
                            label: 'Kumulatív zöldterület összesen (m²)',
                            data: cumulativeAreas,
                            backgroundColor: 'rgba(34, 139, 34, 0.7)', // Zöld szín
                            borderColor: 'rgba(0, 100, 0, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: true,
                        scales: {
                            x: {
                                title: { display: true, text: 'Év' }
                            },
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: 'Kumulatív terület (m²)' }
                            }
                        },
                        plugins: {
                            legend: {
                                display: true
                            }
                        }
                    }
                });
            } else {
                console.error('Hiba történt az adatok betöltése során:', json.message);
            }
        })
        .catch(error => console.error('Hiba a fetch során:', error));
});
