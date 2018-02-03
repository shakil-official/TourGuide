<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rating;
use Auth;
use App\Visitinformation;

class RatingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $check = null;
      if (Auth::guard('web')->check()){

        $id = Auth::guard('web')->user()->id;

        $ratingPoint  = $request['rating'];
        $visitinformation_id  = $request['visitinformation_id'];
        $check = Rating::where('visitinformation_id', $visitinformation_id)->where('user_id',$id)->first();


        $rating = new Rating();
        if (empty($check)) {

          $rating->rating =  $ratingPoint;
          $rating->visitinformation_id  = $visitinformation_id;
          $rating->user_id =  $id;
          $rating->save();
        }else{
          $ratingUpdate = Rating::where('user_id',$id)->where('visitinformation_id',$visitinformation_id)->first();
          $ratingUpdate->rating =  $ratingPoint;
          $ratingUpdate->update();


        }
        return response()->json(["no" => 'ok']);

      }else{
        return response()->json(["auth" => 'auth']);
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
        //
    }
}
