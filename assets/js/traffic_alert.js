function userPosition(position) {
  var infopos = "Position déterminée :\n";
  infopos += "Latitude : " + position.coords.latitude + "\n";
  infopos += "Longitude: " + position.coords.longitude + "\n";
  document.getElementById("infoposition").innerHTML = infopos;
}
function getUserPosition() {
  if (navigator.geolocation)
    navigator.geolocation.getCurrentPosition(userPosition);
}
