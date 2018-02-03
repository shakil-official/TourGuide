<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Religion;
use App\Place;

class ReligionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $religion = Religion::orderBy('id', 'DESC')->get();
      $place = Place::orderBy('id', 'DESC')->get();

      return View('admin.religion.religion',['religion' => $religion, 'place' => $place]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function religionCreate(Request $request)
    {

      $this->validate($request,[
        'religion_name' => 'required | max:60',
        'placeName' => 'required | max:60',

      ],[
        'required' => 'Fields can be not empty'
      ]);


      $religion_name = $request['religion_name'];
      $placeName = $request['placeName'];


      $place_id = Place::where('placeName',$placeName)->first()->id;
      $religionCheck = Religion::where('religion_name', $religion_name)->where('place_id', $place_id)->first();
    //  return redirect()->route('admin.religion')->with('Success', "bhbkjhkgj".$religion);


      if ( empty ($religionCheck) ) {
        $religion = new Religion();
        $religion->religion_name = ucfirst($religion_name);
        $religion->place_id = $place_id;
        $religion->save();
        return redirect()->route('admin.religion.religion')->with('Success', "Success");
      } else {

        return redirect()->route('admin.religion.religion')->with('Success', "Already Has");
      }

    //    return redirect()->route('admin.place')->with('Success', 'Place updated!');
    //  }

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
      $religion= Religion::findOrFail($id);
      return View('admin.religion.religionEdit',['religion' => $religion]);

          // return redirect()->route('admin.religion')->with('Success', "Find");
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
        'religionName' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $religion = Religion::find($request['id']);
      $religionCheck = Religion::where('religion_name', $request['religionName'])
                      ->where('id', $request['id'])
                      ->first();
      if (empty ($religionCheck) ) {
        $religion->religion_name = ucfirst($request['religionName']);
        $religion->update();
        return redirect()->route('admin.religion.religion')->with('Success', "Success");
      } else {
        return redirect()->route('admin.religion.religion')->with('Success', "Already Has");
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
      $religion = Religion::findOrFail($id);
      $religion->delete();
      return redirect()->route('admin.religion.religion')->with('Success', 'delete !');
    }
}
