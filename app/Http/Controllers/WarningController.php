<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Warning;
use App\Place;

class WarningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $warning = Warning::orderBy('id', 'DESC')->paginate(6);
      $places= Place::all();
      return View('admin.warning.warning',['warning' => $warning, 'places' => $places]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,[
        'title'       => 'required',
        'description' => 'required',
        'warningType' => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $warning = new Warning();
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;

      $warning->title       = $request['title'];
      $warning->description = $request['description'];
      $warning->warningType = $request['warningType'];
      $warning->place_id    = $PlaceId;
      $warning->save();
      return redirect()->route('warning')->with('Success', 'Successfully save !');
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
        $type = ['Hot', 'Rain'];
        $warning = Warning::findOrFail($id);
        $places    = Place::all();
        return View('admin.warning.warningEdit' , [ 'warning' => $warning , 'places' =>  $places , 'type' => $type ]);
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
      $this->validate($request,[
        'title'       => 'required',
        'description' => 'required',
        'warningType' => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

    //  $warning = new Warning();
    //  $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      $warning = Warning::find($request['id']);
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;


      $warning->title       = $request['title'];
      $warning->description = $request['description'];
      $warning->warningType = $request['warningType'];
      $warning->place_id    = $PlaceId;
      $warning->update();
      return redirect()->route('warning')->with('Success', 'Successfully update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $warning= Warning::findOrFail($id);
      $warning->delete();
      return redirect()->route('warning')->with('delete', 'Successfully Delete');
    }
}
