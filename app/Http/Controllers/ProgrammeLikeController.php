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
        $liker->likes()->attach($programme);
//        $programmes = Programme::with([
//            'candidat', 'secteurs', 'likes',
//        ])->find($programme->id);
//        dd($programmes);
        return view('programmes.programme', [
            'programmes'=> Programme::with([
            'candidat', 'secteurs', 'likes',
        ])->find($programme->id)])->with('success', 'Liked');
    }

    public function unlike(Programme $programme)
    {
        $liker = Auth::user();
        $liker->likes()->detach($programme);
        $programmes = Programme::with([
           'candidat', 'secteurs', 'likes',
        ])->find($programme->id);
        return view('programmes.programme', ['programmes'=>$programmes])->with('success', 'Liked');
    }
}
