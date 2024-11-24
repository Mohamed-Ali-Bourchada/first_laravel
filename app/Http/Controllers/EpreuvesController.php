<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Matiere;

class EpreuvesController extends Controller
{
    /**
     * Display a listing of the epreuves with pagination.
     */
    public function index()
    {
        $epreuves = Epreuve::with('matiere')->paginate(10);
         // Adjust the number per page as needed
        return view('epreuve', compact('epreuves'));
    }

    /**
     * Show the form for creating a new epreuve.
     */
    public function create()
    {
        $matieres = Matiere::all(); // Fetch matieres for dropdown
        return view('insertEpreuve', compact('matieres'));
    }

    /**
     * Store a newly created epreuve in storage.
     */
    public function store(Request $request)
    {
  $request->validate([
    'numero' => 'required|integer|max:9999|unique:epreuves,numero',
    'date' => 'required|date',  // Validates that 'date' is a valid date
    'lieu' => 'required|string|max:255', // Ensures 'lieu' is a string with a maximum length of 255
    'matiere_id' => 'required|exists:matieres,id',  // Ensures that 'matiere_id' exists in the 'id' column of the 'matieres' table
]);


        Epreuve::create([
            'numero' => $request->input('numero'),
            'date' => $request->input('date'),
            'lieu' => $request->input('lieu'),
            'matiere_id' => $request->input('matiere_id'),
        ]);

        return redirect()->route('epreuve.index')->with('success', 'Epreuve created successfully!');
    }

    /**
     * Display the specified epreuve's details in a modal view for AJAX.
     */
    // public function show($id)
    // {
 
    // }

    /**
     * Show the form for editing the specified epreuve.
     */
    public function edit($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $matieres = Matiere::all(); // Fetch matieres for dropdown
        return view('editEpreuve', compact('epreuve', 'matieres'));
    }

    /**
     * Update the specified epreuve in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'numero' => 'required|integer|max:9999|unique:epreuves,numero,' . $id,
            'date' => 'required|date',
            'lieu' => 'required|string|max:255',
            'matiere_id' => 'required|exists:matieres,id',
        ]);

        $epreuve = Epreuve::findOrFail($id);
        $epreuve->update([
            'numero' => $request->input('numero'),
            'date' => $request->input('date'),
            'lieu' => $request->input('lieu'),
            'matiere_id' => $request->input('matiere_id'),
        ]);

        return redirect()->route('epreuve.index')->with('success', 'Epreuve updated successfully!');
    }

    /**
     * Remove the specified epreuve from storage.
     */
    public function destroy($id)
    {
        $epreuve = Epreuve::findOrFail($id);
        $epreuve->delete();

        return redirect()->route('epreuve.index')->with('success', 'Epreuve deleted successfully!');
    }

    /**
     * Show the matiere's libelle for a given epreuve by its numero.
     */
    // public function showMatiereForEpreuve($numepreuve)
    // {
    //     $epreuve = Epreuve::with('matiere')->where('numero', $numepreuve)->first();

    //     if ($epreuve && $epreuve->matiere) {
    //         return view('matiere_for_epreuve', [
    //             'libelle' => $epreuve->matiere->libelle,
    //             'message' => 'Matiere found for epreuve number ' . $numepreuve,
    //         ]);
    //     }

    //     return view('matiere_for_epreuve', [
    //         'libelle' => null,
    //         'message' => 'Matiere not found for the given epreuve.',
    //         'epreuve_number' => $numepreuve,
    //     ]);
    // }
}
