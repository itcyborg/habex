<?php

namespace App\Http\Controllers;

use App\Scouting;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $scout->farmid = $request->farmid;
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
        if ($scout->save()) {
            NotificationController::newScouting($scout->id);
            return json_encode(['status' => true, 'msg' => 'Scouting information saved successfully']);
        } else {
            return json_encode(['status' => false, 'msg' => 'An error occurred saving the scouting information']);
        }
    }

    public function getScouting($id)
    {
        $scoutings=DB::table('scoutings')->where('farmid',$id)
            ->leftJoin('users','users.id','scoutings.authorisedBy')
            ->select('scoutings.*','users.email')
            ->get();
        return json_encode(['scoutings'=>$scoutings,'status'=>200]);
    }
}
