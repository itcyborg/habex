<?php

namespace App\Http\Controllers;

use App\Scouting;
use Illuminate\Http\Request;
use App\Farmers;
use App\Farm;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    public function farmersPerCounty()
    {
    	$farmers=DB::table('farmers')
            ->join('farms','farmers.id','farms.farmer_id')
            ->get();
    	$countystatistics=[];
        foreach ($farmers as $farmer=>$value) {
            if(key_exists($value->county,$countystatistics)){
                $countystatistics[$value->county]++;
            }else {
                $countystatistics[$value->county] = 1;
            }
    	}
    	arsort($countystatistics);
        $countystatistics=array_slice($countystatistics,0,6);
        return json_encode($countystatistics);
    }

    public function acreageByCounty()
    {
    	$farms=Farm::all();
    	$counties=[];
    	foreach ($farms as $farm => $value) {
    	    if(key_exists($value->county,$counties)){
    	        $counties[$value->county]=$counties[$value->county]+$value->farmSize;
            }else {
                $counties[$value->county] = $value->farmSize;
            }
    	}
    	arsort($counties);
    	$counties=array_slice($counties,0,6);
    	return json_encode($counties);
    }

    public function cropInfoChart()
    {
        $crops=Scouting::all();
        $farms=Farm::all();
        $surviving=$crops->sum('surviving');
        $died=$crops->sum('died');
        $issued=$farms->sum('seedlingsPlanted');
        $data=['Surviving Seedlings'=>$surviving,'Died Seedlings'=>$died,'Seedlings Issued'=>$issued];
        return json_encode($data);
    }

    public function cropInfoStats()
    {
        /**
         * seedlings issued
         * registered farmers
         * surviving seedlings
         * died seedlings
         * success
         */
        $crops=DB::table('farmers')
            ->join('farms','farmers.id','farms.farmer_id')
            ->leftJoin('scoutings','farms.id','scoutings.farmid')
            ->get();;
        $data=[];
        foreach ($crops as $crop=>$value) {
            if(key_exists($value->county,$data)){
                $data[$value->county]['registeredFarmers']++;
                $data[$value->county]['SeedlingsIssued']+=(int) $value->seedlingsPlanted;
                $data[$value->county]['SurvivingSeedlings']+=(int) $value->surviving;
                $data[$value->county]['DiedSeedlings']+=(int) $value->died;
                $data[$value->county]['Success']=($data[$value->county]['SurvivingSeedlings']/$data[$value->county]['SeedlingsIssued'])*100;
            }else{
                $data[$value->county]=[
                    'registeredFarmers'=>1,
                    'SeedlingsIssued'=>(int) $value->seedlingsPlanted,
                    'SurvivingSeedlings'=>(int) $value->surviving,
                    'DiedSeedlings'=>(int) $value->died,
                    'Success'=>($value->surviving/$value->seedlingsPlanted)*100
                    ];
            }
        }
        return json_encode($data);
    }
}
