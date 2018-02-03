<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Country;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    //  $message = "This is a simple message.";
    //  return response()->json([$msg]);



      $tasks = Country::orderBy('id', 'DESC')->get();
    //  $message = $tasks->countryName;
    //  return response()->json(array('mes'=> $tasks));
      return response()->json(array('task'=> $tasks,'tasks'=> $tasks), 200);

 //return View('admin.country',['tasks' => $tasks]);

  //    return  response()->json(array('tasks'=> $tasks), 200);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response

    */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function countryCreate(Request $request)
    {
      $user_id = null;
      $user_id = Country::where('countryName',$request['countryName'])->first();

      if(empty($user_id)){
        $country = new Country();
        $country->countryName =  ucfirst($request['countryName']);
        $country->save();

        return response()->json(["no" => "Update successfully completed"]);
      }else{
        return response()->json(["already" => "Already has this value"]);
      }


    }




    public function getUpdateCountry($id)
    {
        $country = Country::findOrFail($id);
        return response()->json(array('country'=> $country), 200);
    }

    public function postUpdateCountry(Request $request)
    {

      $user_id = null;
      $this->validate($request,[
        'countryName' => 'required | max:60',
      ],[
        'required' => 'Fields can be not empty'
      ]);

      $message = "Successful";
      $user_id = Country::where('countryName',$request['countryName'])->first();

      if(empty($user_id)){
        $country = Country::find($request->input('id'));
        $country->countryName = ucfirst($request['countryName']);
        $country->update();
        return response()->json(["no" => "Update successfully completed"]);
      }else{
        return response()->json(["already" => "Already has this value"]);
      }

    }

    public function destroy($id)
    {

      try {
        $country = Country::findOrFail($id);
        $country->division()->delete();
        $country->delete();
        return response()->json(["delete" => "Successfully Delete "]);
      } catch (\Illuminate\Database\QueryException $e) {
          return response()->json(["exception" => $e->getCode()]);
      }


    }


}
