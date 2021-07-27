<?php

namespace App\Http\Controllers\Application;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Models\City;

class StateController extends Controller
{
    // public function fetchDistrict(Request $request)
    // {
    //       // dd($fetch);
    //       $cities = City::where('state_id',$request->state_id)->get();
    //       //   dd( $universities->get()->toArray());
    //     //    dd($cities->count());
    //       $output='<option value="" selected>Select City Name</option>';
    //       if($cities->count()>0){
    //           foreach($cities as $citi)
    //           {
    //             //   $check=UniversityConsultant::where('university_id',$university->id)->where('consultant_id',auth()->user()->id)->first();
    //             //   if ($district) { 
    //               $output .= '<option value="'.$citi->state_id.'">'.$citi->name.'</option>';
    //         //   }
    //       }
    //   }else{
    //       $output='<option value="" selected>City Unavailable</option>';
    //   }
    //     //   echo $output;
    //       return response()->json($output,200);
    // }


}
