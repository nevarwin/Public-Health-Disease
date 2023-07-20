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
  "rgba(255, 0, 0, 0)",
  "rgba(255, 136, 0, 1)", // Orange
  "rgba(0, 221, 0, 1)", // Light green
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(255, 0, 0, 1)",
];
const protanomalyColors = [
  "rgba(255, 0, 0, 0)",
  "rgba(255, 187, 0, 1)", // Yellow
  "rgba(0, 238, 0, 1)", // Lime green
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(255, 0, 0, 1)",
];
const tritanomalyColors = [
  "rgba(255, 0, 0, 0)",
  "rgba(255, 0, 0, 1)", // Red
  "rgba(0, 255, 204, 1)", // Light turquoise
  "rgba(0, 0, 255, 1)", // Blue
  "rgba(255, 0, 0, 1)",
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
    console.log("trita");
    heatmap.set("gradient", heatmap.get("gradient") ? null : defaultColors);
  }
}

initMap();
