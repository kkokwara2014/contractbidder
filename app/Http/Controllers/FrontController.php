<?php

namespace App\Http\Controllers;

use App\Advert;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index(){
        $adverts=Advert::orderBy('created_at','desc')->paginate(10);
        return view('welcome',compact('adverts'));
    }
}
