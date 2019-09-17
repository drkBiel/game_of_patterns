<?php

namespace App\Http\Controllers;
use app\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PagesController extends Controller{
    
    public function index(){
        return view('login');
    }

    public function responderQuiz(){
        return view('responder');
    }

}
