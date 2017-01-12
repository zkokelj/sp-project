@extends('layouts.master')

@section('content')
<script src="./js/code.js"></script>
<h2 class="noDisplay">{{trans('lang.cost_calculator')}}</h2>
        <article class="tripCostCalculator">
          <h2>{{trans('lang.cost_calculator')}}</h2>
          <form class="tripCostForm" action="tripCost.html" method="post">
            <table class="tripCostTable">
              <tr>
                <td><label for="distCalc">{{trans('lang.trip_distance')}}:</label></td>
                <td><input id="distCalc" type="number" name="distCalc" required="required" onchange="updatePrice();" min="0">km</td>
              </tr>
              <tr>
                <td><label for="usageCalc">{{trans('lang.consumption')}}:</label></td>
                <td><input id="usageCalc" type="number" step="0.1" name="usageCalc" required="required" onchange="updatePrice();" min="0">l/100km</td>
              </tr>
              <tr>
                <td >{{trans('lang.fuel')}}*:</td>
                <td><input type="radio" name="fuelType" value="diesel" id="diselCalc" required="required" onchange="updatePrice();">Dizel
                    <input type="radio" name="fuelType" value="benz" id="benzCalc" onchange="updatePrice();"> Bencin</td>
              </tr>
              <tr>
                <td colspan="2">
                  {{trans('lang.trip_cost_fp')}}
                </td>
              </tr>
            </table>
            <noscript>
              <button type="submit" name="button">{{trans('lang.calculate')}}</button>
            </noscript>
          </form>

          <div class="calculatorResult">
            <table class="table">
              <tr>
                <th><span>
                  {{trans('lang.total_trip_cost')}}:
                </span></th>
                <td>
                <span id="calcPrice">/</span></td>
              </tr>
            </table>
          </div>
        </article>
@endsection
