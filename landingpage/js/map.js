let map;
let heatmap;
// var locationData;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    center: {
      lat: 14.278023306102497,
      lng: 120.88505851514495,
    },
    zoom: 11,
    mapTypeId: "satellite",
  });

  heatmap = new google.maps.visualization.HeatmapLayer({
    data: locationData.map(
      (item) => new google.maps.LatLng(item.lat, item.lng)
    ),
    map: map,
    radius: 20,
  });
}

const deuteranomalyColors = [
  "rgba(0, 0, 0, 0)",
  "rgba(255, 136, 0, 1)", // Orange
  "rgba(0, 221, 0, 1)", // Light green
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(0, 0, 0, 1)",
];
const protanomalyColors = [
  "rgba(0, 0, 0, 0)",
  "rgba(255, 187, 0, 1)", // Yellow
  "rgba(0, 238, 0, 1)", // Lime green
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(0, 0, 0, 1)",
];
const tritanomalyColors = [
  "rgba(0, 0, 0, 0)",
  "rgba(255, 0, 0, 1)", // Red
  "rgba(0, 255, 204, 1)", // Light turquoise
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(0, 0, 0, 1)",
];
const defaultColors = [
  "rgba(0, 0, 0, 0)",
  "rgb(255, 0, 0)", // Red
  "rgb(255, 255, 0)", // Yellow
  "rgb(0, 128, 0)", // Green
  "rgba(0, 0, 0, 1)",
];

function changeGradientColor() {
  var dropdown = document.getElementById("color-deficiency");
  var gradientColors;

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
    // console.log("trita");
    heatmap.set("gradient", heatmap.get("gradient") ? null : defaultColors);
    gradientColors = "red, yellow, green";
  }
  console.log(gradientColors);

  // Set the new gradient color to the element
  document.getElementById("colorGradient").style.background =
    "linear-gradient(to right, " + gradientColors + ")";
}

initMap();
