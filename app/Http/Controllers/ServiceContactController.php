<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceContact;
use App\Place;
use App\Provider;

class ServiceContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $service = ServiceContact::orderBy('id', 'DESC')->paginate(6);
      $places= Place::all();
      $providers = Provider::all();
      return View('admin.service.service',['service' => $service, 'places' => $places , 'providers' => $providers ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,[
        'contact'     => 'required',
        'email'       => 'required',
        'website'     => 'required',
        'address'     => 'required',
        'provider'    => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $service = new ServiceContact();
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      $ProviderId = Provider::where('service_provider', $request->input('provider'))->first()->id;

      $service->contact     = $request['contact'];
      $service->email       = $request['email'];
      $service->website     = $request['website'];
      $service->address     = $request['address'];
      $service->provider_id = $ProviderId;
      $service->place_id    = $PlaceId;
      $service->save();
      return redirect()->route('service')->with('Success', 'Successfully save !');
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
      $service = ServiceContact::findOrFail($id);
      $places    = Place::all();
      $providers = Provider::all();

      return View('admin.service.serviceEdit' , [ 'service' => $service , 'places' =>  $places , 'providers' => $providers ]);

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
        'contact'     => 'required',
        'email'       => 'required',
        'website'     => 'required',
        'address'     => 'required',
        'provider'    => 'required',
        'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);


      $service = ServiceContact::find($request['id']);
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      $ProviderId = Provider::where('service_provider', $request->input('provider'))->first()->id;

      $service->contact     = $request['contact'];
      $service->email       = $request['email'];
      $service->website     = $request['website'];
      $service->address     = $request['address'];
      $service->provider_id = $ProviderId;
      $service->place_id    = $PlaceId;
      $service->update();
      return redirect()->route('service')->with('Success', 'Successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $service = ServiceContact::findOrFail($id);
      $service->delete();
      return redirect()->route('service')->with('delete', 'Successfully Delete');
      //return response()->json(["delete" => "Successfully Delete "]);
    }
}
