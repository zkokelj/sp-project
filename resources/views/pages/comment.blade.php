@extends('layouts.master')

@section('content')
<h2 class="noDisplay">Iskanje po drugih uporabnikih</h2>
      <form class="searchUser" action="#" method="post">
        <label for="username">Uporaniško ime: </label> <input id="username" type="text" name="user" value="">
        <button type="submit" name="button">Išči</button>
      </form>
      <div class="resultUser">
        <h3>Uporabnik ChuckNorris ima v lasti:</h3>
        <table class="otherUserTable">
          <thead>
            <tr>
              <td>Avto</td>
              <td>Poraba</td>
            </tr>
          </thead>
          <tr>
            <td>Ford Mustang</td>
            <td>55 l/100km</td>
          </tr>
          <tr>
            <td>Trabant</td>
            <td>10 l/100km</td>
          </tr>
        </table>
        <form class="commentUser" action="index.html" method="post">
          <textarea name="name" rows="3" cols="40"></textarea>
          <br>
          <button type="submit" name="button">Komentiraj</button>
        </form>
        <br>
        <hr>
        <div class="rating">
          <form action="#.html" method="post">
            <p>Prosimo Vas, da cenite realnost uporabnikovih podatkov ter tako omogočite bolj realen izračun skupne
              povprečne porabe.(1=zelo nerealni podatki, 5=zelo realni podatki)</p>
            <input type="number" name="rateInput" value="3" min="1" max="5" step="1">
            <br>
            <button type="submit" name="button">Glasuj</button>
          </form>
        </div>
      </div>
@endsection
