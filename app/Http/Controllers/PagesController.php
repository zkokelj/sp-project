<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use View;
use App\CarManufacturer;
use App\UsrCar;
use App\User;
use App\Consumption;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Lang;
use Log;


class PagesController extends Controller
{
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
      $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
      Log::info("User: " . $user_id . " added new car!");
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


      $user_id = (Auth::id() == "" ? 'NoUser' : Auth::id());
      if($user_cars != '[]'){
        //The car belongs to this user -> we can add consumption
        Consumption::create($input);
        Log::info("User: " . $user_id . " added consumption to: " . $user_cars);
        return redirect('/consumption');
      }else{
        Log::warning("User: " . $user_id . " cannot add consumption to car: " . $request['car_id'] );
        return "REDIRECT TO PAGE 404!";
      }
    }

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

    public function updateName(Request $request){
      $this->validate($request, [
         'editName' => 'required|min:1|max:25'
       ]);
       $input = $request->all();
       DB::statement("UPDATE users SET name = ? where id = ?", [$request['editName'], Auth::id()]);
       return redirect()->back();
    }

    public function updatePassword(Request $request){
      $this->validate($request, [
         'editPass1' => 'required|min:6|max:25',
         'editPass2' => 'required|min:6|max:25'
       ]);

       if($request['editPass1'] == $request['editPass2']){
          DB::statement("UPDATE users SET password = ? where id = ?", [bcrypt($request['editPass1']), Auth::id()]);
       }
        return redirect()->back();
    }

    public function searchForUsers(Request $request){
    /*  $this->validate($request, [
         'user' => 'required'
       ]);
       $input = $request->all();

       $result1 = DB::table('users')
             ->select('users.email as email', 'usr_cars.model as model', 'car_manufacturers.name as manufacturer', 'usr_cars.id as car_id')
             ->where('users.email', '=', $input['user'])
             ->leftJoin('usr_cars', 'users.id', '=', 'usr_cars.user_id')
             ->leftJoin('car_manufacturers', 'car_manufacturers.id', '=', 'usr_cars.manufacturer_id')
             ->get();
      return view('pages.comment', compact('result1'));
      return $result;
      */
      return 
    }

}
