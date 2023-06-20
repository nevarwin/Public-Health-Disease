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

initMap();
