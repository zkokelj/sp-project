@extends('layouts.master')

@section('content')
<h2 class="noDisplay">{{trans('lang.average_consumption_search')}}</h2>
      <article class="search">
          <h2>{{trans('lang.average_consumption_search')}}</h2>
          <div class="searchCriteria">
            <form class="searchForm" action="searchConsumption" method="post">
              <table class="searchTable">
                <tr>
                  <td>{{trans('lang.manufacturer')}}:</td>
                  <td><select name="select">
                    @foreach($carm as $m)
                      <option value="{{$m->id}}">{{$m->name}}</option>
                    @endforeach

                  </select></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>{{trans('lang.model')}}:</td>
                  <td><input type="text" name="model" value=""></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>{{trans('lang.fuel')}}: </td>
                  <td>  <select name="select">
                      <option value="bencin" selected>Bencin</option>
                      <option value="dizel">Dizel</option>
                    </select></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td>{{trans('lang.engine_size')}}: </td>
                  <td><select name="od">
                    <option value="0.5" >0.5</option>
                    <option value="0.8" >0.8</option>
                    <option value="1.0" >1.0</option>
                    <option value="1.2" >1.2</option>
                    <option value="1.4" selected>1.4</option>
                    <option value="1.6" >1.6</option>
                    <option value="1.8" >1.8</option>
                    <option value="2.0" >2.0</option>
                    <option value="2.5" >2.5</option>
                    <option value="3.0" >3.0</option>
                    <option value="3.5" >3.5</option>
                    <option value="4.0" >4.0</option>
                    <option value="4.5" >4.5</option>
                  </select></td>
                  <td> {{trans('lang.to')}}: </td>
                  <td><select name="do">
                    <option value="0.5" >0.5</option>
                    <option value="0.8" >0.8</option>
                    <option value="1.0" >1.0</option>
                    <option value="1.2" >1.2</option>
                    <option value="1.4" >1.4</option>
                    <option value="1.6" selected>1.6</option>
                    <option value="1.8" >1.8</option>
                    <option value="2.0" >2.0</option>
                    <option value="2.5" >2.5</option>
                    <option value="3.0" >3.0</option>
                    <option value="3.5" >3.5</option>
                    <option value="4.0" >4.0</option>
                    <option value="4.5" >4.5</option>
                  </select></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <div class="blueButton">
                    <button class="searchButton" type="submit">{{trans('lang.search')}}</button>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
        </div>
        <div class="searchResultAverage">
          <table class="fuelInfoTable table">
            <tr>
              <th>{{trans('lang.averege_consumption_is')}}:</th>
              <td id="averageFuelConsumptionSearch">/</td>
            </tr>
          </table>
        </div>
      </article>
@endsection
