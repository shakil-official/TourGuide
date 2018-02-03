<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;
use App\Division;

class DivisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $country  = Country::orderBy('id', 'DESC')->get();
      $division = Division::orderBy('id', 'DESC')->get();
      return response()->json(array('country'=> $country,'division'=> $division), 200);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function divisionCreate(Request $request)
    {
      $divisionCheck = '';


      $divisionName = $request['divisionName'];
      $countryName = $request['countryName'];
      $divisionCheck = Division::where('divisionName', $divisionName)->first();
      $countryCheck = Country::where('countryName', $countryName)->first()->id;


      if ($divisionCheck == '' ) {
        $division = new Division();
        $division->divisionName = ucfirst($divisionName);
        $division->country_id = $countryCheck;
        $division->save();
        //return redirect()->route('admin.division')->with('Success', 'Divisio updated!');
        return response()->json(["no" => "Update successfully completed"]);
      }else {
        return response()->json(["already" => "Already has this value"]);
      }


    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function getUpdateDivision($id)
    {
      $divisions = Division::findOrFail($id);
      $countryName = Country::select('countryName')->where('id',$divisions->country_id)->first();
      return response()->json(array('division'=> $divisions , "country" => $countryName), 200);
    }

    public function postUpdateDivision(Request $request)
    {
      $division_id = null;
      $message = "Successful";
      $division_id = Division::where('divisionName',$request['divisionName'])->first();

      if(empty($division_id)){
        $division = Division::find($request->input('div_id'));
        $division->divisionName =  ucfirst($request['divisionName']);
        $division->update();
        return response()->json(["no" => "Update successfully completed"]);
      }else{
        return response()->json(["already" => "Already has this value"]);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      try {
        $division = Division::findOrFail($id);
        $division->district()->delete();
        $division->delete();
        return response()->json(["delete" => "Successfully Delete "]);
      } catch (\Illuminate\Database\QueryException $e) {
          return response()->json(["exception" => $e->getCode()]);
      }
    }
}
