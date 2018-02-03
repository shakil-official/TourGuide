<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Event;
use App\Place;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $event = Event::orderBy('id', 'DESC')->paginate(6);
      $place = Place::orderBy('id', 'DESC')->get();
      return View('admin.event.event',['place' => $place , 'event' => $event]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      // dd("hello");
      $this->validate($request,[
      'title'       => 'required | max:90',
      'description' => 'required',
      'address'     => 'required',
      'start'       => 'required',
      'end'         => 'required',
      'placeName'   => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $event = new Event();
      $PlaceId = Place::where('placeName', $request->input('placeName'))->first()->id;

      try {
        $event->title        = $request['title'];
        $event->description = $request['description'];
        $event->address     = $request['address'];
        $event->open        = $request['start'];
        $event->close       = $request['end'];
        $event->place_id    = $PlaceId;
        $event->save();
        // dd($PlaceId);

        return redirect()->route('event')->with('Success', 'Complated!');

      } catch (\Exception $e) {
        return redirect()->route('event')->with('error', 'Error');
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

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $event = Event::findOrFail($id);
      $places= Place::all();
      return View('admin.event.singleEvent', ['event' => $event ,'places' => $places]);
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
      'title'       => 'required | max:90 | min : 6' ,
      'description' => 'required',
      'address'     => 'required',
      'start'       => 'required',
      'end'         => 'required',
      'place'       => 'required',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $event =  Event::find($request['id']);
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;

      try {
        $event->title        = $request['title'];
        $event->description = $request['description'];
        $event->address     = $request['address'];
        $event->open        = $request['start'];
        $event->close       = $request['end'];
        $event->place_id    = $PlaceId;
        $event->update();

        return redirect()->route('event')->with('Success', 'Updated!');

    }catch (\Exception $e) {
      return redirect()->route('event')->with('error', 'Error');
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
      $Event = Event::findOrFail($id);
      $Event->delete();
      return redirect()->route('event')->with('Success', 'Delete !');
    }
}
