@extends('layouts.master')

@section('content')
<article class="myStats">
          <h2>Moja statistika</h2>

        <table class="fuelInfoTable table" >
        <tr>
          <th>Avtomobil</th>
          <th>Prevoženih kolometrov</th>
          <th>Porabljenega goriva</th>
          <th>Povprečna poraba</th>
        </tr>



          @foreach($user_cars as $car)
            <tr>
              <td>{{$car->manufacturer->name}} {{$car->model}}</td>
              <td>{{$car->total_km}}</td>
              <td>{{$car->total_fuel}}</td>
              <td>{{$car->average_consumption}}</td>
            </tr>
          @endforeach

      </table>
        </article>
        <article class="displyedData">
          <header><h2>Dodaj porabo </h2></header>
          <div class="displayedCar">
              <form class="" action="addconsumption" method="post" id="addconsumption">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>Avtomobil</th>
                  <th>Prevoženih kolometrov</th>
                  <th>Porabljenega goriva</th>
                  <th></th>
                </tr>
                <tr>
                  <td>
                    <select name="car_id" form="addconsumption">
                    @foreach ($user_cars as $car)
                      <option value="{{$car->id}}"> {{$car->manufacturer->name}} {{$car->model}} </option>
                    @endforeach
                  </select>
                </td>
                <td>
                  <input type="number" name="kilometers" value="0">
                </td>
                <td>
                  <input type="number" name="liters" value="0">
                </td>
                <td>
                  {{ csrf_field() }}
                  <button class="searchButton" type="submit">Dodaj porabo</button>
                </td>
                </tr>
              </table>
            </form>
          </div>
        </article>
        <article class="displyedData">
          <header><h2>Dodaj nov avtomobil</h2></header>
          <div class="newCar">
              <form class="" action="addcar2user" method="post" id="addcar2user">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>Znamka</th>
                  <th>Model</th>
                  <th>Letnik</th>
                  <th>Prostornina(ccm2)</th>
                  <th>Gorivo</th>
                </tr>
                <tr>
                  <td>

                    <select name="manufacturer_id" form="addcar2user">

                    @foreach ($carm as $m)
                      <option value="{{$m->id}}"> {{$m->name}} </option>

                    @endforeach
                  </select></td>
                  <td>
                    <input type="text" name="model" value="">
                  </td>
                  <td><input type="number" name="year" value="" min="1900" max="2017"></td>
                  <td><input type="number" name="ccm" value="" min="0" max="50" step="0.1"></td>
                  <td><select name="fuel">
                    <option value="bencin" selected>Bencin</option>
                    <option value="dizel">Dizel</option>
                  </select></td>
                </tr>
              </table>
              <div class="blueButton">
              <button class="searchButton" type="submit">Dodaj nov avtomobil</button>
              {{ csrf_field() }}
              </div>
            </form>
          </div>



        </article>
@endsection
