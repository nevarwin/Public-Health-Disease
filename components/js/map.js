let map;
let heatmap;
let filteredData = [];
let useFilteredData = false;

function monthConversion(month, monthConverted) {
  if (month >= 1 && month <= 3) {
    monthConverted = "1";
  } else if (month >= 4 && month <= 6) {
    monthConverted = "2";
  } else if (month >= 7 && month <= 9) {
    monthConverted = "3";
  } else if (month >= 10 && month <= 12) {
    monthConverted = "4";
  }
  // console.log("monthConverted", monthConverted, "month", month);
  return monthConverted;
}

function dateConversion(date, dateConverted) {
  if (date >= 1 && date <= 7) {
    dateConverted = "1";
  } else if (date <= 14 && date >= 8) {
    dateConverted = "2";
  } else if (date <= 21 && date >= 15) {
    dateConverted = "3";
  } else if (date <= 31 && date >= 22) {
    dateConverted = "4";
  }
  // console.log("dateConverted", dateConverted, "date", date);
  return dateConverted;
}

// Handle changes in the dropdown menus
const diseaseSelect = document.getElementById("disease");
const yearSelect = document.getElementById("year");

diseaseSelect.addEventListener("change", updateHeatmap);
yearSelect.addEventListener("change", updateHeatmap);

const quarterSelect = document.getElementById("quarter-selection");
const monthSelect = document.getElementById("month-selection");
const weekSelect = document.getElementById("week-selection");

quarterSelect.addEventListener("change", applyFilter);
monthSelect.addEventListener("change", applyFilter);
weekSelect.addEventListener("change", applyFilter);

function updateHeatmap() {
  const selectedDisease = diseaseSelect.value;
  console.log("selectedDisease", selectedDisease);
  const selectedYear = yearSelect.value;
  console.log("selectedYear", selectedYear);

  // // Redirect to the same page with updated query parameters
  // window.location.href = `map.php?disease=${selectedDisease}&year=${selectedYear}`;

  // Construct the URL with updated query parameters
  const baseUrl = "map.php";
  const queryParams = new URLSearchParams({
    disease: selectedDisease,
    year: selectedYear,
  });
  // Redirect to the same page with updated query parameters
  window.location.href = `${baseUrl}?${queryParams.toString()}`;

  if (heatmap) {
    heatmap.setMap(null);
  }

  initMap();
  console.log("updateHeatmap");
}

function applyFilter() {
  let filteredData = [];
  const selectedQuarter = quarterSelect.value;
  console.log("selectedQuarter", selectedQuarter);
  const selectedMonth = monthSelect.value;
  console.log("selectedMonth", selectedMonth);
  const selectedWeek = weekSelect.value;
  console.log("selectedWeek", selectedWeek);

  for (let i = 0; i < locationData.length; i++) {
    const item = locationData[i];
    const creationDate = new Date(item.creationDate);
    const month = creationDate.getMonth() + 1;
    const date = creationDate.getDate();

    let dateConverted;
    let monthConverted;

    dateConverted = dateConversion(date, dateConverted);
    monthConverted = monthConversion(month, monthConverted);

    console.log(
      "selectedQuarter",
      selectedQuarter,
      "monthConverted",
      monthConverted,
      typeof monthConverted,
      typeof selectedQuarter
    );

    const isQuarterlySelection = selectedQuarter === monthConverted;
    const isMonthlySelection = selectedMonth === month && selectedWeek === 0;
    const isMonthlyAndWeeklySelection =
      selectedMonth === month && selectedWeek === dateConverted;
    const isAll =
      selectedQuarter === 0 && selectedMonth === 0 && selectedWeek === 0;

    console.log(isQuarterlySelection);

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
  console.log("initMap");
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 14.278023306102497,
      lng: 120.88505851514495,
    },
    zoom: 11,
    mapTypeId: "roadmap",
  });

  if (useFilteredData) {
    console.log("filteredData", filteredData);
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
        console.log(item.creationDate);
        console.log(new Date(item.creationDate).getDate());
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

  heatmap = new google.maps.visualization.HeatmapLayer({
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
  });
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
const defaultColors = [
  "rgba(0, 255, 255, 0)",
  "rgba(0, 255, 255, 1)",
  "rgba(0, 191, 255, 1)",
  "rgba(0, 127, 255, 1)",
  "rgba(0, 63, 255, 1)",
  "rgba(0, 0, 255, 1)",
  "rgba(0, 0, 223, 1)",
  "rgba(0, 0, 191, 1)",
  "rgba(0, 0, 159, 1)",
  "rgba(0, 0, 127, 1)",
  "rgba(63, 0, 91, 1)",
  "rgba(127, 0, 63, 1)",
  "rgba(191, 0, 31, 1)",
  "rgba(255, 0, 0, 1)",
];

function changeGradientColor() {
  var dropdown = document.getElementById("color-deficiency");

  if (dropdown.value === "deuteranomaly") {
    console.log("deutera");
    heatmap.set("gradient", deuteranomalyColors);
  } else if (dropdown.value === "protanomaly") {
    console.log("prota");
    heatmap.set("gradient", protanomalyColors);
  } else if (dropdown.value === "tritanomaly") {
    console.log("trita");
    heatmap.set("gradient", tritanomalyColors);
  } else if (dropdown.value === "default") {
    console.log("default");
    heatmap.set("gradient", heatmap.get("gradient") ? null : defaultColors);
    console.log(defaultColors);
  }
}

initMap();
