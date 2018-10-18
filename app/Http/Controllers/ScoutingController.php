<?php

namespace App\Http\Controllers;

use App\Scouting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ScoutingController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function add(Request $request)
    {
        $scout=new Scouting;
        $scout->died=$request->died;
        $scout->surviving=$request->surviving;
        $scout->statusOfTrees=$request->statusOfTrees;
        $scout->watering=$request->watering;
        $scout->fertilizerChemApp=json_encode($request->fertilizer);
        $scout->fertilizerAmountApp=$request->fertilizerAmount;
        $scout->fertilizerAppMeasurement=$request->fertilizerMeasure;
        $scout->pestDisease=$request->pestDisease.'1';
        $scout->intercropping=$request->intercropping;
        $scout->PH=$request->ph;
        $scout->EC=$request->ec;
        $scout->observationsNotes=$request->observation;
        $scout->assessmentDate=$request->assessmentDate;
        $scout->authorisedBy=0;
        dd($scout->save());
    }
}
