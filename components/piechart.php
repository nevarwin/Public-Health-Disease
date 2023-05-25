<script>
    const pieChart = document.getElementById("pieChart");

    const colors = [];
    for (let i = 0; i < 23; i++) {
        const red = Math.floor(Math.random() * 256);
        const green = Math.floor(Math.random() * 256);
        const blue = Math.floor(Math.random() * 256);
        const alpha = (Math.floor(Math.random() * 9) + 1) / 10; // Random alpha value between 0.1 and 0.9
        const color = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
        colors.push(color);
    }


    new Chart(pieChart, {
        type: "pie",
        data: {
            labels: ["Alfonso", "Amadeo", "Bacoor", "Carmona", "Cavite City", "Dasmariñas", "Gen. Emilio Aguinaldo", "Gen. Mariano Alvarez", "General Trias", "Imus", "Indang", "Kawit", "Magallanes", "Maragondon", "Mendez", "Naic", "Noveleta", "Rosario", "Silang", "Tagaytay City", "Tanza", "Ternate", "Trece Martires City"],
            datasets: [{
                label: "Cases",
                data: [66, 50, 1362, 33, 9, 133, 16, 109, 207, 2809, 6, 108, 2, 72, 81, 14, 10, 17, 190, 301, 59, 215, 16],
                backgroundColor: colors,
                borderColor: colors,
                borderWidth: 1,
            }, ],
        },
        options: {
            plugins: {
                title: {
                    display: true,
                    text: 'Influenza Cases Per Municipality Year 2022',
                    font: {
                        size: 18
                    }
                }
            },
            animation: {
                onComplete: () => {
                    delayed = true;
                },
                delay: (context) => {
                    let delay = 0;
                    if (context.type === 'data' && context.mode === 'default' && !delayed) {
                        delay = context.dataIndex * 300 + context.datasetIndex * 100;
                    }
                    return delay;
                },
            },
            responsive: true,
        },
    });
</script>