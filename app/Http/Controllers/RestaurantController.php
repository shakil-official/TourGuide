<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Place;
use App\Restaurant;
use Image;
use DB;

class RestaurantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $restaurant = Restaurant::orderBy('id', 'DESC')->paginate(6);
      $place = Place::orderBy('id', 'DESC')->get();
      return View('admin.restaurant.restaurant',['place' => $place , 'restaurant' => $restaurant]);
    }

    public function restaurantFind()
    {
      $place = Place::orderBy('id', 'DESC')->get();

       return View('forend.restaurant.restaurantFind' ,['place' => $place ]);
    }

    /*
     * RestauantSearchGet result ........................
     */

    public function RestauantSearchGet()
    {
      $restaurant = Restaurant::select('name')->get();
      return response()->json(array('restaurant'=> $restaurant), 200);

    }



    public function RestauantSearchPost(Request $request)
    {
      $search    = $request['search'];
      $placeName = $request['placeName'];

      $restaurants = DB::table('places')->join('restaurants', 'places.id', '=', 'restaurants.place_id')
                    ->where('name','LIKE',"%{$search}%")
                    ->whereOr('placeName',$placeName)
                    ->get();

                    return response()->json(array('restaurant' => $restaurants), 200);
    }



    /**
     *  .
     *  status change
     *
     */


    public function status($id)
    {
      $status = 0;
      $restaurant = Restaurant::findOrFail($id);
       if ($restaurant->status == 1) {
         $status = 2;
         $restaurant->status = 2;
        // print($status);
         $restaurant->update();
       }else{
         $status = 1;
         $restaurant->status = 1;
        //  print($status);
         $restaurant->update();
       }
      return response()->json(array('status'=> $status), 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      $this->validate($request,[
      'restaurantName' => 'required | max:90',
        'description' => 'required',
        'address' => 'required ',
       'start' => 'required',
        'end' => 'required',
        'placeName' => 'required',
        'status' => 'required',
        'file' => 'image',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $restaurant = new Restaurant();
      $PlaceId = Place::where('placeName', $request->input('placeName'))->first()->id;

      if ($request['status'] == 'Active') {
        $status = 1;
      }else {
        $status = 2;
      }
      $file = $request->file('file');
      $fileName=  time().''.rand().'.'.$file->getClientOriginalExtension(); //"-0.jpg";
      $location = public_path('images/'. $fileName);
      Image::make($file)->resize(800,400)->save($location);

      $restaurant->image = $fileName;
      $restaurant->name = $request['restaurantName'];
      $restaurant->description = $request['description'];
      $restaurant->address  = $request['address'];
      $restaurant->website  = $request['website'];
      $restaurant->open  = $request['start'];
      $restaurant->close  = $request['end'];
      $restaurant->place_id  = $PlaceId;
      $restaurant->status = $status;
 //dd($request['placeName']);
      $restaurant->save();

      return redirect()->route('restaurant')->with('Success', 'Place updated!');


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
     public function restaurantList($id)
     {
       $restaurantList = Restaurant::findOrFail($id);
       $restaurant  = Restaurant::where('place_id',$restaurantList->place_id )->get();
       // dd($restaurantList);

       return View('forend.restaurant.restaurantList', ['restaurant' => $restaurant , 'restaurantList' => $restaurantList]);

     }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //singleRestaurant
        $restaurant = Restaurant::findOrFail($id);
        $places= Place::all();
        return View('admin.restaurant.singleRestaurant', ['restaurant' => $restaurant ,'places' => $places]);
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
      'restaurantName' => 'required | max:90',
        'description' => 'required',
        'address' => 'required ',
        'start' => 'required',
        'end' => 'required',
        'place' => 'required',
        'file' => 'image',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $restaurant = Restaurant::find($request['id']);

      $oldImage = $restaurant->image;

      $file = $request->file('file');
      $fileName=  time().''.rand().'.'.$file->getClientOriginalExtension(); //"-0.jpg";
      $location = public_path('images/'. $fileName);
      Image::make($file)->resize(800,400)->save($location);


      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      $restaurant->name = $request['restaurantName'];
      $restaurant->description = $request['description'];
      $restaurant->address  = $request['address'];
      $restaurant->website  = $request['website'];
      $restaurant->open  = $request['start'];
      $restaurant->close  = $request['end'];
      $restaurant->image = $fileName;
      $restaurant->place_id  = $PlaceId;

      $restaurant->update();
      Storage::delete($oldImage);

        return redirect()->route('restaurant');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $restaurant = Restaurant::findOrFail($id);
      $restaurant->delete();
      Storage::delete($restaurant->image);
      return response()->json(["delete" => "Successfully Delete "]);
    }
}
