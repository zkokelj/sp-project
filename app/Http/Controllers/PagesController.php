<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;
use App\CarManufacturer;
use App\UsrCar;
use App\Consumption;
use Illuminate\Support\Facades\Auth;


class PagesController extends Controller
{
    public function index(){
      if(View::exists('pages.index')){
        return view('pages.index');
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function calculator(){
      if(View::exists('pages.calculator')){
        return view('pages.calculator');
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function fuelprice(){
      if(View::exists('pages.fuelprice')){
        return view('pages.fuelprice');
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function pagestats(){
      if(View::exists('pages.pagestats')){
        return view('pages.pagestats');
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function consumption(){
      if(View::exists('pages.consumption')){
        $carm = CarManufacturer::all();
        $id = Auth::id();
        $user_cars = UsrCar::where('user_id', '=', $id)
                ->orderBy('id', 'desc')
            //   ->take(10)
               ->get();

      //  $user_cars =  UsrCar::all();
      //  return $user_cars;




        //return $id;
        //$manufacturer = UsrCar::find(1)->manufacturer;

        foreach ($user_cars as $car) {
          $car['manufacturer_name'] = $car->manufacturer->name;
          $car['total_km'] = Consumption::where('car_id', $car['id'])->sum('kilometers');
          $car['total_fuel'] = Consumption::where('car_id', $car['id'])->sum('liters');

          if($car['total_km'] > 0 && $car['total_fuel'] > 0){
            $car['average_consumption'] = round($car['total_fuel']/($car['total_km'] / 100),2);
          }else{
            $car['average_consumption'] = '\\';
          }
        }

        //return $user_cars;

        return view('pages.consumption', compact('id', 'carm', 'user_cars'));
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function comment(){
      if(View::exists('pages.comment')){
        return view('pages.comment');
        //->with('name', 'Ziga');
      }else{
        return 'No view available.';
      }
    }

    public function addcar2user(Request $request){
     $this->validate($request, [
        'model' => 'bail|required',
        'year' => 'bail|required|numeric|min:1900',
        'ccm' => 'bail|required|numeric|min:0',
        'fuel'=> 'bail|required|in:bencin,dizel'
      ]);

      $input = $request->all();

      $input['user_id'] = Auth::id();

      UsrCar::create($input);

      return redirect('/consumption');
    }

    public function addconsumption(Request $request){
      $this->validate($request, [
        'car_id' => 'bail|required|numeric',
        'liters' => 'bail|required|numeric|min:0',
        'kilometers' => 'bail|required|numeric|min:0'
      ]);


      $input = $request->all();

      $user_cars = UsrCar::where('user_id', '=', Auth::id())
              ->where('id', $input['car_id'])
              ->orderBy('id', 'desc')
             ->get();

      if($user_cars != '[]'){
        //We var belongs to this user -> we can add consumption
          Consumption::create($input);
          return redirect('/consumption');
        return $user_cars;
      }else{
        return "REDIRECT TO PAGE 404!";
      }
      return $user_cars;
    }

}
