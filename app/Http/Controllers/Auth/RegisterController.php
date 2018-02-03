<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Session;
use Request;
use Socialite;
use URL;

use App\SocialProvider;


class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/admin/login';


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return Admin::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'job_title' => $data['type'],
            'status' => 2,
            'password' => bcrypt($data['password']),
        ]);
    }



        /**
         * Redirect the user to the GitHub authentication page.
         *
         * @return Response
         */
         /**
          * Redirect the user to the GitHub authentication page.
          *
          * @return Response
          */
         public function redirectToProvider($provider)
         {


          //  dd(URL::current());
             return Socialite::driver($provider)->redirect();
         }


         /**
          * Obtain the user information from GitHub.
          *
          * @return Response
          */
         public function handleProviderCallback($provider)
         {
          // dd($provider);
             try
             {

                 $socialUser = Socialite::driver($provider)->user();


             }
             catch(\Exception $e)
             {
            //   dd($e);

            print_r($e);
            var_dump($e);
                 return redirect('/main');
             }
             //check if we have logged provider
             $socialProvider = SocialProvider::where('provider_id',$socialUser->getId())->first();

             if(!$socialProvider)
             {
                 //create a new user and provider
                 $user = User::firstOrCreate(
                     ['email' => $socialUser->getEmail()],
                     ['name' => $socialUser->getName()]
                 );


                 $user->socialProviders()->create(
                     ['provider_id' => $socialUser->getId(), 'provider' => $provider]
                 );

             }
             else
                 $user = $socialProvider->user;

             auth()->login($user);
             //----------------------------------------

             if ( Session::has('attempted_url') )
              {
              	$url = Session::get('attempted_url');
              	Session::forget('attempted_url');
              	//return Redirect::to($url);
              }


             //=================================
             return redirect($url);

         }



     }
