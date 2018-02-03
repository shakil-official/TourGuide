<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\HotelType;
use App\Hotel;
use App\Place;
use Image;
use Storage;
use DB;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $hotel  = Hotel::orderBy('id', 'DESC')->get();
      $hotelType = HotelType::orderBy('id', 'DESC')->get();
      $place = Place::orderBy('id', 'DESC')->get();

      return View('admin.hotel.hotel',['hotel' => $hotel ,'hotelType' => $hotelType , 'place' => $place]);
    }




    public function hotelFind()
    {
      $place = Place::orderBy('id', 'DESC')->get();

       return View('forend.hotel.hotelFind' ,['place' => $place ]);
    }

    /*
     * HotelSearchGet result ........................
     */

    public function HotelSearchGet()
    {
      $hotel = Hotel::select('hotelName')->get();
      return response()->json(array('hotel'=> $hotel), 200);

    }



    public function hotelSearchPost(Request $request)
    {
      $search    = $request['search'];
      $placeName = $request['placeName'];

      $hotels = DB::table('places')->join('hotels', 'places.id', '=', 'hotels.place_id')
                    ->where('hotelName','LIKE',"%{$search}%")
                    ->where('placeName',$placeName)
                    ->get();

                    return response()->json(array('hotel' => $hotels), 200);
    }




    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function hotelCreate(Request $request)
    {
      $this->validate($request,[
        'hotelName' => 'required | max:90',
        // 'hotelTitle' => 'required | max:90',
        'hotel_types_Name' => 'required',
        'placeName' => 'required',
        'address' => 'required',
        'file' => 'image',

      ],[
        'required' => 'Fields can be not empty'
      ]);

      $hotelName = $request['hotelName'];
      $hotelTitle = $request['hotelTitle'];
      $hotel_types_Name = $request['hotel_types_Name'];
      $placeName = $request['placeName'];
      $address = $request['address'];
      $files = $request->file('file');

      $hotelType_id = HotelType::where('hotel_types_Name', $hotel_types_Name)->first()->id;
      $hotelCheck = Hotel::where('hotelName', $hotelName)->where('hoteltype_id', $hotelType_id)->first();
      $place_id = Place::where('placeName', $placeName)->first()->id;


      if ( !empty ($hotelCheck) ) {
        return redirect()->route('admin.hotel.hotel')->with('Success', 'Something is wrong');
      } else {
        $hotel = new Hotel();
        $hotel->hotelName = $hotelName;
        $hotel->description = $hotelTitle;
        $hotel->hoteltype_id = $hotelType_id;
        $hotel->place_id = $place_id;
        $hotel->address = $address;
        $hotel->website =$request['website'];
        $fileName =  time().''.rand().'.'.$files->getClientOriginalExtension(); //"-0.jpg";
        $location = public_path('images/'. $fileName);
        Image::make($files)->resize(800,400)->save($location);
        $hotel->image = $fileName;

        $hotel->save();
        return redirect()->route('admin.hotel.hotel')->with('Success', 'Place updated!');

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
    public function hotelList($id)
    {
      $hotelList = Hotel::findOrFail($id);
      $hotel  = Hotel::where('place_id',$hotelList->place_id )->get();

      return View('forend.hotel.hotelList', ['hotel' => $hotel , 'hotelList' => $hotelList]);

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

    public function postUpdateHotel(Request $request)
    {

      $this->validate($request,[
          'hotelName' => 'required | max:90',
          'hotelTitle' => 'required | max:90',
          'address' => 'required',
          'image-file' => 'image',
        ],[
          'required' => 'Fields can be not empty'
        ]);

        $file = $request->file('image-file');
        $hotel = Hotel::find($request['id']);
        $oldImage =   $hotel->image;
      //  dd($oldImage);
        $fileName=  time().''.rand().'.'.$file->getClientOriginalExtension(); //"-0.jpg";
        $location = public_path('images/'. $fileName);
        Image::make($file)->resize(800,400)->save($location);

        $hotelplace = $request['placeName'];
        $place_id = Place::where('placeName', $hotelplace)->first()->id;
        $hotel->hotelName = $request['hotelName'];
        $hotel->description = $request['hotelTitle'];
        $hotel->place_id = $place_id;
        $hotel->address = $request['address'];
        $hotel->image = $fileName;
        $hotel->website = $request['website'];
        $hotel->update();
        Storage::delete($oldImage);

          return redirect()->route('admin.hotel.hotel')->with('Success', 'updated!------');
    }

    public function getUpdateHotel($id)
    {
      $hotel = Hotel::findOrFail($id);
      $place = Place::where('id',$hotel->place_id )->first();
      //if option writre
      //
      //===========================
      return view('admin.hotel.hotelEdit',['hotel' => $hotel , 'p' => $place]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $hotel = Hotel::findOrFail($id);
      $hotel->delete();
      Storage::delete($hotel->image);
      return redirect()->route('admin.hotel.hotel')->with('Success', 'hello updated!');
    }
}
