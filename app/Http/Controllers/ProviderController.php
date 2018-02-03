<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Provider;

class ProviderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $provider = Provider::orderBy('id', 'DESC')->get();
      //dd($provider);
        return View('admin.provider.provider',['provider' => $provider]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,[
        'providerName' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $check = null;
      $check = Provider::where('service_provider',$request['providerName'])->first();
      $provider = new Provider();

      if (empty($check) ){
        $providerName = $request['providerName'];
        $provider->service_provider	= ucfirst($providerName);
        $provider->save();
        return redirect()->route('provider')->with('Success', 'Place updated!');
      } else {
        return redirect()->route('provider')->with('Success', 'Wrong');
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
        //providerName
        $provider = Provider::findOrFail($id);
        return View('admin.provider.providerEdit', ['provider' => $provider]);
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
        //providerName
        $this->validate($request,[
          'providerName' => 'required | max:60',
        ],[
          'required' => 'Fields can be not empty'
        ]);


        $check = null;
        $check = Provider::where('service_provider',$request['providerName'])->first();
        $provider = Provider::find($request['id']);

        if (empty($check) ){
          $providerName = $request['providerName'];
          $provider->service_provider	= ucfirst($providerName);
          $provider->update();
          return redirect()->route('provider')->with('Success', 'successfully completed');
        } else {
          return redirect()->route('provider')->with('Success', 'Already has this value');
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
      $provider = Provider::findOrFail($id);
      $provider->delete();
      return redirect()->route('provider')->with('Success', 'Successfully Delete ');

    }
}
