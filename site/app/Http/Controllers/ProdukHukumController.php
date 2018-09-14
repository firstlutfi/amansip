<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redirect;

class ProdukHukumController extends Controller
{
    private $apiUrl = '';
    private $produkhukumGroupUrl = '/produkhukum';
    private $response = '';

    public function __construct()
    {
        parent::__construct();
        $this->apiUrl = config('app.api_url');
    }

    public function getAllProdukHukum(Request $request){
        
        if ($this->authenticate($request)){
                $client = new Client();
            
            try {
                $response = $client->request('GET', $this->apiUrl . $this->produkhukumGroupUrl . '/get-all', [
                    'form_params' => []
                ])->getBody()->getContents();
                

            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $response = $e->getResponse()->getBody()->getContents();
                
            }

            $this->response = json_decode($response);
           
            $data['produkhukum'] = $this->response->data;
            return view('produkhukum.produkhukum', $data);   
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function getProdukHukumById(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/produkhukum/get/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $data['produkhukum'] = $this->response->data;
        //$data['produkhukum']->file_kegiatan = asset(env('STORAGE_PATH') . '\\produkhukum\\' . $data['produkhukum']->file_kegiatan);

        
        if($this->response->success){
            return json_encode($data['produkhukum']);   
        }else{
            abort(500);
        }
    }

    public function actionCreate(Request $request){
        
        if ($this->authenticate($request)){
            
            $client = new Client();
            $form_params = array(
                            'jenis' => $request->input('jenis'));
            switch ($request->input('jenis')) {
                case '1':
                    $form_params['nomor'] = $request->input('nomor-produkhukum');
                    $form_params['tentang'] = $request->input('tentang-produkhukum');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '', $form_params['nomor']) . "-" . time() . "." . $request->file('file-produkhukum')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['nomor'] = $request->input('nomor-produkhukum');
                    $form_params['dengan'] = $request->input('dengan-produkhukum');
                    $form_params['tentang'] = $request->input('tentang-produkhukum');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '', $form_params['nomor']) . "-" . time() . "." . $request->file('file-produkhukum')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['nomor'] = $request->input('nomor-produkhukum');
                    $form_params['dengan'] = $request->input('dengan-produkhukum');
                    $form_params['tentang'] = $request->input('tentang-produkhukum');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '', $form_params['nomor']) . "-" . time() . "." . $request->file('file-produkhukum')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/produkhukum/create', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }

        $this->response = json_decode($response);
        
        if($this->response->success){
            $request->file('file-produkhukum')->move(storage_path('files\produkhukum'), $filename);
            return redirect()->route('produkhukum');  
        }else{
            $request->session()->flash('error_message', $this->response->message);
            return redirect()->route('produkhukum');
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionUpdate(Request $request){
        if ($this->authenticate($request)){
            
            $client = new Client();
            $form_params = array(
                            'jenis' => $request->input('jenis'));
            switch ($request->input('jenis')) {
                case '1':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-permen');
                    $form_params['nomor'] = $request->input('edit-nomor-permen');
                    $form_params['tentang'] = $request->input('edit-tentang-permen');
                    $filename = $request->file('edit-file-produkhukum') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-mou');
                    $form_params['nomor'] = $request->input('edit-nomor-mou');
                    $form_params['dengan'] = $request->input('edit-dengan-mou');
                    $form_params['tentang'] = $request->input('edit-tentang-mou');
                    $filename = $request->file('edit-file-produkhukum') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-pks');
                    $form_params['nomor'] = $request->input('edit-nomor-pks');
                    $form_params['dengan'] = $request->input('edit-dengan-pks');
                    $form_params['tentang'] = $request->input('edit-tentang-pks');
                    $filename = $request->file('edit-file-produkhukum') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/produkhukum/update', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }
        
        $this->response = json_decode($response);
        if($request->file('edit-file-produkhukum') === null){
            return redirect()->route('produkhukum');
        }else{
            $request->file('edit-file-produkhukum')->move(storage_path('files\produkhukum'), $filename);
            return redirect()->route('produkhukum');
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionDelete(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/produkhukum/delete/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $filename = $this->response->data;
        
        if($this->response->success){
            unlink(env('STORAGE_PATH') . '\\produkhukum\\' . $filename);
            //$data['surat']->file_surat = asset(env('STORAGE_PATH') . '\\' . $data['surat']->file_surat);  
        }else{
            abort(500);
        }

        return json_encode($data['status'] = true);
    }
}
