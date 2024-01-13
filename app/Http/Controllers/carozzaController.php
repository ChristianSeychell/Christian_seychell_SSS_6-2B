<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\manufacturer;
class carozzaController extends Controller
{

    public function index(){
        $manufacturers = manufacturer::orderBy("name")->pluck('name','id')->prepend('All manufacturers', '');
        if(request('manufacturer_id') == null){
            $cars = car::all();
        }else{
            $cars = car::where('manufacturer_id', request('manufacturer_id'))->get();
        }
        return  view('cars.index', compact('cars','manufacturers'));
    }

    public function create(){
        return view('cars.create');
    }

    public function show($id){
       $car = car::find($id);
       return view('cars.show',compact('car'));
    }
}
