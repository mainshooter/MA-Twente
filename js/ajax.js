function loadItem(fileLocation) {
  // Ajax GET REQUEST
  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      // callBack(this);
      document.getElementById('content').innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", fileLocation, true);
  xhttp.send();
}
function passwordForgotRequest(email) {
  var xhttp = new XMLHttpRequest();
  console.log(email.value);
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('result').innerHTML = this.responseText;
    }
  };
  // contains te post values
  xhttp.open("POST", "ctrl/ctrl.user.php?user=forgot&email=" + email.value, true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send();
}
function updateUser(mail) {
  var voorletter = $("voorletter").value;
  var achternaam = $("achternaam").value;
  var geslacht = $("geslacht").value;
  var telefoonnummer_idtelefoonnummer = $("telefoonnummer_idtelefoonnummer").value;
  var afdeling_idafdeling = $("afdeling_idafdeling").value;
  var postParameters = "mail=" + mail + "&voorletter=" + voorletter + "&achternaam=" + achternaam + "&geslacht=" + geslacht + "&telefoonnummer_idtelefoonnummer=" + telefoonnummer_idtelefoonnummer + "&afdeling_idafdeling=" + afdeling_idafdeling;

  var xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById('result').innerHTML = this.responseText;
    }
  };
  // contains te post values
  xhttp.open("POST", "ctrl/ctrl.user.php?user=update", true);
  xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhttp.send(postParameters);
}
function $(element) {
  element = document.getElementById(element);
  return(element);
}
