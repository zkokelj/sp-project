@extends('layouts.master')

@section('content')
<h2 class="noDisplay">{{trans('lang.fuel_price')}}</h2>
      <article class="FuelPrices" onresize="drawFuelPriceGraphs();">
        <h2>{{trans('lang.fuel_price')}}</h2>
        <table id="FuelPricesID" class="fuelInfoTable table" ></table>
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
