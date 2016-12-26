@extends('layouts.master')

@section('content')
<h2 class="noDisplay">Kalkulator stroškov</h2>
        <article class="tripCostCalculator">
          <h2>Kalkulator stroškov</h2>
          <form class="tripCostForm" action="tripCost.html" method="post">
            <table class="tripCostTable">
              <tr>
                <td><label for="distCalc">Dolžina poti:</label></td>
                <td><input id="distCalc" type="number" name="distCalc" required="required" onchange="updatePrice();" min="0">km</td>
              </tr>
              <tr>
                <td><label for="usageCalc">Poraba:</label></td>
                <td><input id="usageCalc" type="number" step="0.1" name="usageCalc" required="required" onchange="updatePrice();" min="0">l/100km</td>
              </tr>
              <tr>
                <td >Tip goriva*:</td>
                <td><input type="radio" name="fuelType" value="diesel" id="diselCalc" required="required" onchange="updatePrice();">Dizel
                    <input type="radio" name="fuelType" value="benz" id="benzCalc" onchange="updatePrice();"> Bencin</td>
              </tr>
              <tr>
                <td colspan="2">
                  *cena potovanja bo izračunana glede na zadnje cene goriva.
                </td>
              </tr>
            </table>
            <noscript>
              <button type="submit" name="button">Izračunaj</button>
            </noscript>
          </form>

          <div class="calculatorResult">
            <table class="table">
              <tr>
                <th><span>
                  Cena vašega potovanja znaša:
                </span></th>
                <td>
                <span id="calcPrice">/</span></td>
              </tr>
            </table>
          </div>
        </article>
@endsection
