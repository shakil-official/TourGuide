<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Placetype;


class PlaceTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $placetype = Placetype::orderBy('id', 'DESC')->get();
      return View('admin.placetype.placeTypes',['placeType' => $placetype]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request,[
        'place_types_Name' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);


      $placeTypeName = $request['place_types_Name'];

      $placeTypeCheck = Placetype::where('place_type_name',$placeTypeName)->first();


      if ( !empty ($placeTypeCheck) ) {
        return redirect()->route('admin.placeTypes')->with('Success', 'is Empty');
      } else {
        $Placetype = new Placetype();
        $Placetype->place_type_name = ucfirst($placeTypeName);
        $Placetype->save();
        return redirect()->route('admin.placetype.placeTypes')->with('Success', 'Place updated!');

      }
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
         $Placetype = Placetype::findOrFail($id);

          return view('admin.placetype.placetypesEdit',['Placetype' => $Placetype]);
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
        'plactypeName' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $Placetype = Placetype::find($request['id']);
      $Placetype->place_type_name = ucfirst($request['plactypeName']);
      $Placetype->update();
      return redirect()->route('admin.placetype.placeTypes')->with('Success', 'updated!');
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
        $Placetype = Placetype::findOrFail($id);
        $Placetype->delete();
        return redirect()->route('admin.placetype.placeTypes')->with('Success', 'hello updated!');
      } catch (\Illuminate\Database\QueryException $e) {
        return redirect()->route('admin.placetype.placeTypes')->with('Success',  $e->getCode());
      }

    }
}
