<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;
use App\CarManufacturer;
use App\UsrCar;
use App\User;
use App\Comment;
use App\Consumption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Lang;
use Log;


class PagesController extends Controller
{
    /**
     *  index function is called when we try to access '/'. It returns page.index view
     */
    public function index(){
      if(View::exists('pages.index')){
        $carm = CarManufacturer::all();
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: index");
        return view('pages.index', compact('carm'));
      }else{
        Log::critical("pages.index view not available");
        return 'No view available.';
      }
    }

    /**
     *  calculator function is called when we try to access '/calculator'. It returns page.calculator view
     */
    public function calculator(){
      if(View::exists('pages.calculator')){
        return view('pages.calculator');
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: calculator");
      }else{
        Log::critical("pages.calculator view not available");
        return 'No view available.';
      }
    }

    /**
     *  fuelprice function is called when we try to access '/fuelprice'. It returns page.fuelprice view
     */
    public function fuelprice(){
      if(View::exists('pages.fuelprice')){
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: fuelprice");
        return view('pages.fuelprice');
      }else{
        Log::critical("pages.fuelprices view not available");
        return 'No view available.';
      }
    }

    /**
     *  pagestats function is called when we try to access '/pagestats'. It returns page.pagestats view
     */
    public function pagestats(){
      if(View::exists('pages.pagestats')){
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: pagestats");


        $num_of_users = User::count();
        $num_of_km = Consumption::where('car_id', '!=', '0')->sum('kilometers');
        $liters = Consumption::where('car_id', '!=', '0')->sum('liters');
        return view('pages.pagestats', compact('num_of_users', 'num_of_km', 'liters'));

      }else{
        Log::critical("pages.pagestats view not available");
        return 'No view available.';
      }
    }

    /**
     *  editprofile function is called when we try to edit profile. It returns page.editprofile view
     */
    public function editProfile(){
      if(View::exists('pages.editProfile')){
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: editProfile");
        return view('pages.editProfile');
      }else{
        Log::critical("pages.editProfile view not available");
        return 'No view available.';
      }
    }

    /**
     *  consumption function is called when we try to access '/consumption'. It returns page.consumption view
     *  with all neccessary variables..
     */
    public function consumption(){
      if(View::exists('pages.consumption')){
        $carm = CarManufacturer::all();
        $id = Auth::id();
        $user_cars = UsrCar::where('user_id', '=', $id)
                ->orderBy('id', 'desc')
               ->get();

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

        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: consumption");
        return view('pages.consumption', compact('id', 'carm', 'user_cars'));
      }else{
        Log::critical("pages.consumption view not available");
        return 'No view available.';
      }
    }

    /**
     *  comment function is called when we try to access '/comment'. It returns page.comment view
     */
    public function comment(){
      if(View::exists('pages.comment')){
        $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
        Log::info("User: " . $user_id . " visited page: comment");
        return view('pages.comment');
      }else{
        Log::critical("pages.comment view not available");
        return 'No view available.';
      }
    }

    /**
     *  searchForUsers function is called when we try search for users.
     */
    public function searchForUsers(Request $request){
      $this->validate($request, [
         'user' => 'required'
       ]);
       $input = $request->all();

       $result1 = DB::table('users')
             ->select('users.email as email', 'usr_cars.model as model', 'car_manufacturers.name as manufacturer', 'usr_cars.id as car_id', 'usr_cars.fuel as fuel', 'usr_cars.ccm as ccm')
             ->where('users.email', '=', $input['user'])
             ->leftJoin('usr_cars', 'users.id', '=', 'usr_cars.user_id')
             ->leftJoin('car_manufacturers', 'car_manufacturers.id', '=', 'usr_cars.manufacturer_id')
             ->get();

      $owner = $request['user'];
      $user = User::where('email', '=', $owner)->first();

      $test2 = User::where('id', '=', Auth::id())->get();

      //dd($test2);
      return view('pages.comment', compact('result1', 'owner', 'test2', 'user'));

    }

    /**
     *  searchConsumption function is called when we try to access '/'. It returns page.index view
     */
    public function searchConsumption(Request $request){
      $input = $request->all();
      //TODO: validate input

      //return $request->all();

      $fuel_consumed = DB::table('consumptions')
            ->select('consumptions.liters','consumptions.kilometers','usr_cars.model', 'usr_cars.ccm', 'usr_cars.fuel', 'car_manufacturers.id')
            ->where('usr_cars.model', '=', $input['model'])
            ->where('car_manufacturers.id', '=', $input['manufacturer'])
            ->where('usr_cars.fuel', '=', $input['fuel'])
            ->whereBetween('usr_cars.ccm', [$input['od'], $input['do']])
            ->leftJoin('usr_cars', 'consumptions.car_id', '=', 'usr_cars.id')
            ->leftJoin('car_manufacturers', 'car_manufacturers.id', '=', 'usr_cars.manufacturer_id')
            ->sum('consumptions.liters');

      $kilometers = DB::table('consumptions')
            ->select('consumptions.liters','consumptions.kilometers','usr_cars.model', 'usr_cars.ccm', 'usr_cars.fuel', 'car_manufacturers.id')
            ->where('usr_cars.model', '=', $input['model'])
            ->where('car_manufacturers.id', '=', $input['manufacturer'])
            ->where('usr_cars.fuel', '=', $input['fuel'])
            ->whereBetween('usr_cars.ccm', [$input['od'], $input['do']])
            ->leftJoin('usr_cars', 'consumptions.car_id', '=', 'usr_cars.id')
            ->leftJoin('car_manufacturers', 'car_manufacturers.id', '=', 'usr_cars.manufacturer_id')
            ->sum('consumptions.kilometers');
      $average_consumption = 0;
      if($kilometers > 0 && $fuel_consumed > 0){
        $average_consumption =  $fuel_consumed/($kilometers/100);
      }


      $carm = CarManufacturer::all();
      $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
      Log::info("User: " . $user_id . " searched for consumption.");
      return view('pages.index', compact('carm', 'average_consumption'));
    }

}
