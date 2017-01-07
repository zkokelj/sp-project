function updatePrice(){
  var dist = document.getElementById("distCalc").value;
  var usage = document.getElementById("usageCalc").value;
  if(dist != null && usage != null  && dist != "" && usage != "" && dist > 0 && usage >0){
    if(document.getElementById('diselCalc').checked) {
      var request = new XMLHttpRequest();
      request.open("GET", "./data/ceneDizel.json");
      request.onreadystatechange = function () {
        if (request.readyState == 4) {
          calculateAndWritePrice(JSON.parse(request.responseText), dist, usage);
        }
      }
      request.send();
    }else if(document.getElementById('benzCalc').checked) {
      var request = new XMLHttpRequest();
      request.open("GET", "./data/ceneBenz.json");
      request.onreadystatechange = function () {
        if (request.readyState == 4) {
          calculateAndWritePrice(JSON.parse(request.responseText), dist, usage);
        }
      }
      request.send();
    }
  }else{
    document.getElementById("calcPrice").innerHTML  = '/';
  }
}
function calculateAndWritePrice(data, dist, usage){

  //console.log(data['cene'][data['cene'].length-1]);
  document.getElementById("calcPrice").innerHTML  = (dist/100 * usage * data['cene'][data['cene'].length-1]).toFixed(2)+"€";

}

function checkPass(){
  var pass1 = document.getElementById("pass1").value;
  var pass2 = document.getElementById("pass2").value;
  console.log(pass1 == pass2);
  if(pass1 != pass2){
    document.getElementById("passDontMatch").innerHTML = "Gesli se ne ujemata";
  }else{
    document.getElementById("passDontMatch").innerHTML = "";
  }

}
