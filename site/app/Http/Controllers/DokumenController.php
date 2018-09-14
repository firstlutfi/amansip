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

class DokumenController extends Controller
{
    private $apiUrl = '';
    private $dokumenGroupUrl = '/dokumen';
    private $response = '';

    public function __construct()
    {
        parent::__construct();
        $this->apiUrl = config('app.api_url');
    }

    public function getAllDokumen(Request $request){
        
        if ($this->authenticate($request)){
                $client = new Client();
            
            try {
                $response = $client->request('GET', $this->apiUrl . $this->dokumenGroupUrl . '/get-all', [
                    'form_params' => []
                ])->getBody()->getContents();
                

            } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                $response = $e->getResponse()->getBody()->getContents();
                
            }

            $this->response = json_decode($response);
           
            $data['dokumen'] = $this->response->data;
            return view('dokumen.dokumen', $data);   
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function getDokumenById(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/dokumen/get/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $data['dokumen'] = $this->response->data;
        //$data['dokumen']->file_kegiatan = asset(env('STORAGE_PATH') . '\\dokumen\\' . $data['dokumen']->file_kegiatan);

        
        if($this->response->success){
            return json_encode($data['dokumen']);   
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
                    $form_params['tempat_kegiatan'] = $request->input('tempat-kegiatan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['nama_kegiatan'] = $request->input('nama-kegiatan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['nomor'] = $request->input('nomor-kegiatan');
                    $form_params['nama_kegiatan'] = $request->input('nama-kegiatan');
                    $form_params['tanggal_kegiatan'] = $request->input('tanggal-kegiatan');
                    $form_params['pimpinan'] = $request->input('pimpinan-kegiatan');
                    $form_params['tempat_kegiatan'] = $request->input('tempat-kegiatan');
                    $form_params['dasar'] = $request->input('dasar-kegiatan');
                    $form_params['isi'] = $request->input('isi-kegiatan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = time() . "." . $request->file('file-kegiatan')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/dokumen/create', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }

        $this->response = json_decode($response);
        
        if($this->response->success){
            $request->file('file-kegiatan')->move(storage_path('files\dokumen'), $filename);
            return redirect()->route('dokumen');  
        }else{
            $request->session()->flash('error_message', $this->response->message);
            return redirect()->route('dokumen');
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
                    $form_params['id_dokumen'] = $request->input('id-dokumen-foto');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-foto');
                    $form_params['tanggal_kegiatan'] = $request->input('edit-tanggal-foto');
                    $form_params['tempat_kegiatan'] = $request->input('edit-tempat-foto');
                    $filename = $request->file('edit-file-kegiatan') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-laporan');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-laporan');
                    $filename = $request->file('edit-file-kegiatan') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['id_dokumen'] = $request->input('id-dokumen-notulen');
                    $form_params['nomor'] = $request->input('edit-nomor-notulen');
                    $form_params['nama_kegiatan'] = $request->input('edit-nama-notulen');
                    $form_params['tanggal_kegiatan'] = $request->input('edit-tanggal-notulen');
                    $form_params['pimpinan'] = $request->input('edit-pimpinan-notulen');
                    $form_params['tempat_kegiatan'] = $request->input('edit-tempat-notulen');
                    $form_params['dasar'] = $request->input('edit-dasar-notulen');
                    $form_params['isi'] = $request->input('edit-isi-notulen');
                    $filename = $request->file('edit-file-kegiatan') !== null ? 
                                $request->input('filename')
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
            }
            
            
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/dokumen/update', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }
        
        $this->response = json_decode($response);
        if($request->file('edit-file-kegiatan') === null){
            return redirect()->route('dokumen');
        }else{
            $request->file('edit-file-kegiatan')->move(storage_path('files\dokumen'), $filename);
            return redirect()->route('dokumen');
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionDelete(Request $request, $id_dokumen){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/dokumen/delete/' . $id_dokumen, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $filename = $this->response->data;
        
        if($this->response->success){
            unlink(env('STORAGE_PATH') . '\\dokumen\\' . $filename);
            //$data['surat']->file_surat = asset(env('STORAGE_PATH') . '\\' . $data['surat']->file_surat);  
        }else{
            abort(500);
        }

        return json_encode($data['status'] = true);
    }
}
