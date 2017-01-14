<?php

namespace App\Http\Controllers;


use App\Http\Controllers\Controller;
use App\Http\Requests;
use Config;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
/** LanguageController is responsible for swaping languages.
*   It contains switchLang function that sets applocale in session.
*/
class LanguageController extends Controller
{
  /** swithLang functon accepts parameter lang and switches language by
   *  setting applocale in session.
  */
  public function switchLang($lang)
  {
      //return $lang;
      if (array_key_exists($lang, Config::get('languages'))) {
          Session::set('applocale', $lang);
      }
      return Redirect::back();
  }
}
