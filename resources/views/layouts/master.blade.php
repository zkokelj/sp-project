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
              <li><a href="{{ url('/') }}">Domov</a></li>
              <li><a href="{{ url('/calculator') }}">Kalkulator</a></li>
              <li><a href="{{ url('/fuelprice') }}">Cena goriva</a></li>
              <li><a href="{{ url('/pagestats') }}">Statistika strani</a></li>
          @else
            <li><a href="{{ url('/') }}">Domov</a></li>
            <li><a href="{{ url('/calculator') }}">Kalkulator</a></li>
            <li><a href="{{ url('/consumption') }}">Poraba</a></li>
            <li><a href="{{ url('/fuelprice') }}">Cena goriva</a></li>
            <li><a href="{{ url('/comment') }}">Komentiraj</a></li>
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
        <!--<form class="" action="changelanguage" method="post" style="text-align: center;">
          <select class="" name="lang">
              <option value="en">English</option>
              <option value="si">Slovene</option>
          </select>
          {{ csrf_field() }}
          <button type="submit" name="button">Change language</button>
        </form> -->





        <aside class="topSidebar">
            @if (Auth::guest())
              <h2> Prijava </h2>
              <a href="{{ url('/login') }}">Prijava</a>
              <p>ali</p>
              <h2>Registracija</h2>
              <a href="{{ url('/register') }}">Registracija</a>
            @else
              <h2> Moj profil </h2>
                <table class="loginFormTable">
                  <tr>
                    <td>Ime: </td>
                    <td>{{Auth::user()->name}}</td>
                  </tr>
                  <tr>
                    <td>Email: </td>
                    <td>{{Auth::user()->email}}</td>
                  </tr>
                </table>
                <br>
                <a href="{{ url('/editProfile') }}">Uredi profil</a>
                <br>
                <a href="{{ url('/logout') }}"
                    onclick="event.preventDefault();
                             document.getElementById('logout-form').submit();">
                    Odjava
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
      Copyright (c) 2016 Žiga Kokelj All Rights Reserved.
    </footer>
  </body>
</html>
