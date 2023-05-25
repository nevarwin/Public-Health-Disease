<script>
    const ctx = document.getElementById("myChart").getContext('2d');
    let delayed;

    const data = {
        labels: ["2018", "2019", "2020", "2021", "2022"],
        datasets: [{
            fill: true,
            label: "Number of Influenza Cases",
            data: [2358, 3877, 2850, 3504, 5885],
            borderWidth: 1,
            backgroundColor: [
                'rgba(255, 99, 132, 0.2)'
            ],
            borderColor: [
                'rgb(255, 99, 132)'
            ],
        }, ],
    };

    const config = {
        type: "line",
        data: data,
        options: {
            responsive: true,
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
            radius: 5,
            hitRadius: 20,
            hoverRadius: 12,
            plugins: {
                title: {
                    display: true,
                    text: 'Influenza Cases in past 5 years',
                    font: {
                        size: 18
                    }
                }
            },
        },
    };

    const myChart = new Chart(ctx, config);
</script>