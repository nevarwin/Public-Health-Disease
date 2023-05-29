// This example requires the Visualization library. Include the libraries=visualization
// parameter when you first load the API. For example:
// <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_API_KEY&libraries=visualization">
let map, heatmap;

function initMap() {
  map = new google.maps.Map(document.getElementById("map"), {
    zoom: 11,
    center: {
      lat: 14.278023306102497,
      lng: 120.88505851514495,
    },
    mapTypeId: "satellite",
  });
  heatmap = new google.maps.visualization.HeatmapLayer({
    data: getPoints(),
    map: map,
  });
  document
    .getElementById("toggle-heatmap")
    .addEventListener("click", toggleHeatmap);
  document
    .getElementById("change-gradient")
    .addEventListener("click", changeGradient);
  document
    .getElementById("change-opacity")
    .addEventListener("click", changeOpacity);
  document
    .getElementById("change-radius")
    .addEventListener("click", changeRadius);
}

function toggleHeatmap() {
  heatmap.setMap(heatmap.getMap() ? null : map);
}

function changeGradient() {
  const gradient = [
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

  heatmap.set("gradient", heatmap.get("gradient") ? null : gradient);
}

function changeRadius() {
  heatmap.set("radius", heatmap.get("radius") ? null : 20);
}

function changeOpacity() {
  heatmap.set("opacity", heatmap.get("opacity") ? null : 0.2);
}

// Heatmap data: 500 Points
function getPoints() {
  return [
    new google.maps.LatLng(14.3469432, 120.927391),
    new google.maps.LatLng(14.4259931, 120.9481919),
    new google.maps.LatLng(14.4362229, 120.9087389),
    new google.maps.LatLng(14.0929138, 120.8986943),
    new google.maps.LatLng(14.4079605, 120.8491766),
    new google.maps.LatLng(14.4195755, 120.8628139),
    new google.maps.LatLng(14.4220844, 120.8678378),
    new google.maps.LatLng(14.2837535, 121.0077058),
    new google.maps.LatLng(14.2964865, 120.792458),
    new google.maps.LatLng(14.3423806, 120.7806385),
    new google.maps.LatLng(14.457594, 120.9352814),
    new google.maps.LatLng(14.1377669, 120.8574309),
    new google.maps.LatLng(14.2118499, 120.9331295),
    new google.maps.LatLng(14.2837535, 121.0077058),
    new google.maps.LatLng(14.3856882, 120.8803966),
    new google.maps.LatLng(14.1469065, 120.799639),
    new google.maps.LatLng(14.3084013, 121.0112901),
    new google.maps.LatLng(14.3214094, 120.907304),
    new google.maps.LatLng(14.3084013, 121.0112901),
    new google.maps.LatLng(14.3214094, 120.907304),
    new google.maps.LatLng(14.1920384, 120.8728615),
    new google.maps.LatLng(14.158284, 120.7464897),
    new google.maps.LatLng(14.2687377, 120.7421793),
    new google.maps.LatLng(14.1306479, 120.8872137),
    new google.maps.LatLng(14.4303595, 120.8821906),
    new google.maps.LatLng(14.2445565, 121.0272762),
    new google.maps.LatLng(14.3429329, 120.8503144),
    new google.maps.LatLng(14.2540076, 120.6545022),
    new google.maps.LatLng(14.2578207, 120.8642493),
    new google.maps.LatLng(14.4220504, 120.9173479),
    new google.maps.LatLng(14.4220845, 120.8678377),
    new google.maps.LatLng(14.4229772, 120.9288256),
    new google.maps.LatLng(14.4229772, 120.9288256),
    new google.maps.LatLng(14.4229772, 120.9288256),
    new google.maps.LatLng(14.4238066, 120.9230869),
  ];
}

window.initMap = initMap;
