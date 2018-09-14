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

class RencanaController extends Controller
{
    private $apiUrl = '';
    private $rencanaGroupUrl = '/rencana';
    private $response = '';

    public function __construct()
    {
        parent::__construct();
        $this->apiUrl = config('app.api_url');
    }

    public function getAllRencana(Request $request){
        
        if ($this->authenticate($request)){
                $client = new Client();
            
            try {
                $response = $client->request('GET', $this->apiUrl . $this->rencanaGroupUrl . '/get-all', [
                    'form_params' => []
                ])->getBody()->getContents();
                

            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $response = $e->getResponse()->getBody()->getContents();
                
            }

            $this->response = json_decode($response);
           
            $data['rencana'] = $this->response->data;
            return view('rencana.rencana', $data);   
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function getRencanaById(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/rencana/get/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $data['rencana'] = $this->response->data;
        //$data['rencana']->file_kegiatan = asset(env('STORAGE_PATH') . '\\rencana\\' . $data['rencana']->file_kegiatan);

        
        if($this->response->success){
            return json_encode($data['rencana']);   
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
                    $form_params['nama_kegiatan'] = $request->input('nama-kegiatan');
                    $form_params['tanggal_kegiatan'] = $request->input('tanggal-kegiatan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['nama_kegiatan'] = $request->input('nama-kegiatan');
                    $form_params['jumlah_anggaran'] = $request->input('jumlah-anggaran');
                    $form_params['tanggal_kegiatan'] = $request->input('tanggal-kegiatan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['nama_kegiatan'] = $request->input('nama-kegiatan');
                    $form_params['tanggal_kegiatan'] = $request->input('tanggal-kegiatan');
                    $form_params['tujuan'] = $request->input('tujuan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/rencana/create', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }

        $this->response = json_decode($response);
        
        if($this->response->success){
            $request->file('file-kegiatan')->move(storage_path('files\rencana'), $filename);
            return redirect()->route('rencana');  
        }else{
            $request->session()->flash('error_message', $this->response->message);
            return redirect()->route('rencana');
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
                    $form_params['id_dokumen'] = $request->input('id-dokumen-tor');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-kegiatan-tor');
                    $form_params['tanggal_kegiatan'] = $request->input('edit-tanggal-kegiatan-tor');
                    $filename = $request->file('file-kegiatan') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-rab');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-kegiatan-rab');
                    $form_params['jumlah_anggaran'] = $request->input('edit-jumlah-anggaran-rab');
                    $form_params['tanggal_kegiatan'] = $request->input('edit-tanggal-kegiatan-rab');
                    $filename = $request->file('file-surat') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-rpk');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-kegiatan-rpk');
                    $form_params['tanggal_kegiatan'] = $request->input('edit-tanggal-kegiatan-rpk');
                    $form_params['tujuan'] = $request->input('edit-tujuan-rpk');
                    $filename = $request->file('file-surat') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/rencana/update', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }
        
        $this->response = json_decode($response);
        if($request->file('edit-file-kegiatan') === null){
            return redirect()->route('rencana');
        }else{
            $request->file('edit-file-kegiatan')->move(storage_path('files\rencana'), $filename);
            return redirect()->route('rencana');
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionDelete(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/rencana/delete/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $filename = $this->response->data;
        
        if($this->response->success){
            unlink(env('STORAGE_PATH') . '\\rencana\\' . $filename);
            //$data['surat']->file_surat = asset(env('STORAGE_PATH') . '\\' . $data['surat']->file_surat);  
        }else{
            abort(500);
        }

        return json_encode($data['status'] = true);
    }
}
