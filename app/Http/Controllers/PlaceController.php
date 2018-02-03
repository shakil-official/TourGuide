<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\District;

class PlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $district = District::orderBy('id', 'DESC')->get();
      $place = Place::orderBy('id', 'DESC')->get();
      return response()->json(array('Place'=> $place,'district'=> $district), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function placeCreate(Request $request)
    {
      $placeName = $request['PlaceName'];
      $districtName = $request['Place_division'];
      $placeCheck = Place::where('placeName',$placeName)->first();
      $districId = District::where('districtName', $districtName)->first()->id;

      if ( !empty ($placeCheck) ) {
        return response()->json(["already" => "Already has this value"]);
      } else {
        $place = new Place();
        $place->placeName = $placeName;
        $place->district_id = $districId;
        $place->save();
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
    public function update(Request $request, $id)
    {
        //
    }

    public function postUpdatePlace(Request $request)
    {
      $place_id = null;
      $message = "Successful";
      $place_id = Place::where('placeName',$request->input('placeName'))->first();

      if(empty($place_id)){
        $place = Place::find($request->input('id'));
        $place->placeName =  ucfirst($request->input('placeName'));
        $place->update();
        return response()->json(["no" => "Update successfully completed"]);
      }else{
        return response()->json(["already" => "Already has this value"]);
      }

    }



    public function getUpdatePlace($id)
    {
      $place = Place::findOrFail($id);
      return response()->json(array('place'=> $place), 200);

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
        $place = Place::findOrFail($id);
        $place->visitinformation()->delete();
        $place->delete();
        return response()->json(["delete" => "Successfully Delete "]);
      } catch (\Illuminate\Database\QueryException $e) {
          return response()->json(["exception" => $e->getCode()]);
      }
    }
}
