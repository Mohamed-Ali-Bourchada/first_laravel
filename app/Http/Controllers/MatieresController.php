<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Matiere; // Import the Matiere model

class MatieresController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $matieres = Matiere::with('epreuves')->paginate(10);
        return view('matiere',compact('matieres'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('insertMatiere'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|max:5', 
            'libelle' => 'required|regex:/^[a-zA-Z\s]+$/', 
            'coef' => 'required|numeric|min:1|max:5',
        ]);

        Matiere::create([
            'code' => $request->input('code'),
            'libelle' => $request->input('libelle'),
            'coef' => $request->input('coef'),
        ]);
        
        return redirect()->back()->with('success', 'Matiere created successfully!');
    }

 
    public function edit($id) 
    {
        // Find the Matiere by ID to edit
        $matiere = Matiere::findOrFail($id);

        // Return the edit view with the Matiere data
        return view('editMatiere', compact('matiere'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validate the incoming request data
        $request->validate([
            'code' => 'required|string|max:5',
            'libelle' => 'required|string|max:255',
            'coef' => 'required|numeric|min:1|max:5',
        ]);
        $matiere = Matiere::findOrFail($id);
        $matiere->update($request->all());
        return redirect()->route('matiere.index')->with('success', 'Matiere updated successfully!');
    }
   public function destroy($id)
{
    Matiere::findOrFail($id)->delete();
    return redirect()->route('matiere.index')->with('success', 'Matiere successfully deleted.');
}


}
