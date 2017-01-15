@extends('layouts.master')

@section('content')
<article class="myStats">
          <h2>{{trans('lang.my_stats')}}</h2>
        <table class="fuelInfoTable table" >
        <tr>
          <th>{{trans('lang.car')}}</th>
          <th>{{trans('lang.number_of_km')}}</th>
          <th>{{trans('lang.fuel_consumed')}}</th>
          <th>{{trans('lang.average_consumption')}}</th>
        </tr>



          @forelse($user_cars as $car)
            <tr>
              <td>{{$car->manufacturer->name}} {{$car->model}}</td>
              <td>{{$car->total_km}}</td>
              <td>{{$car->total_fuel}}</td>
              <td>{{$car->average_consumption}}</td>
            </tr>
          @empty
          <tr>
            <td colspan="4">{{trans('lang.you_no_cars')}}</td>

          </tr>
          @endforelse

      </table>
        </article>
        @if(isset($user_cars) && $user_cars != '[]')
        <article class="displyedData">
          <header><h2>{{trans('lang.add_consumption')}} </h2></header>
          <div class="displayedCar">
              <form class="" action="addconsumption" method="post" id="addconsumption">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>{{trans('lang.car')}}</th>
                  <th>{{trans('lang.number_of_km')}}</th>
                  <th>{{trans('lang.fuel_consumed')}}</th>
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
                  <button class="searchButton" type="submit">{{trans('lang.add_consumption')}}</button>
                </td>
                </tr>
              </table>
            </form>
          </div>
        </article>
        <article class="deleteCar">
          <header><h2>{{trans('lang.delete_car')}} </h2></header>
          <div class="deleteCar">
              <form class="" action="deletecar" method="post" id="deletecar">
                <table class="fuelInfoTable table" >
                <tr>
                  <th colspan="3">{{trans('lang.car')}}</th>

                  <th></th>
                </tr>
                <tr>
                  <td colspan="3" >
                    <select name="car_id" form="deletecar" style="width:80%">
                    @foreach ($user_cars as $car)
                      <option value="{{$car->id}}"> {{$car->manufacturer->name}} {{$car->model}} </option>
                    @endforeach
                  </select>
                </td>

                <td>
                  {{ csrf_field() }}
                  <button class="searchButton" type="submit">{{trans('lang.delete_car')}}</button>
                </td>
                </tr>
              </table>
            </form>
          </div>
        </article>
        @endif
        <article class="displyedData">
          <header><h2>{{trans('lang.add_car')}}</h2></header>
          <div class="newCar">
              <form class="" action="addcar2user" method="post" id="addcar2user">
                <table class="fuelInfoTable table" >
                <tr>
                  <th>{{trans('lang.manufacturer')}}</th>
                  <th>{{trans('lang.model')}}</th>
                  <th>{{trans('lang.year')}}</th>
                  <th>{{trans('lang.engine_size')}}</th>
                  <th>{{trans('lang.fuel')}}</th>
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
                    <option value="bencin" selected>{{trans('lang.benz')}}</option>
                    <option value="dizel">{{trans('lang.diesel')}}</option>
                  </select></td>
                </tr>
              </table>
              <div class="blueButton">
              <button class="searchButton" type="submit">{{trans('lang.add_car')}}</button>
              {{ csrf_field() }}
              </div>
            </form>
          </div>



        </article>
@endsection
