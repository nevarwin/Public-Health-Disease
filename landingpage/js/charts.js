quarterSelect.addEventListener("change", applyFilter);
monthSelect.addEventListener("change", applyFilter);
weekSelect.addEventListener("change", applyFilter);

let dataCountsPerMonth = {};
let monthArray = [];
let isCalled = false;

// Extract months and counts from the associated array
console.log(dataCountsPerMonth);
const months = Object.keys(dataCountsPerMonth);
const countss = Object.values(dataCountsPerMonth);

// Create a mapping between numerical months and their names
const monthNames = {
  1: "January",
  2: "Febraury",
  3: "March",
  4: "April",
  5: "May",
  6: "June",
  7: "July",
  8: "August",
  9: "September",
  10: "October",
  11: "November",
  12: "December",
};

// Map numerical months to their names for labels and tooltips
const labels = months.map((month) => monthNames[month]);

// Function to add data to Chart.js
function addData(chart, label, newData) {
  chart.data.labels.push(label);
  chart.data.datasets.forEach((dataset) => {
    dataset.data.push(newData);
  });
  chart.update();
}

function applyFilter() {
  // console.log("from the charts.js");
  filteredData = [];
  dataCountsPerMonth = {};

  for (let i = 0; i < locationData.length; i++) {
    const item = locationData[i];
    const creationDate = new Date(item.creationDate);
    const month = creationDate.getMonth() + 1;
    const date = creationDate.getDate();
    const age = item.age;

    // Check if the month exists in the dataCountsPerMonth object
    if (!dataCountsPerMonth[month]) {
      dataCountsPerMonth[month] = 0; // Initialize the count for the month
    }

    dataCountsPerMonth[month]++;
    // console.log("dataCountsPerMonth", dataCountsPerMonth);
  }

  const newData = Object.values(dataCountsPerMonth);

  // Adding data to the chart
  const uniqueLabels = Object.keys(dataCountsPerMonth);
  quarterlyChart.data.labels = [];
  quarterlyChart.data.datasets[0].data = [];

  if (isCalled === false) {
    uniqueLabels.forEach((label, index) => {
      const monthName = monthNames[label];
      monthArray.push(monthName);
      addData(quarterlyChart, monthName, newData[index]);
    });
    addLineDynamicContent(monthArray, counts);
    isCalled = true;
  }
}

function addLineDynamicContent(monthArray, countsArray) {
  const monthlyChartDescription = document.getElementById(
    "monthlyChartDescription"
  );
  // console.log(countsArray);
  let content = "";

  if (monthArray.length === 0 || countsArray.length === 0) {
    content = " No data available.";
  } else {
    for (let i = 0; i < monthArray.length; i++) {
      content += `For the month of ${monthArray[i]}, the total count is ${countsArray[i]}.<br>`;
    }
  }

  monthlyChartDescription.innerHTML += content;
}

// console.log(monthArray);

// For the quarterly chart
const quarterlyCtx = document.getElementById("quarterlyChart").getContext("2d");

const quarterlyData = {
  labels: labels,
  datasets: [
    {
      fill: true,
      label: "Number of Cases",
      data: countss,
      borderWidth: 1,
      backgroundColor: ["rgba(255, 99, 132, 0.2)"],
      borderColor: ["rgb(255, 99, 132)"],
    },
  ],
  // Add tooltips to show the month names and counts
  options: {
    tooltips: {
      callbacks: {
        label: function (tooltipItem) {
          return tooltips[tooltipItem.index];
        },
      },
    },
  },
};

const quarterlyConfig = {
  type: "line",
  data: quarterlyData,
  options: {
    scales: {
      y: {
        title: {
          display: true,
          text: "Counts",
        },
      },
      x: {
        title: {
          display: true,
          text: "Months",
        },
      },
    },
    maintainAspectRatio: true,
    responsive: true,
    animation: {
      onComplete: () => {
        delayed = true;
      },
      delay: (context) => {
        let delay = 0;
        if (context.type === "data" && context.mode === "default" && !delayed) {
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
        text: `${diseaseName} Cases Per Year on all Municipality`,
        font: {
          size: 18,
        },
      },
    },
  },
};

const quarterlyChart = new Chart(quarterlyCtx, quarterlyConfig);
