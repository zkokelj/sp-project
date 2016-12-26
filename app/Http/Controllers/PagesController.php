<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

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
        return view('pages.consumption');
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

}
