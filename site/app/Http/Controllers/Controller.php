<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Ramsey\Uuid\Uuid;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;

class Controller extends BaseController
{
    private $apiUrl = '';
    private $groupUrl = '';
    private $response = '';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/';


    public function __construct()
    {
        $this->apiUrl = config('app.api_url');
    }

    public function index(Request $request){
    	if ($request->session()->has('logged')) {
    		
    		return view('dashboard');
    	}else{
    		return view('auth');
    	}
    }

    public function login(Request $request){
    	if (!$request->session()->has('logged')) {
            if($request->isMethod('post')){
                if ($this->attemptLogin($request)) {
                    return $this->sendLoginResponse($request);
                }

                return $this->sendFailedLoginResponse($request);
            }

            return view('auth');
        }

        return redirect()->intended($this->redirectTo);
    }

    public function register(){

    }

    public function logout(Request $request)
    {
        $client = new Client();

        try {
            $res = $client->get($this->apiUrl . '/logout', [
                'headers' => [
                    'nip' => session('user.nip')
                ],
                'form_params' => []
            ])
            ->getBody()
            ->getContents();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $res = $e->getResponse()->getBody()->getContents();
        }
        
        $this->response = json_decode($res);
        if(isset($this->response->success)) {
        	if ($this->response->success) {
        		$request->session()->flush();
        		return redirect()->route('home');
        	}else{
        		dd("Logout failed");
        	}
        	
        }else{
        	dd("Logout failed");
        }
        

        
    }

    protected function attemptLogin(Request $request)
    {
        $client = new Client();
        
        try {
        	$response = $client->request('POST', $this->apiUrl .'/login', [
			    'form_params' => [
			        'nip' => $request->input('nip'),
			        'password' => $request->input('password'),
			    ]
			])->getBody()->getContents();

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
        }

        //$username = session('account.fullName');

        $this->response = json_decode($response);
        
        return $this->response->success;
    }

    protected function generateSession()
    {
        $dataUser = $this->response->data;
        session([
            'logged'    => true,
            'api_token'     => $this->response->api_token,
            'user'      => [
                'nip'		=> $dataUser->nip,
                'email'     => $dataUser->email,
                'name'      => $dataUser->name,
                'jabatan'   => $dataUser->jabatan,
                'role'		=> $dataUser->role,
            ]
        ]);
    }

    protected function sendLoginResponse(Request $request)
    {

        $this->generateSession();

        return redirect()->intended($this->redirectTo);
        //return view('dashboard.new-dashboard');

    }

    protected function sendFailedLoginResponse(Request $request)
    {
//        $errors = [$this->username() => trans('auth.failed')];
//
//        if ($request->expectsJson()) {
//            return response()->json($errors, 422);
//        }
//
//        return redirect()->back()
//            ->withInput($request->only($this->username(), 'remember'))
//            ->withErrors($errors);

        return redirect()->back()->withErrors([$this->response->message]);
    }
}
