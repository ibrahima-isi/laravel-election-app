<?php

namespace App\Http\Controllers;

use App\Models\Programme;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProgrammeLikeController extends Controller
{
    public function like(Programme $programme)
    {
        $liker = Auth::user();
        $existingLike = $liker->likes()->find($programme->id);
//        dd($existingLike);
        if(!$existingLike){
            $liker->likes()->attach($programme);
            return view('programmes.programme', [
                'programmes'=> Programme::with([
                    'candidat',
                    'secteurs',
                    'likes',
                ])->get()])->with('success', 'Liked');
        }
        return view('programmes.programme', [
            'programmes'=> Programme::with([
                'candidat',
                'secteurs',
                'likes',
                ])->get()])->with('error', 'Vous avez deja aimé ce progamme');
    }

    public function unlike(Programme $programme)
    {
        $liker = Auth::user();
        $existingLike = $liker->likes()->find($programme->id);
        if ($existingLike){
            $liker->likes()->detach($programme);
        }
        $programmes = Programme::with([
           'candidat', 'secteurs', 'likes',
        ])->get();
        return view('programmes.programme', ['programmes'=>$programmes])->with('success', 'Liked');
    }
}
