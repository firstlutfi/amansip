<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;

class SuratController extends AuthenticatedController
{
    private $apiUrl = '';
    private $suratMasukGroupUrl = '/surat-masuk';
    private $suratKeluarGroupUrl = '/surat-keluar';
    private $response = '';

    public function __construct()
    {
        parent::__construct();
        $this->apiUrl = config('app.api_url');
    }

    public function getAllSuratMasuk(Request $request){
    	$client = new Client();
        
        try {
            $response = $client->request('GET', $this->apiUrl . $this->suratMasukGroupUrl . '/get-all', [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        $data['surat'] = $this->response->data;

        if($this->response->success){
            return view('surat.surat-masuk', $data);   
        }else{
            abort(500);
        }
        
    }

    public function getAllSuratKeluar(Request $request){
        $client = new Client();
        
        try {
            $response = $client->request('GET', $this->apiUrl . $this->suratKeluarGroupUrl . '/get-all', [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        $data['surat'] = $this->response->data;

        if($this->response->success){
            return view('surat.surat-keluar', $data);   
        }else{
            abort(500);
        }
        
    }
}
