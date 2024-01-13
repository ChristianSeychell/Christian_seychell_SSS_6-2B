<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\manufacturer;
class manufacturerController extends Controller
{
    public function index(){
        $manufacturers = manufacturer::all();
    return view('manufacturers.index', compact('manufacturers'));
    }


}
