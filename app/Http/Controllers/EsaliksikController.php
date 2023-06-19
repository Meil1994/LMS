<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EsaliksikController extends Controller
{
    public function esaliksik(){
        return view('esaliksik.Esaliksik');
    }
}
