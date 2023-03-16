<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarsRequest;
use App\Models\Cars;
use App\Models\Owners;
use Illuminate\Http\Request;

class CarsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("cars.index",[
            "cars"=>Cars::all(),
            "owners"=>Owners::all()
    ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
       return view("cars.create", [
          "owners"=>Owners::all()
       ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CarsRequest $request)
    {

//        $request->validate([
//            'reg_number'=>'required|regex:/^[A-Z]{3}[0-9]{3}$/',
//            'brand'=>'required|min:2|max:20',
//            'model'=>'required|min:2|max:20'
//        ], [
//            'reg_number'=>'Valstybinis numeris yra įvestas neteisingai, turi būti 3 didžiosios raidės ir 3 skaitmenys',
//            'brand'=>'Mašinos markė yra privaloma',
//            'model'=>'Mašinos modelis yra privalomas'
//
//        ]);

        Cars::create($request->all());
        return redirect()->route("cars.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(Cars $cars)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Cars $car)
    {
      return view("cars.edit", [
          "car"=>$car,
          "owners"=>Owners::all()
      ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Cars $car)
    {
        $car->fill($request->all());
        $car->save();
        return redirect()->route("cars.index");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Cars $car)
    {
        $car->delete();
        return redirect()->route("cars.index");
    }

    public function search(Request $request){
        $search = explode(' ', $request->input('search'));
        $cars = Cars::where(function ($query) use ($search) {
            foreach ($search as $s) {
                $query->orWhere('reg_number', 'LIKE', "%$s%")
                    ->orWhere('brand', 'LIKE', "%$s%")
                    ->orWhere('model', 'LIKE', "%$s%");
            }
        })->orderBy('brand')->get();

        return view("cars.index", [
            "cars"=>$cars,
            "owners"=>Owners::all()
        ]);
    }

    public function ownerName(Request $request) {

        $ownerName = explode(' ', $request->input('ownerName'));
       // dd($ownerName);
        $cars = Cars::where(function ($query) use ($ownerName) {
            foreach ($ownerName as $n) {
                $query->orWhere('owners_id', "$n");
            }
        })->get();

        return view("cars.index", [
            "cars"=>$cars,
            "owners"=>Owners::all()
        ]);
    }

    public function forget(Request $request){
        $request->session()->forget('reg_number');
        $request->session()->forget('brand');
        $request->session()->forget('model');
        $request->session()->forget('owners_id');

        return redirect()->route('cars.index');

    }
}
