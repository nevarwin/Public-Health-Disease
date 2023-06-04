// script for piechart
var pieJsonData;
var diseaseName;
var selectedDisease;

if (pieJsonData === undefined || pieJsonData === null || pieJsonData === "") {
  cases = 0;
  municipalities = [];
  pieSelectedYear = "Sample Year";
}

var sampleMun = [
  "Alfonso",
  "Amadeo",
  "Bacoor",
  "Carmona",
  "Cavite City",
  "Dasmariñas",
  "Gen. Emilio Aguinaldo",
  "Gen. Mariano Alvarez",
  "General Trias",
  "Imus",
  "Indang",
  "Kawit",
  "Magallanes",
  "Maragondon",
  "Mendez",
  "Naic",
  "Noveleta",
  "Rosario",
  "Silang",
  "Tagaytay City",
  "Tanza",
  "Ternate",
  "Trece Martires City",
];

var diseases = {
  1: "Amebiasis",
  2: "Adverse Event Following Immunization",
  3: "Acute encephalitis syndrome",
  4: "Alpha-Fetoprotein",
  5: "Acute Meningitis",
  6: "Chikungunya Virus",
  7: "Diphtheria",
  8: "Hand, Foot, and Mouth Disease",
  9: "Number Needed to Treat",
  10: "Neonatal Tetanus",
  11: "Perthes Disease",
  12: "Influenza",
  13: "Dengue",
  14: "Rabies",
  15: "Cholera",
  16: "Hepatitis",
  17: "Measles",
  18: "Meningitis",
  19: "Meningo",
  20: "Typhoid",
  21: "Leptospirosis",
};

var municipality = {
  1: "Alfonso",
  2: "Amadeo",
  3: "Bacoor",
  4: "Carmona",
  5: "Cavite City",
  6: "Dasmariñas",
  7: "Gen. Emilio Aguinaldo",
  8: "Gen. Mariano Alvarez",
  9: "General Trias",
  10: "Imus",
  11: "Indang",
  12: "Kawit",
  13: "Magallanes",
  14: "Maragondon",
  15: "Mendez",
  16: "Naic",
  17: "Noveleta",
  18: "Rosario",
  19: "Silang",
  20: "Tagaytay City",
  21: "Tanza",
  22: "Ternate",
  23: "Trece Martires City",
};

if (
  selectedDisease === undefined ||
  selectedDisease === null ||
  selectedDisease === "" ||
  selectedDisease === 0
) {
  diseaseName = "Sample Disease";
} else {
  diseaseName = diseases[selectedDisease];
}

// this translates the municipalities from sql to the corresponding number
// in the municipality associated array
var translatedMunicipality = municipalities.map(function (number) {
  return municipality[number];
});

const pie = document.getElementById("pieChart");
let pieDelayed;

const colors = [];
for (let i = 0; i < 23; i++) {
  const red = Math.floor(Math.random() * 256);
  const green = Math.floor(Math.random() * 256);
  const blue = Math.floor(Math.random() * 256);
  const alpha = (Math.floor(Math.random() * 9) + 1) / 10; // Random alpha value between 0.1 and 0.9
  const color = `rgba(${red}, ${green}, ${blue}, ${alpha})`;
  colors.push(color);
}

const pieData = {
  labels:
    translatedMunicipality.length === 0
      ? [
          "Alfonso",
          "Amadeo",
          "Bacoor",
          "Carmona",
          "Cavite City",
          "Dasmariñas",
          "Gen. Emilio Aguinaldo",
          "Gen. Mariano Alvarez",
          "General Trias",
          "Imus",
          "Indang",
          "Kawit",
          "Magallanes",
          "Maragondon",
          "Mendez",
          "Naic",
          "Noveleta",
          "Rosario",
          "Silang",
          "Tagaytay City",
          "Tanza",
          "Ternate",
          "Trece Martires City",
        ]
      : translatedMunicipality,
  // label: `Number of ${diseaseName} Cases`,
  datasets: [
    {
      label: "Cases",
      data:
        cases === 0
          ? [
              66, 50, 1362, 33, 9, 133, 16, 109, 207, 2809, 6, 108, 2, 72, 81,
              14, 10, 17, 190, 301, 59, 215, 16,
            ]
          : cases,
      backgroundColor: colors,
      borderColor: colors,
      borderWidth: 1,
    },
  ],
};

const pieConfig = {
  type: "pie",
  data: pieData,
  options: {
    plugins: {
      title: {
        display: true,
        text: `${diseaseName} Cases Per Municipality Year ${pieSelectedYear}`,
        font: {
          size: 18,
        },
      },
      legend: {
        position: "left",
      },
    },
    animation: {
      onComplete: () => {
        pieDelayed = true;
      },
      delay: (context) => {
        let delay = 0;
        if (
          context.type === "data" &&
          context.mode === "default" &&
          !pieDelayed
        ) {
          delay = context.dataIndex * 150 + context.datasetIndex * 500;
        }
        return delay;
      },
    },
    responsive: true,
  },
};

const pieChart = new Chart(pie, pieConfig);

// script for line chart
var diseaseName;
var selectedDisease;
if (
  selectedDisease === undefined ||
  selectedDisease === null ||
  selectedDisease === "" ||
  selectedDisease === 0
) {
  diseaseName = "Sample Disease";
} else {
  diseaseName = diseases[selectedDisease];
}

var years = [];
var counts = [];
var lineJsonData;

if (
  lineJsonData === undefined ||
  lineJsonData === null ||
  lineJsonData === ""
) {
  years = 0;
  counts = 0;
  diseaseName = "Sample Disease";
}
for (var year in lineJsonData) {
  if (lineJsonData.hasOwnProperty(year)) {
    var count = parseInt(lineJsonData[year]);
    years.push(year);
    counts.push(count);
  }
}

const ctx = document.getElementById("myChart").getContext("2d");
let delayed;

const data = {
  labels: years === 0 ? ["2018", "2019", "2020", "2021", "2022"] : years,
  datasets: [
    {
      fill: true,
      label: `Number of ${diseaseName} Cases`,
      data: counts === 0 ? [2358, 3877, 2850, 3504, 5885] : counts,
      borderWidth: 1,
      backgroundColor: ["rgba(255, 99, 132, 0.2)"],
      borderColor: ["rgb(255, 99, 132)"],
    },
  ],
};

const hoverline = {
  id: "hoverLine",
  afterDatasetsDraw(myChart, args, plugins) {
    const {
      ctx,
      tooltip,
      chartArea: { top, bottom, left, right, width, height },
      scales: { x, y },
    } = myChart;

    if (tooltip._active.length > 0) {
      const xCoor = x.getPixelForValue(tooltip.dataPoints[0].dataIndex);
      const yCoor = y.getPixelForValue(tooltip.dataPoint[0].parsed.y);

      ctx.save();
      ctx.beginPath();
      ctx.lineWidth = 3;
      ctx.strokeStyle = "rgba(0, 0, 0, 1)";
      ctx.setLineDash([6, 6]);
      ctx.moveTo(xCoor, yCoor);
      ctx.lineTo(xCoor, bottom);
      ctx.stroke();
      ctx.closePath();
      ctx.setLineDash([]);
    }
  },
};

const config = {
  type: "line",
  data: data,
  options: {
    maintainAspectRation: true,
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
        text: `${diseaseName} Cases Per Year`,
        font: {
          size: 18,
        },
      },
    },
  },
  plugis: [hoverline],
};

const myChart = new Chart(ctx, config);
