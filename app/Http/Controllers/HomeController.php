<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Etudiant;
use App\Models\Realisation;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $Guillaume = Etudiant::where('id', '=', '1')->get();
        $toutesLesCompetences = Competence::all();
        $toutesLesRealisations = Realisation::all();

        return view('index')->with('Guillaume', $Guillaume)
                            ->with('toutesLesCompetences', $toutesLesCompetences)
                            ->with('toutesLesRealisations', $toutesLesRealisations);
    }
}
