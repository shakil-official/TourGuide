<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Visitinformation;
use App\Photo;
use App\Hotel;
use App\Placetype;
use App\Place;
use App\Event;
use App\Warning;
use App\Restaurant;
use Image;
use Storage;
use DB;

use App\Rating;

use App\Http\Controllers\Controller;
class VisiInfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     // public function __construct()
     // {
     //     $this->middleware('auth');
     // }
    public function index()
    {
      $Visitinformation  = Visitinformation::orderBy('id', 'DESC')->get();


      return response()->json(array('showImage' => $Visitinformation));
    }

    public function placeSearchGet()
    {
      $place = Place::all();
      return response()->json(array('place'=> $place), 200);

    }
    // showPage

    // public function showPage()
    // {
    //   return View('forend.mainPagePlaceSearch');
    // }


    public function mainPagePlaceSearch(Request $request)
    {

      $availablePlace = $request->input('availablePlace');

      $result = DB::table('places')->join('visitinformations', 'places.id', '=', 'visitinformations.place_id')
                    ->where('placeName','LIKE',"%{$availablePlace}%")
                    ->get();
                    // dd($result);


      return View('forend.mainPagePlaceSearch', ['result' => $result]);


    }

//  single catagory Show -----------


    public function catagoryShow($id)
    {
      //  $Visitinformation  = Visitinformation::where('id',$id)->orderBy('id', 'DESC')->get();
  //  $full = Visitinformation::with('placeType')->get();//->where('id',$id)

    $place = Placetype::find($id);



      $placetype = Placetype::orderBy('id', 'DESC')->get();

      return View('forend.categoryShow', ['placetype' => $placetype , 'full' => $place]);

    }




    public function singlepage()
    {
       return View('forend.singlepage');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function upload(Request $request)
    {
      $visiInfo = new Visitinformation();
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;


      // Get the currently authenticated user's ID...

      if (Auth::guard('admin')->check()){
          $idAuth = Auth::guard('admin')->user()->id;
          print_r($idAuth);
      }


      $visiInfo->title =  $request->input('title');
      $visiInfo->description =  $request->input('description');
      $visiInfo->address =  $request->input('address');
      $visiInfo->place_id = $PlaceId;
      $visiInfo->admin_id =  $idAuth;
      $visiInfo->rating =  0;
      $visiInfo->save();

      $files = $request->file('file');
      $types = $request->get('types');
      $visiInfo_id = $visiInfo->id;

    	if(!empty($files)):
        foreach($files as $file):
        print_r($file);
          $photo = new Photo();
          // get file size

          $fileName=  time().''.rand().'.'.$file->getClientOriginalExtension(); //"-0.jpg";
          // print_r($fileName);
          $location = public_path('images/'. $fileName);
          Image::make($file)->resize(800,400)->save($location);
          $photo->photo = $fileName;
          $photo->visitinformation_id = $visiInfo_id;
          $photo->save();
    		endforeach;
    	endif;

      if(!empty($types)):
        print_r($types);
        $visiInfo->placeType()->sync($types, false);
      endif;

    	return \Response::json(array('success' => true));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function singlepostshow($id)
    {
      $post = Visitinformation::findOrFail($id);
      $placetypes = Placetype::all();
      $places= Place::all();
      return View('admin.post.singleviewpost', ['post' => $post , 'placetypes' => $placetypes, 'places' => $places]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $Visitinformation  = Visitinformation::orderBy('id', 'DESC')->paginate(6);
        return View('admin.post.postview',['visitinformation' => $Visitinformation]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $post = Visitinformation::findOrFail($id);
      $placetypes = Placetype::all();
      $places= Place::all();
      return View('admin.post.singlepost', ['post' => $post , 'placetypes' => $placetypes, 'places' => $places]);
    }


    public function singlepageView($id)
    {
      $arrayName = array();
      $post = Visitinformation::findOrFail($id);
      $placetypes = Placetype::all();
      $places= Place::all();
      $event = Event::all();
      $restaurant = Restaurant::all();
      $hotel = Hotel::all();
      $collection = Visitinformation::all();
      $max  = $collection->sortByDesc('rating');
      $max = $max->values()->all();
      $warning = Warning::where('place_id',$post->place_id)->get();
      // dd($warning);


      $name = DB::table('countries')
                  ->join('divisions', 'countries.id', '=', 'divisions.country_id')
                  ->join('districts', 'divisions.id', '=', 'districts.division_id')
                  ->join('places', 'districts.id', '=', 'places.district_id')
                  // ->join('restaurants', 'places.id', '=', 'restaurants.place_id')
                  ->join('visitinformations', 'places.id', '=', 'visitinformations.place_id')
                  ->where('visitinformations.id','=',$id)
                  ->select('countries.countryName', 'divisions.divisionName', 'districts.districtName','places.id')
                  ->get();


      $member = json_decode($name);

      $arr = 0;
      $j = 0;
      $rate = 0;
      $rate = Rating::select('rating')
              ->where('visitinformation_id', $id)
              ->get();

     for ($i=0; $i <count($rate) ; $i++) {
       $arr = $arr + $rate[$i]->rating;
         $j = $j + 1;
      }

      if($j == 0){
        $rate = 0 ;
      }else{
          $rate = intval($arr/count($rate)) ;
          $visitinformation = Visitinformation::findOrFail($id);
          $visitinformation->rating = $rate;
          $visitinformation->update();
      }
      //dd($rate);


      return View('forend.singlepage', ['warnings' => $warning,'post' => $post , 'placetypes' => $placetypes, 'places' => $places,'name' => $member , 'rating' => $rate , 'restaurant' => $restaurant , 'max' => $max , 'hotel' => $hotel , 'event' => $event]);
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


      // $this->validate($request, array(
      //          'types' => 'required|integer'
      //      ));

      // dd("hello");

        //  dd($request->get('types'));
      // $request['title'];
      // $request['description'];
      // $request['address'];
      // $request['place'];
       $types = $request->get('types');
    //   dd($types);

      $visiInfo = Visitinformation::where('id',$request->input('id'))->first();
      $PlaceId = Place::where('placeName', $request->input('place'))->first()->id;
      //$oldplaceId =  Visitinformation::where('countryName',$request['countryName'])->first();
      // Get the currently authenticated user's ID...
      if (Auth::guard('admin')->check()){
          $idAuth = Auth::guard('admin')->user()->id;
          print_r($idAuth);
      }

      $visiInfo->title =  $request->input('title');
      $visiInfo->description =  $request->input('description');
      $visiInfo->address =  $request->input('address');
      $visiInfo->place_id = $PlaceId;
      $visiInfo->admin_id =  $idAuth;

      $visiInfo->update();



      // if(!empty($types)):
      //   $visiInfo->placeType()->detach();
      //   $visiInfo->placeType()->sync($types);
      // endif;
      //
      // $placeType = Placetype::findOrFail();

      /*--------------------------- Old Images Store Here  ---------------------------*/

      $files = $request->file('imager_update');
      $AllOldImages = Photo::where('visitinformation_id',$request->input('id'))->get();
      $oldImage = array();
      for ($i=0; $i <count($AllOldImages) ; $i++) {
        //  Storage::delete($AllOldImages[$i]->photo);
        $oldImage[$i] = $AllOldImages[$i]->photo;
      }
    //  $Images_Delete = json_encode($oldImage);
      //dd($hhhh);
       /*--------------------------- Old Images Store Here  ---------------------------*/

      if($request->hasFile('imager_update')):
        for ($i=0; $i <count($oldImage) ; $i++) {
         Storage::delete($oldImage[$i]);
       }
      // $Pg = Photo::where($request->input('id'));
       //dd($Photo);
       try {
         Photo::where('visitinformation_id',$request->input('id'))->delete();


       } catch (Exception $e) {
          dd($Pg);
       }



        foreach($files as $file):
        print_r($file);
          $photo = new Photo();
          // get file size

          $fileName=  time().''.rand().'.'.$file->getClientOriginalExtension(); //"-0.jpg";
          // print_r($fileName);
          $location = public_path('images/'. $fileName);
          Image::make($file)->resize(800,400)->save($location);
          $photo->photo = $fileName;
          $photo->visitinformation_id = $request->input('id');



          $photo->save();
        endforeach;
        // for ($i=0; $i <count($oldImage) ; $i++) {
        //   Storage::delete($oldImage[$i] );
        // }

    //    Storage::delete($Images_Delete);

      endif;

      if(!empty($types)):
        // dd($types);
        $visiInfo->placeType()->detach();
        $visiInfo->placeType()->sync($types, false);
      endif;


      // if (isset($types)) {
      //   //dd($types);
      //   $visiInfo->placeType()->sync($types , false);
      //   return redirect()->route('postview');
      //
      //  } else {
      //    $visiInfo->placeType()->sync(array());
      //
      //   }

      return redirect()->route('postview');
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
        $visitinformation = Visitinformation::findOrFail($id);
        $AllOldImages = Photo::where('visitinformation_id',$id)->get();
        $visitinformation->photo()->delete();
        $visitinformation->placeType()->detach();
        $visitinformation->delete();

       for ($i=0; $i <count($AllOldImages) ; $i++) {
         Storage::delete($AllOldImages[$i]->photo);
       }

       //return redirect()->route('postview');
    return response()->json(["delete" => "Successfully Delete "]);
     } catch (\Illuminate\Database\QueryException $e) {
     return response()->json(["exception" => $e->getCode()]);
    }




    //  return response()->json(array('id' => $id));


    }

    /* ----------------------------------   forend  -------------------------------------*/

    public function main()
    {
      $Visitinformation  = Visitinformation::orderBy('id', 'DESC')->get();
      $placetype = Placetype::orderBy('id', 'DESC')->get();
        $photo = new Photo();

       return View('forend.main',['visitinformation' => $Visitinformation , 'placetype' => $placetype ,'photos' => $photo]);
        //return View('forend.main');
    }

    public function search()
    {
      // $place = DB::table('countries')
      //             ->join('divisions', 'countries.id', '=', 'divisions.country_id')
      //             ->join('districts', 'divisions.id', '=', 'districts.division_id')
      //             ->join('places', 'districts.id', '=', 'places.district_id')
      //             ->join('visitinformations', 'places.id', '=', 'visitinformations.place_id')
      //             ->select('countries.countryName', 'divisions.divisionName', 'districts.districtName','places.placeName')
      //             ->get();
      //  dd($place);

       return View('forend.search');
    }

    public function searchGet()
    {
      // $place = Place::select('placeName')->get();
      $place = DB::table('countries')
                  ->join('divisions', 'countries.id', '=', 'divisions.country_id')
                  ->join('districts', 'divisions.id', '=', 'districts.division_id')
                  ->join('places', 'districts.id', '=', 'places.district_id')
                  // ->join('visitinformations', 'places.id', '=', 'visitinformations.place_id')
                  ->select('countries.countryName', 'divisions.divisionName', 'districts.districtName','places.placeName')
                  ->get();
              // dd($place);
        return response()->json(array('search' => $place));
    }



}
