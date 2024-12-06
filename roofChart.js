document.addEventListener('DOMContentLoaded', () => {
    fetch('greenroofs_api.php')
        .then(response => response.json())
        .then(json => {
            if (json.status === 'success') {
                const years = [];
                const cumulativeAreas = [];
                let totalArea = 0;

                json.data.forEach(roof => {
                    const year = new Date(roof.construction_date).getFullYear();
                    totalArea += roof.green_roof_area_m2;

                    if (!years.includes(year)) {
                        years.push(year);
                        cumulativeAreas.push(totalArea);
                    }
                });

                const ctx = document.getElementById('greenRoofChart').getContext('2d');
                new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: years,
                        datasets: [{
                            label: 'Kumulatív zöldtető terület (m²)',
                            data: cumulativeAreas,
                            backgroundColor: 'rgba(26, 143, 0, 0.7)',
                            borderColor: 'rgba(76, 175, 80, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            x: {
                                title: { display: true, text: 'Év' }
                            },
                            y: {
                                beginAtZero: true,
                                title: { display: true, text: 'Kumulatív zöldtető terület (m²)' }
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
