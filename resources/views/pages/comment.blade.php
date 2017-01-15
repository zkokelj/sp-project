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
 -------------------------------------------------------------------
 <br>
 @if(isset($user))

 <p>
   @foreach($user->getComments as $com)
   <p>
     {{$com->comment}}
   </p>
   {{trans('lang.from_comment')}} {{$com->from_user}}
   <br>
   -------------------------------------------------------------------
 </p>

 @endforeach
@endif

      <div class="resultUser">

        <form class="commentUser" action="addComment" method="post">
          <textarea name="comment" rows="3" cols="40"></textarea>
          <br>
          {{ csrf_field() }}
          <button type="submit" name="button" value="{{$user->id}}">Komentiraj</button>
        </form>
        <br>
      </div>
      @endif
@endsection
