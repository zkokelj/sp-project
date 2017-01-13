@extends('layouts.master')

@section('content')
<h2 class="noDisplay">{{trans('lang.page_stats')}}</h2>
    <article class="siteStatistics">
      <h2>{{trans('lang.edit_profile')}}</h2>

      <table class="statisticsTable" >

        <tr>
          <th>{{trans('lang.email')}}:</th>
          <td>{{Auth::user()->email}}</td>
          <td></td>
        </tr>
        <tr>
      <tr>
        <th>{{trans('lang.name')}}:</th>
        <form class="" action="updateName" method="post">
        <td>
          <input type="text" name="editName" value="{{Auth::user()->name}}">
        </td>
        {{ csrf_field() }}
        <td><button type="submit" name="button">{{trans('lang.update')}}</button></td>
      </form>
      </tr>
        <th>{{trans('lang.password')}}:</th>
        <form class="" action="updatePassword" method="post">
        <td>
          <input type="password" name="editPass1" value="">
        </td>
        <td></td>
      </tr>
      <tr>
        <th>{{trans('lang.password_again')}}:</th>
        <td>
          <input type="password" name="editPass2" value="">
        </td>
        {{ csrf_field() }}
        <td><button type="submit" name="button">{{trans('lang.update')}}</button></td>
      </tr>
      </form>


    </table>
    <br>
    <br>
    </article>

    <!--    --------------->
@endsection
