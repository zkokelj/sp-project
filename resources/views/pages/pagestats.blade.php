@extends('layouts.master')

@section('content')
<h2 class="noDisplay">{{trans('lang.page_stats')}}</h2>
    <article class="siteStatistics">
      <h2>{{trans('lang.page_stats')}}</h2>

      <table class="statisticsTable" >
      <tr>
        <th>{{trans('lang.number_of_users')}}:</th>
        <td>{{$num_of_users}}</td>
      </tr>
      <tr>
        <th>{{trans('lang.number_of_km')}}:</th>
        <td>{{$num_of_km}} km</td>
      </tr>
      <tr>
        <th>{{trans('lang.fuel_consumed')}}:</th>
        <td>{{$liters}} l</td>
      </tr>
    </table>
    <br>
    <br>
    </article>
@endsection
