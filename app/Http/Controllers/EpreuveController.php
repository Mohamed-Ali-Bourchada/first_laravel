<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Epreuve;
use App\Models\Matiere; 

class EpreuveController extends Controller
{
    public function showEpreuve()
    {
        $epreuves = Epreuve::with('matiere')->paginate(10); // Adjust the number (10) as needed
        return view('epreuve')->with('epreuves', $epreuves);
    }

    public function create()
    {
        $matieres = Matiere::all(); // Fetch matieres for dropdown
        return view('insertEpreuve', compact('matieres')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'numero' => 'required|integer|max:9999|unique:epreuves,numero', // Ensure 'numero' is unique
            'date' => 'required|date|max:255',
            'lieu' => 'required|string|max:255', 
            'matiere_id' => 'required|exists:matiers,id', 
        ]);
    
        Epreuve::create([
            'numero' => $request->input('numero'),
            'date' => $request->input('date'),
            'lieu' => $request->input('lieu'),
            'matiere_id' => $request->input('matiere_id'),
        ]);
        
    return redirect()->back()->with('success', 'Epreuve created successfully!');
    } 

    // Display the libelle of the matiere for epreuve number
    public function showMatiereForEpreuve($numepreuve)
    {
        $epreuve = Epreuve::with('matiere')->where('numero', $numepreuve)->first();

        if ($epreuve && $epreuve->matiere) {
            return view('matiere_for_epreuve', [
                'libelle' => $epreuve->matiere->libelle,
                'message' => 'Matiere found for epreuve number ' . $numepreuve
            ]);
        }

        return view('matiere_for_epreuve', [
            'libelle' => null,
            'message' => 'Matiere not found for the given epreuve.',
            'epreuve_number' => $numepreuve
        ]);
    }
}
