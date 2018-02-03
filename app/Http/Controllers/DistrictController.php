<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;
use App\District;
use App\Place;
class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $district = District::orderBy('id', 'DESC')->get();
      $division = Division::orderBy('id', 'DESC')->get();
      return response()->json(array('district'=> $district,'division'=> $division), 200);
    //  return View('admin.district',['division' => $division ,'district' => $district]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function districtCreate(Request $request)
    {

      $districtCheck = '';

      $districtName = $request['districtName'];
      $divisionName = $request['division_name'];


      $districtCheck = District::where('districtName', $districtName)->first();
      $divisionId = Division::where('divisionName', $divisionName)->first()->id;



      if ( !empty ($districtCheck ) ) {
      //  return redirect()->route('admin.district')->with('Success', 'is Empty');
        return response()->json(["already" => "Already has this value"]);
      } else {
        $district = new District();
        $district->districtName = $districtName;
        $district->division_id = $divisionId;
        $district->save();
      //  return redirect()->route('admin.district')->with('Success', 'Divisio updated!');
            return response()->json(["no" => "Update successfully completed"]);

      }



    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

    }

    public function postUpdateDistruct(Request $request)
    {
      $District_id = null;
      $message = "Successful";
      $District_id = District::where('districtName',$request['DistrictName'])->first();

      if(empty($District_id)){
        $district = District::find($request->input('idofDistrict'));
        $district->districtName =  ucfirst($request['DistrictName']);
        $district->update();
        return response()->json(["no" => "Update successfully completed"]);
      }else{
          return response()->json(["already" => "Already has this value"]);
        }
    }


    public function getUpdateDistrict($id)
    {
      $district = District::findOrFail($id);
        return response()->json(array('district'=> $district), 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      //return response()->json(["exception" => $id]);
      try {
        $district = District::findOrFail($id);
        $district->place()->delete();
        $district->delete();
        return response()->json(["delete" => "Successfully Delete "]);
      } catch (\Illuminate\Database\QueryException $e) {
          return response()->json(["exception" => $e->getCode()]);
      }
    }
}
