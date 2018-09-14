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

class SuratController extends Controller
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
        
        if ($this->authenticate($request)){
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
            return view('surat.surat-masuk', $data);   
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function getAllSuratKeluar(Request $request){
    
        if ($this->authenticate($request)){
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
            return view('surat.surat-keluar', $data);   
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function getSuratById(Request $request, $id_surat){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/surat/get/' . $id_surat, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $data['surat'] = $this->response->data;
        $data['surat']->file_surat = asset(env('STORAGE_PATH') . '\\' . $data['surat']->file_surat);

        
        if($this->response->success){
            return json_encode($data['surat']);   
        }else{
            abort(500);
        }
    }

    public function actionCreate(Request $request){
        
        if ($this->authenticate($request)){
            
            $client = new Client();
            $form_params = array(
                            'jenis' => $request->input('jenis'),
                            'tipe_surat' => $request->input('tipe-surat'));
            switch ($request->input('tipe-surat')) {
                case '1':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-perintah');
                    $form_params['kepada_surat_perintah'] = $request->input('kepada-surat-perintah');
                    $form_params['dari_surat_perintah'] = $request->input('dari-surat-perintah');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-edaran');
                    $form_params['tentang_surat_edaran'] = $request->input('tentang-surat-edaran');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-biasa');
                    $form_params['tanggal_surat_biasa'] = $request->input('tanggal-surat-biasa');
                    $form_params['kepada_surat_biasa'] = $request->input('kepada-surat-biasa');
                    $form_params['klasifikasi'] = $request->input('klasifikasi');
                    $form_params['lampiran_surat_biasa'] = $request->input('lampiran-surat-biasa');
                    $form_params['perihal_surat_biasa'] = $request->input('perihal-surat-biasa');
                    $form_params['select_disposisi_kepada_surat_biasa'] = $request->input('select-disposisi-kepada-surat-biasa');
                    $form_params['isi_disposisi_surat_biasa'] = $request->input('isi-disposisi-surat-biasa');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '4':
                    $form_params['nomor_surat'] = $request->input('nomor-nota-dinas');
                    $form_params['kepada_nota_dinas'] = $request->input('kepada-nota-dinas');
                    $form_params['dari_nota_dinas'] = $request->input('dari-nota-dinas');
                    $form_params['hal_nota_dinas'] = $request->input('hal-nota-dinas');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
                case '5':
                    $form_params['nomor_surat'] = $request->input('nomor-undangan');
                    $form_params['tanggal_undangan'] = $request->input('tanggal-undangan');
                    $form_params['kepada_undangan'] = $request->input('kepada-undangan');
                    $form_params['klasifikasi'] = $request->input('klasifikasi-undangan');
                    $form_params['lampiran_undangan'] = $request->input('lampiran-undangan');
                    $form_params['perihal_undangan'] = $request->input('perihal-undangan');
                    $form_params['isi_undangan'] = $request->input('isi-undangan');
                    $form_params['select_disposisi_kepada_undangan'] = $request->input('select-disposisi-kepada-undangan');
                    $form_params['isi_disposisi_undangan'] = $request->input('isi-disposisi-undangan');
                    $form_params['created_by'] = $request->session()->get('user.nip');
                    $filename = str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension();
                    $form_params['filename'] = $filename;
                    break;
            }

            
            try {
                $response = $client->request('POST', $this->apiUrl . '/surat/create', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }

        $this->response = json_decode($response);
        
        if($this->response->success){
            $request->file('file-surat')->move(storage_path('files'), $filename);
            if ($request->input('jenis') == 1) {
                return redirect()->route('surat-masuk');  
            }else{
                return redirect()->route('surat-keluar');
            }
        }else{
            $request->session()->flash('error_message', $this->response->message);
            if ($request->input('jenis') == 1) {
                return redirect()->route('surat-masuk');  
            }else{
                return redirect()->route('surat-keluar');
            }
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionUpdate(Request $request){
        if ($this->authenticate($request)){
            
            $client = new Client();
            $form_params = array(
                            'jenis' => $request->input('jenis'),
                            'tipe_surat' => $request->input('tipe-surat'));
            switch ($request->input('tipe-surat')) {
                case '1':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-perintah');
                    $form_params['kepada_surat_perintah'] = $request->input('kepada-surat-perintah');
                    $form_params['dari_surat_perintah'] = $request->input('dari-surat-perintah');
                    $filename = $request->file('file-surat') !== null ? 
                                str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension()
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '2':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-edaran');
                    $form_params['tentang_surat_edaran'] = $request->input('tentang-surat-edaran');
                    $form_params['tanggal_surat_edaran'] = $request->input('tanggal-surat-edaran');
                    $filename = $request->file('file-surat') !== null ? 
                                str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension()
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '3':
                    $form_params['nomor_surat'] = $request->input('nomor-surat-biasa');
                    $form_params['tanggal_surat_biasa'] = $request->input('tanggal-surat-biasa');
                    $form_params['kepada_surat_biasa'] = $request->input('kepada-surat-biasa');
                    $form_params['klasifikasi'] = $request->input('edit-klasifikasi');
                    $form_params['lampiran_surat_biasa'] = $request->input('lampiran-surat-biasa');
                    $form_params['perihal_surat_biasa'] = $request->input('perihal-surat-biasa');
                    $form_params['select_disposisi_kepada_surat_biasa'] = $request->input('select-disposisi-kepada-surat-biasa');
                    $form_params['isi_disposisi_surat_biasa'] = $request->input('isi-disposisi-surat-biasa');
                    $filename = $request->file('file-surat') !== null ? 
                                str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension()
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '4':
                    $form_params['nomor_surat'] = $request->input('nomor-nota-dinas');
                    $form_params['kepada_nota_dinas'] = $request->input('kepada-nota-dinas');
                    $form_params['dari_nota_dinas'] = $request->input('dari-nota-dinas');
                    $form_params['hal_nota_dinas'] = $request->input('hal-nota-dinas');
                    $filename = $request->file('file-surat') !== null ? 
                                str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension()
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
                case '5':
                    $form_params['nomor_surat'] = $request->input('nomor-undangan');
                    $form_params['tanggal_undangan'] = $request->input('tanggal-undangan');
                    $form_params['kepada_undangan'] = $request->input('kepada-undangan');
                    $form_params['klasifikasi'] = $request->input('edit-klasifikasi-undangan');
                    $form_params['lampiran_undangan'] = $request->input('lampiran-undangan');
                    $form_params['perihal_undangan'] = $request->input('perihal-undangan');
                    $form_params['isi_undangan'] = $request->input('isi-undangan');
                    $form_params['select_disposisi_kepada_undangan'] = $request->input('select-disposisi-kepada-undangan');
                    $form_params['isi_disposisi_undangan'] = $request->input('isi-disposisi-undangan');
                    $filename = $request->file('file-surat') !== null ? 
                                str_replace('/', '-', $form_params['nomor_surat']) . "." . $request->file('file-surat')->getClientOriginalExtension()
                                : "" ;
                    $form_params['filename'] = $filename;
                    break;
            }
            
            try {
                $response = $client->request('POST', $this->apiUrl . '/surat/update', [
                    'form_params' => $form_params,
                ])->getBody()->getContents();
                
                } catch (\GuzzleHttp\Exception\BadResponseException $e) {
                    $response = $e->getResponse()->getBody()->getContents();
                    
            }
        // dd($response);
        $this->response = json_decode($response);
        if($request->file('file-surat') === null){
            if ($request->input('jenis') == 1) {
                return redirect()->route('surat-masuk');  
            }else{
                return redirect()->route('surat-keluar');
            } 
        }else{
            $request->file('file-surat')->move(storage_path('files'), $filename);
            if ($request->input('jenis') == 1) {
                return redirect()->route('surat-masuk');  
            }else{
                return redirect()->route('surat-keluar');
            } 
        }
            
        }else{
            return redirect()->guest(route('home'));
        }
    }

    public function actionDelete(Request $request, $id_surat){

        $client = new Client();
        try {
            $response = $client->request('GET', $this->apiUrl . '/surat/delete/' . $id_surat, [
                'form_params' => []
            ])->getBody()->getContents();
            

        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            $response = $e->getResponse()->getBody()->getContents();
            
        }

        $this->response = json_decode($response);
        
        $filename = $this->response->data;
        
        if($this->response->success){
            unlink(env('STORAGE_PATH') . '\\' . $filename);
            //$data['surat']->file_surat = asset(env('STORAGE_PATH') . '\\' . $data['surat']->file_surat);  
        }else{
            abort(500);
        }

        return json_encode($data['status'] = true);
    }
}
