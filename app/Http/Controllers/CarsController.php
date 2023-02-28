<?php

namespace App\Http\Controllers;

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
            "cars"=>Cars::all()
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
    public function store(Request $request)
    {
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
}
