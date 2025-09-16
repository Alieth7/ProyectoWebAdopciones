<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ControllerVistaTemplate extends Controller
{
    //
    public function metodoinicio(){
        return view('layouts.vistamenuadmi');
    }

}
