<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Auto;

class AutoController extends Controller
{
    public function index(Request $request){
        $marche = Auto::all()->pluck("marca");

        if(empty($request->marca)){
            $autos = Auto::all();
        }else{
            $autos = Auto::where("marca",$request->marca)->get();
        }
        return view("home",compact("autos", "marche"));
    }

    public function show(int $id){
        $auto = Auto::find($id);
        return view("detail",compact("auto"));
    }

    public function destroy(int $id){
        Auto::destroy($id);
        return redirect()->back()->with("success","L'auto è stata eliminata");
    }

    public function edit(int $id){
        $auto = Auto::find($id);
        return view('edit', compact('auto'));
    }
    public function update(Request $request, int $id){
        $validated = $request->validate([
            "marca" => 'required|max:50',
            "modello" => 'required|max:255',
            'prezzo' => 'required|numeric|min:0',
        ],
        [
            'marca.required' => 'È obbligatorio inserire la marca',
            'marca.max'=> 'La marca non può essere più di 50 caratteri',
            'modello.required' => 'È obbligatorio inserire il modello',
            'modello.max'=> 'Il modello non può essere più di 255 caratteri',
            'prezzo.min' => 'Il prezzo deve essere un numero positivo'
        ]);

        Auto::find($id)->update($validated);

        return redirect()->route('home')->with('success',"Auto $request->marca è stata modificata");
    }

    public function store(Request $request){
        $validated = $request->validate([
            "marca" => 'required|max:50',
            "modello" => 'required|max:255',
            'prezzo' => 'required|numeric|min:0',
        ],
        [
            'marca.required' => 'È obbligatorio inserire la marca',
            'marca.max'=> 'La marca non può essere più di 50 caratteri',
            'modello.required' => 'È obbligatorio inserire il modello',
            'modello.max'=> 'Il modello non può essere più di 255 caratteri',
            'prezzo.min' => 'Il prezzo deve essere un numero positivo'
        ]);

        Auto::create($validated);

        return redirect()->route('home')->with('success',"Auto $request->marca è stata creata");
    }

}
