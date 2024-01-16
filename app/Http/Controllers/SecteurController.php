<?php

namespace App\Http\Controllers;

use App\Http\Requests\createSecteurRequest;
use App\Models\Secteur;
use Illuminate\Http\Request;

class SecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $secteurs = Secteur::all();
        return view('secteurs.secteur', ['secteurs' => $secteurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('secteurs.add', [
            'secteur' => new Secteur(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createSecteurRequest $request)
    {
        if($request->validated()){
            Secteur::create([
               'libelle' => $request->libelle,
               'icon' => $request->icon,
               'couleur' => $request->couleur,
            ]);
        }
        return to_route('secteur')->with('success','Secteur ajouté');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Secteur $secteur)
    {
        return view('secteurs.edit', ['secteur'=>$secteur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createSecteurRequest $request, Secteur $secteur)
    {

        return to_route('secteur')->with('success', 'Modification reussie');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
