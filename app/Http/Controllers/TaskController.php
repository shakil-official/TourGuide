<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Task;
class TaskController extends Controller
{
   /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
   public function index(Request $request)
   {
        $tasks = Task::orderBy('id', 'DESC');
         return view ('dashboard' )->withData ( $tasks );
       //return $tasks;
   }
   /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
   public function store(Request $request) {
    $rules = array (
            'name' => 'required'
    );
      $validator = Validator::make( Input::all (), rules );
      if ($validator->fails())
          return Response::json ( array (

                  'errors' => $validator->getMessageBag ()->toArray ()
          ) );
          else {
              $data = new Task ();
              $data->keep = $request['name'];
              $data->save ();
              return response ()->json( $data);
          }
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
       $this->validate($request, [
           'keep' => 'required',
       ]);
       Task::find($id)->update($request->all());
       return;
   }
   /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
   public function destroy($id)
   {
       $taks = Task::findOrFail($id);
       $taks->delete();
   }
}
