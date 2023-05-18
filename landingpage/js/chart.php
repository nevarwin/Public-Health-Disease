<script>
  const ctx = document.getElementById("myChart").getContext('2d');

  new Chart(ctx, {
    legend: 'Hellow',
    type: "bar",
    data: {
      labels: ["2018", "2019", "2020", "2021", "2022", "2023"],
      datasets: [{
        label: "Number of Dengue Cases",
        data: [280, 413, 312, 415, 615, 578, 894],
        backgroundColor: [
          'rgba(255, 99, 132, 0.2)',
          'rgba(255, 159, 64, 0.2)',
          'rgba(255, 205, 86, 0.2)',
          'rgba(75, 192, 192, 0.2)',
          'rgba(54, 162, 235, 0.2)',
          'rgba(153, 102, 255, 0.2)'
        ],
        borderColor: [
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
          'rgb(255, 205, 86)',
          'rgb(75, 192, 192)',
          'rgb(54, 162, 235)',
          'rgb(153, 102, 255)'
        ],
        borderWidth: 1,
      }, ],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Dungue Cases',
          font: {
            size: 18
          }
        }
      },
      animation: {
        duration: 2000, // Animation duration in milliseconds
        easing: 'easeInOutQuart' // Easing function for animation
      },
      legend: {
        display: true,
        position: 'left',
        align: 'start'
      },
      responsive: true,

    },
  });

  const pieChart = document.getElementById("pieChart");

  new Chart(pieChart, {
    type: "pie",
    data: {
      labels: ["Alive", "Dead", "Recovering"],
      datasets: [{
        label: "Mortality Rate of Influenza Year 2021",
        data: [205, 13, 89],
        backgroundColor: [
          'rgba(75, 192, 192, 0.5)',
          'rgba(255, 99, 132, 0.5)',
          'rgba(255, 159, 64, 0.5)',
        ],
        borderColor: [
          'rgb(75, 192, 192)',
          'rgb(255, 99, 132)',
          'rgb(255, 159, 64)',
        ],
        borderWidth: 1,
      }, ],
    },
    options: {
      plugins: {
        title: {
          display: true,
          text: 'Influenza Year 2021',
          font: {
            size: 18
          }
        }
      },
      animation: {
        duration: 2000, // Animation duration in milliseconds
        easing: 'easeInOutQuart' // Easing function for animation
      },
      responsive: true,
    },
  });
</script>