@extends('layouts.master')

@section('content')
<h2 class="noDisplay">Iskanje po drugih uporabnikih</h2>
      <form class="searchUser" action="searchForUsers" method="post">
        <label for="username">{{trans('lang.email')}} </label> <input id="username" type="text" name="user" value="">
        {{ csrf_field() }}
        <button type="submit" name="button">Išči</button>
      </form>

      @if(isset($result1) && $result1 != '[]')
      <h3>{{$owner}} {{trans('lang.user_owns')}} </h3>
      @forelse($result1 as $r)
        {{$r->manufacturer}} {{$r->model}} ( {{$r->fuel}} - {{$r->ccm}} ccm2)
        <br>
      @empty
       {{trans('lang.user_has_no_data')}}
      @endforelse
 -----------------
 <br>
 @if(isset($comments) && $comments != '[]')
 <h3>{{trans('lang.comments')}} </h3>
 @forelse($result1 as $r)
   {{$r->manufacturer}} {{$r->model}} ( {{$r->fuel}} - {{$r->ccm}} ccm2)
   <br>
 @empty
  {{trans('lang.user_has_no_data')}}
 @endforelse
@endif


      <div class="resultUser">

        <form class="commentUser" action="comment" method="post">
          <textarea name="name" rows="3" cols="40"></textarea>
          <br>
          <button type="submit" name="button">Komentiraj</button>
        </form>
        <br>
      </div>
      @endif
@endsection
