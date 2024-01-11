let map;
let heatmap;
let filteredData = [];
let useFilteredData = false;
// console.log(defaultGradient);
// var locationData;

function monthConversion(month, monthConverted) {
  if (month >= 1 && month <= 3) {
    monthConverted = 1;
  } else if (month >= 4 && month <= 6) {
    monthConverted = 2;
  } else if (month >= 7 && month <= 9) {
    monthConverted = 3;
  } else if (month >= 10 && month <= 12) {
    monthConverted = 4;
  }
  // console.log("monthConverted", monthConverted, "month", month);
  return monthConverted;
}

function dateConversion(date, dateConverted) {
  if (date >= 1 && date <= 7) {
    dateConverted = 1;
  } else if (date <= 14 && date >= 8) {
    dateConverted = 2;
  } else if (date <= 21 && date >= 15) {
    dateConverted = 3;
  } else if (date <= 31 && date >= 22) {
    dateConverted = 4;
  }
  // console.log("dateConverted", dateConverted, "date", date);
  return dateConverted;
}

function applyFilter() {
  filteredData = [];
  const selectedQuarter = parseInt(
    document.getElementById("quarter-selection").value
  );
  const selectedMonth = parseInt(
    document.getElementById("month-selection").value
  );
  // console.log("selectedMonth", selectedMonth);
  const selectedWeek = parseInt(
    document.getElementById("week-selection").value
  );
  // console.log("selectedWeek", selectedWeek);

  // Filter the data based on the month and week
  for (let i = 0; i < locationData.length; i++) {
    const item = locationData[i];
    // console.log(item);
    const creationDate = new Date(item.creationDate);
    const month = creationDate.getMonth() + 1;
    // console.log("month", month);
    const date = creationDate.getDate();
    // console.log("date", date);

    let dateConverted;
    let monthConverted;

    dateConverted = dateConversion(date, dateConverted);
    monthConverted = monthConversion(month, monthConverted);

    const isQuarterlySelection = selectedQuarter === monthConverted;
    const isMonthlySelection = selectedMonth === month;
    const isMonthlyAndWeeklySelection =
      selectedMonth === month && selectedWeek === dateConverted;
    const isAll =
      selectedQuarter === 0 && selectedMonth === 0 && selectedWeek === 0;

    if (
      isQuarterlySelection ||
      isMonthlySelection ||
      isMonthlyAndWeeklySelection
    ) {
      filteredData.push(item);
    } else {
      useFilteredData = true;
    }

    if (isAll) {
      useFilteredData = false;
    }
  }

  // console.log("filteredData", Object.values(filteredData));

  // Clear previous heatmap
  if (heatmap) {
    heatmap.setMap(null);
  }

  initMap();
}

function initMap() {
  // My regulat getter of the heatmap
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 14.278023306102497,
      lng: 120.88505851514495,
    },
    zoom: 11,
    mapTypeId: "hybrid",
  });

  if (useFilteredData) {
    heatmap = new google.maps.visualization.HeatmapLayer({
      // Old data
      // data: locationData.map(
      //   (item) => new google.maps.LatLng(item.lat, item.lng)
      // ),

      // New data
      data: filteredData.map((item) => {
        // FOR LOGGING
        //
        //
        // console.log(item.creationDate);
        // console.log(new Date(item.creationDate).getDate());
        return {
          location: new google.maps.LatLng(item.lat, item.lng),
          weight: new Date(item.creationDate).getDate(),
        };
      }),
      map: map,
      radius: 20,
      gradient: defaultGradient,
    });
  } else {
    heatmap = new google.maps.visualization.HeatmapLayer({
      // Old data
      // data: locationData.map(
      //   (item) => new google.maps.LatLng(item.lat, item.lng)
      // ),

      // New data
      data: locationData.map((item) => {
        // FOR LOGGING
        //
        //
        // console.log(item.creationDate);
        // console.log(new Date(item.creationDate).getDate());
        return {
          location: new google.maps.LatLng(item.lat, item.lng),
          weight: new Date(item.creationDate).getDate(),
        };
      }),
      map: map,
      radius: 20,
      gradient: defaultGradient,
    });
  }
}

const deuteranomalyColors = [
  "rgba(255, 0, 0, 0)",
  "rgba(255, 140, 0, 1)", // Dark Orange
  "rgba(255, 165, 0, 1)", // Medium Orange
  "rgba(255, 200, 100, 1)", // Light Orange
  "rgba(144, 238, 144, 1)", // Light Green
  "rgba(0, 192, 0, 1)", // Medium Green
  "rgba(0, 128, 0, 1)", // Dark Green
  "rgba(173, 216, 230, 1)", // Light Blue
  "rgba(0, 0, 255, 1)", // Medium Blue
  "rgba(0, 0, 128, 1)", // Dark Blue
  "rgba(0, 0, 0, 1)",
];
const protanomalyColors = [
  "rgba(255, 0, 0, 0)",
  // Yellow Shades
  "rgba(255, 255, 153, 1)", // Light Yellow
  "rgba(255, 255, 102, 1)", // Medium Yellow
  "rgba(255, 255, 0, 1)", // Dark Yellow

  // Lime Green Shades
  "rgba(50, 205, 50, 1)", // Dark Lime Green
  "rgba(124, 252, 0, 1)", // Medium Lime Green
  "rgba(144, 238, 144, 1)", // Light Lime Green

  // Blue Shades
  "rgba(173, 216, 230, 1)", // Light Blue
  "rgba(0, 0, 255, 1)", // Medium Blue
  "rgba(0, 0, 128, 1)", // Dark Blue
  "rgba(0, 0, 0, 1)",
];
const tritanomalyColors = [
  "rgba(255, 0, 0, 0)",
  // Red Shades
  "rgba(255, 0, 0, 1)", // Dark Red
  "rgba(255, 69, 0, 1)", // Medium Red
  "rgba(255, 99, 71, 1)", // Light Red

  // Light Turquoise Shades
  "rgba(64, 224, 208, 1)", // Dark Light Turquoise
  "rgba(0, 255, 255, 1)", // Medium Light Turquoise
  "rgba(175, 238, 238, 1)", // Light Light Turquoise

  // Blue Shades
  "rgba(173, 216, 230, 1)", // Light Blue
  "rgba(0, 0, 255, 1)", // Medium Blue
  "rgba(0, 0, 128, 1)", // Dark Blue
  "rgba(0, 0, 0, 1)",
];
var gradientColors;

var warmGradient = "red, yellow, green";
var coolGradient = "blue, purple, teal";
// var isWarm = true;
isWarm ? (gradientColors = warmGradient) : (gradientColors = coolGradient);
document.getElementById("colorGradient").style.background =
  "linear-gradient(to right, " + gradientColors + ")";

function changeGradientColor() {
  var dropdown = document.getElementById("color-deficiency");

  if (dropdown.value === "deuteranomaly") {
    // console.log("deutera");
    heatmap.set("gradient", deuteranomalyColors);
    gradientColors = "#0000ff, #00dd00, #ff8800";
  } else if (dropdown.value === "protanomaly") {
    // console.log("prota");
    heatmap.set("gradient", protanomalyColors);
    gradientColors = "#0000ff, #00ee00, #ffbb00";
  } else if (dropdown.value === "tritanomaly") {
    // console.log("trita");
    heatmap.set("gradient", tritanomalyColors);
    gradientColors = "#0000ff, #00ffcc, #ff0000";
  } else if (dropdown.value === "default") {
    // console.log("default");
    heatmap.set("gradient", defaultGradient);
    isWarm ? (gradientColors = warmGradient) : (gradientColors = coolGradient);
    // console.log(defaultGradient);
    // console.log(isWarm);
  }
  // console.log(gradientColors);

  // Set the new gradient color to the element
  document.getElementById("colorGradient").style.background =
    "linear-gradient(to right, " + gradientColors + ")";
}

initMap();
