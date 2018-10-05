<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Farmers;
use App\Farm;
use Illuminate\Support\Facades\DB;

class StatisticsController extends Controller
{
    //
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
}
