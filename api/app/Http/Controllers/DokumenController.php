<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Dokumen;

class DokumenController extends Controller
{

    public function __construct(){
        
    }

    public function getAllDokumen(Request $request)
    {
        $dokumen = Dokumen::all();

        if($dokumen){
            $res['success'] = true;
            $res['message'] = 'Get all dokumen success';
            $res['data'] = $dokumen;
        }else{
            $res['success'] = false;
            $res['message'] = 'Get all dokumen failed, something wrong with the request';
        }

        return response($res);
    }

    public function getOne(Request $request, $id_dokumen)
    {

        $dokumen = Dokumen::where('id_dokumen', $id_dokumen)->first();
        
        if($dokumen != null){
            $converted_date = date_format(date_create_from_format('Y-m-d', $dokumen->tanggal_kegiatan), 'd/m/Y');
            $dokumen->tanggal_kegiatan = $converted_date;
            $res['success'] = true;
            $res['message'] = "Get dokumen with id {$id_dokumen} success";
            $res['data'] = $dokumen;
        }else if($dokumen && $dokumen == null){
            $res['success'] = true;
            $res['message'] = "Dokumen with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Get dokumen with id {$id_dokumen} failed, something wrong with the request";
        }
        
        return response($res);
        
    }

    public function checkExists($id_dokumen){
      $dokumen = Dokumen::where('id_dokumen', $id_dokumen)->first();

      if ($dokumen) {
        return true;
      }else{
        return false;
      }
      
    }

    public function create(Request $request){
      
      $params = $request->all();
      
          switch ($params['jenis']) {
          case '1':
                  $create_dokumen = Dokumen::create([
                      'jenis' => $params['jenis'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                      'tempat_kegiatan' => $params['tempat_kegiatan'],
                      'file_kegiatan' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '2':
               $create_dokumen = Dokumen::create([
                      'jenis' => $params['jenis'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'tanggal_kegiatan' => date("Y-m-d"),
                      'file_kegiatan' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '3':
              $create_dokumen = Dokumen::create([
                      'jenis' => $params['jenis'],
                      'nomor' => $params['nomor'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                      'pimpinan' => $params['pimpinan'],
                      'tempat_kegiatan' => $params['tempat_kegiatan'],
                      'dasar' => $params['dasar'],
                      'file_kegiatan' => $params['filename'],
                      'isi' => $params['isi'],
                      'created_by' => $params['created_by']
                  ]);
              break;
            }
            
            if ($create_dokumen) {
                $res['success'] = true;
                $res['message'] = "Insert dokumen success";
                return response($res);
            }else{
                $res['success'] = false;
                $res['message'] = 'Insert dokumen failed!';
                return response($res);
            }
      
    }

    public function updateFileRecords($id_dokumen, $file){
      
      $dokumen = Dokumen::where('id_dokumen', $id_dokumen)->update(['file_kegiatan' => $file]);
      if ($dokumen){
        return true;
      }else{
        return false;
      }
    }

    public function update(Request $request){
      
      $params = $request->all();

          switch ($params['jenis']) {
          case '1':
                  $params_update  = array(
                                    'nama_kegiatan' => $params['nama_kegiatan'],
                                    'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                                    'tempat_kegiatan' => $params['tempat_kegiatan']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_dokumen = Dokumen::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '2':
                  $params_update  = array(
                                    'nama_kegiatan' => $params['nama_kegiatan'],
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_dokumen = Dokumen::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '3':
                  $params_update  = array(
                                    'nomor' => $params['nomor'],
                                    'nama_kegiatan' => $params['nama_kegiatan'],
                                    'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                                    'pimpinan' => $params['pimpinan'],
                                    'tempat_kegiatan' => $params['tempat_kegiatan'],
                                    'dasar' => $params['dasar'],
                                    'isi' => $params['isi']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_dokumen = Dokumen::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
            }
            
            if ($update_dokumen) {
                $res['success'] = true;
                $res['message'] = "Update dokumen success";
            }else{
                $res['success'] = false;
                $res['message'] = 'Update dokumen failed!';
            }
            
            return response($res);
    }

    public function delete(Request $request, $id_dokumen)
    {

        $dokumen = Dokumen::where('id_dokumen', $id_dokumen)->first();
        $filename = $dokumen->file_kegiatan;
        $delete_dokumen = Dokumen::where('id_dokumen', $id_dokumen)->delete();
        if($delete_dokumen != null){
            $res['success'] = true;
            $res['message'] = "Delete dokumen with id {$id_dokumen} success";
            $res['data'] = $filename;
        }else if($dokumen && $dokumen == null){
            $res['success'] = true;
            $res['message'] = "Dokumen with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Delete dokumen with id {$id_dokumen} failed, something wrong with the request";
        }
        
        return response($res);
        
    }

    /**
     * Get user by id
     *
     * URL /user/{id}
     */
    public function get_user(Request $request, $nip)
    {
        
    }
}