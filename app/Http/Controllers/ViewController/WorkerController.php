<?php

namespace App\Http\Controllers\ViewController;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WorkerController extends Controller
{
    public function index(){

    }

    public function create(){
        return view('worker.create');
    }
}
