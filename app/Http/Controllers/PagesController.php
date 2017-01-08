<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use App\CarManufacturer;
use App\UsrCar;
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
      $input = $request->all();

      $input['user_id'] = Auth::id();

      UsrCar::create($input);

      return redirect('/consumption');
    }

}
