<?php

namespace App\Http\Controllers;

use App\Http\Requests\createCandidatRequest;
use App\Models\Candidat;
use GuzzleHttp\Psr7\UploadedFile;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Can;

class CandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $candidats = Candidat::with('programmes')->paginate(1);
        return view('candidats.candidat', ['candidats' => $candidats]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $candidat = new Candidat();
        return view('candidats.add', ['candidat' => $candidat]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(createCandidatRequest $request)
    {
         $data = $request->validated();
            /** @var UploadedFile|null $image */
         $image = $request->validated('photo');
         if($image !== null && !$image->getError()){
             $data['photo'] = $image->store('candidat', 'public');
         }

        if($request->validated()){
            Candidat::create([
//                dd($data['photo']),
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'parti' => $request->input('parti'),
                'biographie' => $request->input('biographie'),
                'validation' => $request->input('validation'),
                'photo' => $data['photo'],
            ]);
        }

//        Candidat::create($request->validated());
//        dd($request->all());
        return to_route('candidat')->with('success', 'Candidat ajouté');
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
    public function edit(Candidat $candidat)
    {
        return view('candidats.edit', ['candidat'=>$candidat]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(createCandidatRequest $request, Candidat $candidat)
    {
        $data = $request->validated();
        /** @var UploadedFile|null $image */
        $image = $request->validated('photo');
        if($image !== null && !$image->getError()){
            $data['photo'] = $image->store('candidat', 'public');
        }
        if($request->validated()){
            $candidat->update([
                'nom' => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'parti' => $request->input('parti'),
                'biographie' => $request->input('biographie'),
                'validation' => $request->input('validation'),
                'photo' => $data['photo'],

            ]);
        }
        return to_route('candidat')->with('success', 'Modification reussi');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Candidat $candidat)
    {
        $candidat->delete();
        return to_route('candidat')->with('success', 'deleted successfully');
    }
}
