<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css" type="text/css" />


    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Avtoporaba.com</title>
  </head>
  <body>
    <header>
      <div class="headerWrapper">
          <h1>avtoporaba.com</h1>
      </div>
      <nav class="topMenu">
        <ul>
          @if (Auth::guest())
              <li><a href="{{ url('/') }}">{{trans('lang.home')}}</a></li>
              <li><a href="{{ url('/calculator') }}">{{trans('lang.calculator')}}</a></li>
              <li><a href="{{ url('/fuelprice') }}">{{trans('lang.fuel_price')}}</a></li>
              <li><a href="{{ url('/pagestats') }}">{{trans('lang.stats')}}</a></li>
          @else
            <li><a href="{{ url('/') }}">{{trans('lang.home')}}</a></li>
            <li><a href="{{ url('/calculator') }}">{{trans('lang.calculator')}}</a></li>
            <li><a href="{{ url('/consumption') }}">{{trans('lang.consumption')}}</a></li>
            <li><a href="{{ url('/fuelprice') }}">{{trans('lang.fuel_price')}}</a></li>
            <li><a href="{{ url('/comment') }}">{{trans('lang.comment')}}</a></li>
          @endif
        </ul>
      </nav>

        <ul>
            @foreach (Config::get('languages') as $lang => $language)
                @if ($lang != App::getLocale())
                    <li style = "text-align: right; list-style-type: none; margin-right: 10%;">
                        <a href="{{ route('lang.switch', $lang) }}"><input width="20px" height="20px" type="image" src="{{$lang}}.png" /></a>
                    </li>
                @endif
            @endforeach
        </ul>

    </header>
    <div class="mainWrapper">
      <section class="mainContent">
        @yield('content')
      </section>

      <section class="sidebar">
        <h2 class="noDisplay">Profil</h2>
        <aside class="topSidebar">
            @if (Auth::guest())
              <h2> {{trans('lang.login')}} </h2>
              <a href="{{ url('/login') }}">{{trans('lang.login')}}</a>
              <p>{{trans('lang.or')}}</p>
              <h2>{{trans('lang.registration')}}</h2>
              <a href="{{ url('/register') }}">{{trans('lang.registration')}}</a>
            @else
              <h2> {{trans('lang.my_profile')}} </h2>
                <table class="loginFormTable">
                  <tr>
                    <td>{{trans('lang.name')}}: </td>
                    <td>{{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <td>{{trans('lang.email')}}: </td>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                </table>
                <br>
                <a href="{{ url('/editProfile') }}">{{trans('lang.edit_profile')}}</a>
                <br>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    {{trans('lang.logout')}}
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
                <br>
            @endif
        </aside>
      </section>
    </div>
    <footer class="footer">
      Copyright (c) 2016 Žiga Kokelj {{trans('lang.arr')}}
    </footer>
  </body>
</html>
