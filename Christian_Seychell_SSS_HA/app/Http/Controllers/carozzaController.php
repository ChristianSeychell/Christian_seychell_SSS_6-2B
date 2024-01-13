<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\car;
use App\Models\manufacturer;
class carozzaController extends Controller
{

    public function index(){
        $manufacturers = manufacturer::orderBy("name")->pluck('name','id')->prepend('select manufacturers', '');
        if(request('manufacturer_id') == null){
            $cars = car::all();
        }else{
            $cars = car::where('manufacturer_id', request('manufacturer_id'))->get();
        }
        return  view('cars.index', compact('cars','manufacturers'));
    }

    public function create(){
        $car = new car();
        $manufacturers = manufacturer::orderBy('name')->pluck('name','id')->prepend('Select manufacturers','');
        return view ('cars.create', compact('manufacturers' ,'car'));

    }

    public function show($id){
       $car = car::find($id);
       return view('cars.show',compact('car'));
    }

    public function store(Request $request){
        $request->validate([
            'model'=> 'required',
            'year'=> 'required',
            'salesperson_email' =>'required|email',
            'manufacturer_id'=> 'required||exists:manufacturers,id'
        ],[
            'model.required'=> 'Please specify model',
            'year.required'=> 'please specify year',
            'salesperson_email.required' =>'please specify email',
            'salesperson_email.email' =>'please specify email',
            'manufacturer_id.required'=> 'please specify manufacturer id'
        ]);
        car::create($request->all());
        return redirect()->route('cars.index')->with('message','Car added!');
    }

    public function edit($id, request $request){
        $car = car::find($id);
        $manufacturers = manufacturer::orderBy('name')->pluck('name','id')->prepend('Select manufacturers','');
        return view ('cars.edit', compact('manufacturers' ,'car'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'model'=> 'required',
            'year'=> 'required',
            'salesperson_email' =>'required|email',
            'manufacturer_id'=> 'required||exists:manufacturers,id'
        ],[
            'model.required'=> 'Please specify model',
            'year.required'=> 'please specify year',
            'salesperson_email.required' =>'please specify email',
            'salesperson_email.email' =>'please specify email',
            'manufacturer_id.required'=> 'please specify manufacturer id'
        ]);

        $car = car::find($id);
        $car->update($request->all());
        return redirect()->route('cars.index')->with('message','Car updated!');
    }

    public function destroy($id) {
        $car = Car::find($id);
            $car->delete();
            return redirect()->route('cars.index')->with('success', 'Car deleted successfully');
    }
}