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
