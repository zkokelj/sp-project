@extends('layouts.master')

@section('content')
<h2 class="noDisplay">Cene goriv</h2>
      <article class="FuelPrices" onresize="drawFuelPriceGraphs();">
        <h2>Cene goriva</h2>
        <table id="FuelPricesID" class="fuelInfoTable table" >
        <tr>
          <th>Dizel</th>
          <th>95 oktanski</th>
        </tr>
        <tr>
          <td>1.1€</td>
          <td>1.2€</td>
        </tr>
      </table>
      <canvas id="priceDiesel" width="0" height="0" style="border:1px solid #000000;">
      </canvas>
      <canvas id="priceBenz95" width="0" height="0" style="border:1px solid #000000;"> </canvas>
      <noscript>
        <img src="./data/diselPlot.jpg" alt="Cena dizelskega goriva">
        <br>
        <img src="./data/benzPlot.jpg" alt="Cena 95 okranskega goriva">
      </noscript>
      </article>
      <script src="./js/fuelPriceGraphCode.js"></script>
@endsection
