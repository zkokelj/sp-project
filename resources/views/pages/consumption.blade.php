@extends('layouts.master')

@section('content')
<article class="myStats">
          <h2>Moja statistika</h2>
        <table class="fuelInfoTable table" >
        <tr>
          <th>Avtomobil</th>
          <th>Prevoženih kolometrov</th>
          <th>Povprečna poraba</th>
          <th>Cena za gorivo</th>
        </tr>
        <tr>
          <td><span id="car1">Ford Mustang</span></td>
          <td><span id="kilometers1">100</span>km</td>
          <td><span id="averagecon1">20</span>l/100km</td>
          <td><span id="totalfuelprice1">25</span>€</td>
        </tr>
        <tr>
          <td><span id="car2">Renault Clio</span></td>
          <td><span id="kilometers2">250</span>km</td>
          <td><span id="averagecon2">20</span>l/100km</td>
          <td><span id="totalfuelprice2">23</span>€</td>
        </tr>
      </table>
        </article>
        <article class="displyedData">
          <header><h2>Dodaj porabo </h2></header>
          <div class="displayedCar">
              <form class="" action="index.html" method="post">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>Avtomobil</th>
                  <th>Prevoženih kolometrov</th>
                  <th>Porabljenega goriva</th>
                  <th></th>
                </tr>
                <tr>
                  <td>Ford Mustang</td>
                  <td><input class="addKilometers" name="addKilometers"  type="number" min="0" /></td>
                  <td><input class="addLiters" name="addLiters"  type="number" min="0" /></td>
                  <td><button type="button" name="button">Potrdi</button></td>
                </tr>
                <tr>
                  <td>Renault Clio</td>
                  <td><input class="addKilometers" name="addKilometers"  type="number" min="0" /></td>
                  <td><input class="addLiters" name="addLiters"  type="number" min="0" /></td>
                  <td><button type="button" name="button">Potrdi</button></td>
                </tr>
              </table>
            </form>
          </div>
        </article>
        <article class="displyedData">
          <header><h2>Dodaj nov avtomobil</h2></header>
          <div class="newCar">
              <form class="" action="index.html" method="post">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>Znamka</th>
                  <th>Model</th>
                  <th>Letnik</th>
                  <th>Prostornina(ccm2)</th>
                  <th>Gorivo</th>
                </tr>
                <tr>
                  <td><select name="select">
                    <option value="value1" selected>Seat</option>
                    <option value="value2">Renault</option>
                    <option value="value3">Audi</option>
                  </select></td>
                  <td><select name="select">
                    <option value="value1" selected>Ibiza</option>
                    <option value="value2">Clio</option>
                    <option value="value3">R8</option>
                  </select></td>
                  <td><input type="number" name="letnik" value="" min="1900" max="2017"></td>
                  <td><input type="number" name="prostornina" value="" min="0" max="50" step="0.1"></td>
                  <td><select name="select">
                    <option value="value1" selected>Bencin</option>
                    <option value="value2">95 oktanski bencin</option>
                    <option value="value3">100 oktanski bencin</option>
                  </select></td>
                </tr>
              </table>
              <div class="blueButton">
              <button class="searchButton" type="submit">Dodaj nov avtomobil</button>
              </div>
            </form>
          </div>
        </article>
@endsection
