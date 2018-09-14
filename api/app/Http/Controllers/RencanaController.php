<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Rencana;

class RencanaController extends Controller
{

    public function __construct(){
        
    }

    public function getAllRencana(Request $request)
    {
        $rencana = Rencana::all();

        if($rencana){
            $res['success'] = true;
            $res['message'] = 'Get all rencana success';
            $res['data'] = $rencana;
        }else{
            $res['success'] = false;
            $res['message'] = 'Get all rencana failed, something wrong with the request';
        }

        return response($res);
    }

    public function getOne(Request $request, $id_dokumen)
    {

        $rencana = Rencana::where('id_dokumen', $id_dokumen)->first();
        
        if($rencana != null){
            $converted_date = date_format(date_create_from_format('Y-m-d', $rencana->tanggal_kegiatan), 'd/m/Y');
            $rencana->tanggal_kegiatan = $converted_date;
            $res['success'] = true;
            $res['message'] = "Get rencana with id {$id_dokumen} success";
            $res['data'] = $rencana;
        }else if($rencana && $rencana == null){
            $res['success'] = true;
            $res['message'] = "Rencana with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Get surat with id {$id_dokumen} failed, something wrong with the request";
        }
        
        return response($res);
        
    }

    public function checkExists($id_dokumen){
      $rencana = Rencana::where('id_dokumen', $id_dokumen)->first();

      if ($rencana) {
        return true;
      }else{
        return false;
      }
      
    }

    public function create(Request $request){
      
      $params = $request->all();
      
          switch ($params['jenis']) {
          case '1':
                  $create_rencana = Rencana::create([
                      'jenis' => $params['jenis'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                      'file_kegiatan' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '2':
               $create_rencana = Rencana::create([
                      'jenis' => $params['jenis'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'jumlah_anggaran' =>$params['jumlah_anggaran'],
                      'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                      'file_kegiatan' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '3':
              $create_rencana = Rencana::create([
                      'jenis' => $params['jenis'],
                      'nama_kegiatan' => $params['nama_kegiatan'],
                      'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                      'file_kegiatan' => $params['filename'],
                      'tujuan' => $params['tujuan'],
                      'created_by' => $params['created_by']
                  ]);
              break;
            }
            
            if ($create_rencana) {
                $res['success'] = true;
                $res['message'] = "Insert rencana success";
                return response($res);
            }else{
                $res['success'] = false;
                $res['message'] = 'Insert rencana failed!';
                return response($res);
            }
      
    }

    public function updateFileRecords($id_dokumen, $file){
      
      $rencana = Rencana::where('id_dokumen', $id_dokumen)->update(['file_kegiatan' => $file]);
      if ($rencana){
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
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_rencana = Rencana::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '2':
                  $params_update  = array(
                                    'nama_kegiatan' => $params['nama_kegiatan'],
                                    'jumlah_anggaran' =>$params['jumlah_anggaran'],
                                    'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_rencana = Rencana::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '3':
                  $params_update  = array(
                                    'nama_kegiatan' => $params['nama_kegiatan'],
                                    'tanggal_kegiatan' => date_format(date_create_from_format('d/m/Y', $params['tanggal_kegiatan']), 'Y-m-d'),
                                    'tujuan' => $params['tujuan'],
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_kegiatan'] = $params['filename'];
                  }

                  $update_rencana = Rencana::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
            }
            
            if ($update_rencana) {
                $res['success'] = true;
                $res['message'] = "Update rencana success";
            }else{
                $res['success'] = false;
                $res['message'] = 'Update rencana failed!';
            }
            
            return response($res);
    }

    public function delete(Request $request, $id_dokumen)
    {

        $rencana = Rencana::where('id_dokumen', $id_dokumen)->first();
        $filename = $rencana->file_kegiatan;
        $delete_rencana = Rencana::where('id_dokumen', $id_dokumen)->delete();
        if($delete_rencana != null){
            $res['success'] = true;
            $res['message'] = "Delete rencana with id {$id_dokumen} success";
            $res['data'] = $filename;
        }else if($rencana && $rencana == null){
            $res['success'] = true;
            $res['message'] = "Rencana with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Delete rencana with id {$id_dokumen} failed, something wrong with the request";
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