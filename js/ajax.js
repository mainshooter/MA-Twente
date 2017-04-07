function loadItem(fileLocation) {
  // Ajax GET REQUEST
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      callBack(this);
    }
  };
  xhttp.open("GET", fileLocation, true);
  xhttp.send();
}
