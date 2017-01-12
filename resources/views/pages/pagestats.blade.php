@extends('layouts.master')

@section('content')
<h2 class="noDisplay">{{trans('lang.page_stats')}}</h2>
    <article class="siteStatistics">
      <h2>{{trans('lang.page_stats')}}</h2>
      <table class="statisticsTable" >
      <tr>
        <th>{{trans('lang.number_of_users')}}:</th>
        <td>5</td>
      </tr>
      <tr>
        <th>{{trans('lang.number_of_km')}}:</th>
        <td>500.000</td>
      </tr>
      <tr>
        <th>{{trans('lang.fuel_consumed')}}:</th>
        <td>180 l</td>
      </tr>
      <tr>
        <th>{{trans('lang.fuel_price')}}:</th>
        <td>250 €</td>
      </tr>
    </table>
    <br>
    <br>
    </article>
@endsection
