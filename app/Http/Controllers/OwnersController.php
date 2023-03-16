<?php

namespace App\Http\Controllers;


use App\Http\Requests\OwnersRequest;
use App\Models\Owners;
use Illuminate\Http\Request;

class OwnersController extends Controller
{
   public function owners(){
       $owners = Owners::orderBy('name')->get();
       return view("owners.list", [
       "owners"=>$owners
       ]);
   }
    public function create(){
        return view("owners.create");
    }

    public function store(OwnersRequest $request){

       $owner=new Owners();
       $owner->name=$request->name;
       $owner->surname=$request->surname;
       $owner->save();

       return redirect()->route("owners.list");
    }

    public function update($id){
       $owner=Owners::find($id);
       return view("owners.update", [
           "owner"=>$owner
       ]);
    }

    public function save(Request $request, $id){
        $owner=Owners::find($id);
        $owner->name=$request->name;
        $owner->surname=$request->surname;
        $owner->save();
        return redirect()->route("owners.list");
    }

    public function delete($id){
       Owners::destroy($id);
        return redirect()->route("owners.list");

    }

    public function search(Request $request){
//      $ownerCars=Owners::with('cars')->where('name', 'LIKE', "%$request->name%")->get();
        $search = explode(' ', $request->input('search'));

        $owners = Owners::where(function ($query) use ($search) {
            foreach ($search as $s) {
                $query->orWhere('name', 'LIKE', "%$s%")
                    ->orWhere('surname', 'LIKE', "%$s%");
            }
        })->orderBy('name')->get();

        return view("owners.list", [
            "owners"=>$owners
            ]);
   }

    public function forget(Request $request){
        $request->session()->forget('name');
        $request->session()->forget('surname');

        return redirect()->route('owners.list');

    }
}
