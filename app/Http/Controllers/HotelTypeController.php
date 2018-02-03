<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelType;

class HotelTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hotelType = HotelType::orderBy('id', 'DESC')->get();


      return View('admin.hotelTypes.hoteltype',['hotelType' => $hotelType]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hoteltypeCreate(Request $request)
    {

      $this->validate($request,[
        'hotel_types_Name' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);


      $hotelTypeName = $request['hotel_types_Name'];

      $hotelTypeCheck = HotelType::where('hotel_types_Name',$hotelTypeName)->first();


      if ( !empty ($hotelTypeCheck) ) {
        return redirect()->route('admin.hotelTypes.hoteltype')->with('Success', 'is Empty');
      } else {
        $hotelType = new HotelType();
        $hotelType->hotel_types_Name = ucfirst($hotelTypeName);
        $hotelType->save();
        return redirect()->route('admin.hotelTypes.hoteltype')->with('Success', 'Place updated!');

      }

    }

    public function postUpdateHoteltype(Request $request)
    {
        $this->validate($request,[
          'hoteltypeName' => 'required | max:60',
        ],[
          'required' => 'Fields can be not empty'
        ]);
        $hotelType = HotelType::find($request['id']);
        //$countryName =
        $hotelType->hotel_types_Name = ucfirst($request['hoteltypeName']);
        $hotelType->update();

          return redirect()->route('admin.hotelTypes.hoteltype')->with('Success', 'updated!');
    }

    public function getUpdateHoteltype($id)
    {
      $hotelType = HotelType::findOrFail($id);
      return view('admin.hotelTypes.hotelTypeEdit',['hotelType' => $hotelType]);
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $HotelType = HotelType::findOrFail($id);
      $HotelType->delete();
      return redirect()->route('admin.hotelTypes.hoteltype')->with('Success', 'hello updated!');
    }
}
