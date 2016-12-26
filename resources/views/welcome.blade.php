@extends('layouts.master')

@section('content')
<h2 class="noDisplay">Iskanje povprečne porabe avtomobila</h2>
      <article class="search">
          <h2>Iskanje povprečne porabe</h2>
          <div class="searchCriteria">
            <form class="searchForm" action="index.html" method="post">
              <table class="searchTable">
                <tr>
                  <td>Znamka:</td>
                  <td><select name="select">
                    <option value="value1" selected>Seat</option>
                    <option value="value2">Renault</option>
                    <option value="value3">Audi</option>
                  </select></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Model:</td>
                  <td><select name="select">
                    <option value="value1" selected>Ibiza</option>
                    <option value="value2">Clio</option>
                    <option value="value3">A4</option>
                  </select></td>
                  <td></td>
                  <td></td>
                </tr>
                <tr>
                  <td>Starost od:</td>
                  <td><select name="select">
                    <option value="value1" selected>2005</option>
                    <option value="value2">2006</option>
                    <option value="value3">2007</option>
                  </select></td>
                  <td> do: </td>
                  <td><select name="select">
                    <option value="value1" selected>2016</option>
                    <option value="value2">2015</option>
                    <option value="value3">2014</option>
                  </select></td>
                </tr>
                <tr>
                  <td>Gorivo: </td>
                  <td>  <select name="select">
                      <option value="value1" selected>2016</option>
                      <option value="value2">2015</option>
                      <option value="value3">2014</option>
                    </select></td>
                    <td></td>
                    <td></td>
                </tr>
                <tr>
                  <td>Prostorinina motorja od: </td>
                  <td><select name="select">
                    <option value="value1" selected>2016</option>
                    <option value="value2">2015</option>
                    <option value="value3">2014</option>
                  </select></td>
                  <td> do: </td>
                  <td><select name="select">
                    <option value="value1" selected>2016</option>
                    <option value="value2">2015</option>
                    <option value="value3">2014</option>
                  </select></td>
                </tr>
                <tr>
                  <td colspan="4">
                    <div class="blueButton">
                    <button class="searchButton" type="submit">Iskanje</button>
                    </div>
                  </td>
                </tr>
              </table>
            </form>
        </div>
        <div class="searchResultAverage">
          <table class="fuelInfoTable table">
            <tr>
              <th>Povprečna poraba za izbran tip avtomobila je:</th>
              <td id="averageFuelConsumptionSearch">/</td>
            </tr>
          </table>
        </div>
      </article>
@endsection
