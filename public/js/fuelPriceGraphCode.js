function drawFuelPriceGraphs(){
  //request json data for diesel prices
  var request = new XMLHttpRequest();
  request.open("GET", "./data/ceneDizel.json");
  request.onreadystatechange = function () {
    if (request.readyState == 4) {
      drawPrices(JSON.parse(request.responseText), "priceDiesel", "Dizel");
    }
  }
  request.send();

  //request json data for benz95   prices
  var request2 = new XMLHttpRequest();
  request2.open("GET", "./data/ceneBenz.json");
  request2.onreadystatechange = function () {
    if (request2.readyState == 4) {
      drawPrices(JSON.parse(request2.responseText), "priceBenz95", "95 oktansko gorivo");
    }
  }
  request2.send();
}

window.onresize = drawFuelPriceGraphs;

function drawPrices(dieselData, elememt, canvasText){
  var c = document.getElementById(elememt);
  c.style.visibility = "visible";
  var ctx = c.getContext("2d");


  var parentOfCanvas = document.getElementById("FuelPricesID");
  if(parentOfCanvas != null){
    //console.log(parentOfCanvas.offsetWidth);
    ctx.canvas.width  = parentOfCanvas.offsetWidth;
    ctx.canvas.height = parentOfCanvas.offsetWidth*0.5; //heigth is half of width
  }

  var pointsY = dieselData['cene'];
  var pointsX = dieselData['datumi'];


  var canvasWidth = ctx.canvas.width*0.90;
  var canvasHeigth = ctx.canvas.height*0.90;
  var minValue = Math.min.apply(Math, pointsY);
  var maxValue = Math.max.apply(Math, pointsY);

  var unitHeigth = canvasHeigth/(maxValue-minValue) -100;
  var unitWidth = canvasWidth/pointsY.length;
  var offset = 20;
  ctx.font = '10pt Calibri';
  ctx.fillStyle = 'green';
  ctx.moveTo(0, (canvasHeigth-(pointsY[0]-minValue)*unitHeigth)+offset);
  ctx.lineTo(0, (canvasHeigth-(pointsY[0]-minValue)*unitHeigth)+offset);
  for(var i = 1; i < pointsY.length; i++){
    ctx.lineTo(i*unitWidth, (canvasHeigth-(pointsY[i]-minValue)*unitHeigth)+offset);
    ctx.fillText(pointsY[i], i*unitWidth, (canvasHeigth-(pointsY[i]-minValue)*unitHeigth)+offset);
    if(i % 3 == 0){
      ctx.font = '12pt Calibri';
      ctx.fillStyle = 'blue';
      ctx.fillText(pointsX[i], i*unitWidth, (canvasHeigth-(pointsY[i]-minValue)*unitHeigth-30)+offset);
    }
    ctx.font = '10pt Calibri';
    ctx.fillStyle = 'green';
  }
  ctx.stroke();
  ctx.font = '25pt Calibri';
  ctx.fillStyle = 'black';
  ctx.fillText(canvasText,10,50);
}



window.onload = function() {
 drawFuelPriceGraphs();
}