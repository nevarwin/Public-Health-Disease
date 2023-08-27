let map;
let heatmap;
console.log(defaultGradient);
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
    gradient: defaultGradient,
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
// const warmColors = [
//   "rgba(0, 0, 0, 0)",
//   "rgb(255, 0, 0)", // Red
//   "rgb(255, 255, 0)", // Yellow
//   "rgb(0, 128, 0)", // Green
//   "rgba(0, 0, 0, 1)",
// ];

// const coolors = [
//   "rgba(0, 0, 0, 0)",
//   "rgb(0, 102, 204)", // Blue
//   "rgb(102, 0, 102)", // Purple
//   "rgb(0, 204, 102)", // Teal
//   "rgba(0, 0, 0, 1)",
// ];
console.log(isWarm);
var gradientColors;

var warmGradient = "red, yellow, green";
var coolGradient = "blue, purple, teal";
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
    console.log(defaultGradient);
    console.log(isWarm);
  }
  console.log(gradientColors);

  // Set the new gradient color to the element
  document.getElementById("colorGradient").style.background =
    "linear-gradient(to right, " + gradientColors + ")";
}

initMap();
