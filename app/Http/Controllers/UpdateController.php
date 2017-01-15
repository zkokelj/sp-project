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

class UpdateController extends Controller
{
  /**
   *  addcar2user function is called when user tries to add new car.
   */
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

  /**
   *  addconsumption function is called when user tries to add consumption to one of his/her cars.
   */
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


  /**
   *  updateName function is called when user tries to change his name
   */
  public function updateName(Request $request){
    $this->validate($request, [
       'editName' => 'required|min:1|max:25'
     ]);
     $input = $request->all();
     DB::statement("UPDATE users SET name = ? where id = ?", [$request['editName'], Auth::id()]);
     Log::info('User ' . Auth::id() . ' updated name');
     return redirect()->back();
  }

  /**
   *  index function is called when user wants to update password
   */
  public function updatePassword(Request $request){
    $this->validate($request, [
       'editPass1' => 'required|min:6|max:25',
       'editPass2' => 'required|min:6|max:25'
     ]);

     if($request['editPass1'] == $request['editPass2']){
        DB::statement("UPDATE users SET password = ? where id = ?", [bcrypt($request['editPass1']), Auth::id()]);
        Log::info('User ' . Auth::id() . ' updated password');
     }
      return redirect()->back();
  }

  /**
   *  index function is called when user tries to add a comment.
   */
  public function addComment(Request $request){
    $this->validate($request, [
       'comment' => 'required|min:1|max:800',
       'button' => 'required|numeric'
     ]);
    $input = $request->all();
    $DB_values['comment'] = $input['comment'];
    $DB_values['from_user'] = Auth::id();
    $DB_values['to_user'] = $input['button'];
    $DB_values['created_at'] = Carbon::now();
    Comment::create($DB_values);
    Log::info('User '. Auth::id() . ' commented user: ' . $input['button']);
    return redirect('comment');
  }

  public function deletecar(Request $request){
      $this->validate($request, [
         'car_id' => 'required|numeric|min:1',
      ]);
      $input = $request->all();
      $user_cars = UsrCar::where('user_id', '=', Auth::id())
              ->where('id', $input['car_id'])
             ->get();
      if($user_cars != '[]'){
        UsrCar::destroy($input['car_id']);
        Log::info("User " . Auth::user() . " deleted car with id: " . $input['car_id']);
      }else{
        Log::warning("User " . Auth::user() . " wanted to delete car without permissons car_id: " . $input['car_id']);
      }

      return redirect()->back();
  }
}
