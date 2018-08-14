<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function login(Request $request)
    {
        if($request->isMethod('post')){
            $request->all();
        }
        return $request;
    }
    public function postRequest($request)
    {
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', 'http://api.stg.watchstadium.com/users', [
            'form_params' => [
                'name' => 'krunal',
            ]
        ]);
        $response = $response->getBody()->getContents();
        echo '<pre>';
        print_r($response);
    }
    public function store(Request $request)
    {
        $data = new GuzzlePost();
        $data->name=$request->get('name');
        $data->save();
        return response()->json('Successfully added');

    }

}
