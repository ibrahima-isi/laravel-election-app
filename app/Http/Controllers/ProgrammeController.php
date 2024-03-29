<?php

namespace App\Http\Controllers;

use App\Http\Requests\createProgrammeRequest;
use App\Models\Programme;
use Illuminate\Http\Request;

class ProgrammeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Insertion manuelle d'un programme associer a un candidat:
//        Programme::create([
//           'titre' => 'Test',
//           'candidat_id' => 2,
//            'contenu' => 'lo',
//            'document' => 'jo',
//            'delais' => '2000/01/01',
//        ]);
//        $programme = Programme::find(1);
//        $programme = Programme::find(2);
//        $programme?->secteurs()->createMany([[
//            'libelle'=>'sante',
//            'couleur'=>'Rouge',
//            'icon'=> 'rg',
//        ]]);
//        dd($programme->secteurs());

        $programmes = Programme::with(['secteurs', 'candidat'])->get();
        return view('programmes.programme', ['programmes' => $programmes]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('programmes.add',[
            'programme' => new Programme(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createProgrammeRequest $request)
    {
        if($request->validated()){
            Programme::create([
                'titre' => $request->titre,
                'contenu' => $request->contenu,
                'document' => $request->document,
                'delais' => $request->delais,
                ]);
            return to_route('programme')->with('success', 'Programme Ajouté');
        }
        return to_route('addProgramme')->with('error', "echec d'ajout");

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
    public function edit(Programme $programme)
    {
        return view('programmes.edit', ['programme' => $programme]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createProgrammeRequest $request, Programme $programme)
    {
        if($request->validated()){
            $programme->titre = $request->input('titre');
            $programme->contenu = $request->input('contenu');
            $programme->document = $request->input('document');
            $programme->delais = $request->input('delais');
            $programme->save();
            return to_route('programme')->with('success', 'Programme updated successfully');
        }
        return to_route('programme')->with('error', 'Programme not updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Programme $programme)
    {
        $programme->delete();
        return to_route('programme')->with('success', 'deleted successfully');
    }
}
