<?php

namespace App\Http\Controllers;

use App\Http\Requests\createElecteurRequest;
use App\Models\Electeur;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;

class ElecteurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $electeurs = Electeur::all();
        return view('electeurs.electeur', ['electeurs' => $electeurs]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $electeur = new Electeur();
        return view('electeurs.add', ['electeur' => $electeur]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createElecteurRequest $request)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('photo');
        if($image !== null && !$image->getError()){
            $data['cni'] = $image->store('ElecteursID', 'public');
        }

        if($request->validated()){
            Electeur::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'CNI' => $data['cni'],
                'adresse' => $request->adresse,
            ]);
        }

        return to_route('electeur')->with('success', 'Electeur ajouté');
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
    public function edit(Electeur $electeur)
    {
        return view('electeurs.edit', ['electeur'=>$electeur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createElecteurRequest $request, Electeur $electeur)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('cni');
//        dd($image);
        if($image !== null && !$image->getError()){
            $data['cni'] = $image->store('Electeurs', 'public');
        }
        if($request->validated()){
            Electeur::create([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'CNI' => $data['cni'],
                'adresse' => $request->adresse,
            ]);
        }

        return to_route('electeur')->with('success', 'Electeur modifié');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
