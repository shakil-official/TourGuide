<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Market;
use App\Place;

class MarketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $market = Market::orderBy('id', 'DESC')->paginate(6);
      $places= Place::all();

      return View('admin.market.market',['market' => $market, 'places' => $places ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,[
        'marketName'  => 'required',
        'address'     => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

        $market = new Market();
        $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;

        $market->marketName  = $request['marketName'];
        $market->address     = $request['address'];
        $market->place_id    = $PlaceId;
        $market->save();

        return redirect()->route('market')->with('Success', 'Successfully save !');
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

      $market = Market::findOrFail($id);
      $places = Place::all();

      return View('admin.market.marketEdit',['market' => $market, 'places' => $places]);
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
        'marketName'  => 'required',
        'address'     => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

        $market = Market::findOrFail($request->input('id'));
        $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      //  dd($request['marketName']);
        $market->marketName  = $request['marketName'];
        $market->address     = $request['address'];
        $market->place_id    = $PlaceId;
        $market->update();

        return redirect()->route('market')->with('Success', 'Successfully update !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $market = Market::findOrFail($id);
      $market->delete();
      return redirect()->route('market')->with('delete', 'Successfully Delete');
    }
}
