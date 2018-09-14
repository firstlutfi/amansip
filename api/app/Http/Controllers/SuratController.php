<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Surat;

class SuratController extends Controller
{

    public function __construct(){
        
    }

    public function getAllSuratMasuk(Request $request)
    {
        $surat = Surat::where('jenis', 1)->get();

        if($surat){
            $res['success'] = true;
            $res['message'] = 'Get all surat masuk success';
            $res['data'] = $surat;
        }else{
            $res['success'] = false;
            $res['message'] = 'Get all surat failed, something wrong with the request';
        }

        return response($res);
    }

    public function getAllSuratKeluar(Request $request)
    {
        $surat = Surat::where('jenis', 2)->get();

        if($surat){
            $res['success'] = true;
            $res['message'] = 'Get all surat keluar success';
            $res['data'] = $surat;
        }else{
            $res['success'] = false;
            $res['message'] = 'Get all surat failed, something wrong with the request';
        }

        return response($res);
    }

    public function getOne(Request $request, $id_surat)
    {

        $surat = Surat::where('id_dokumen', $id_surat)->first();
        
        if($surat != null){
            $converted_date = date_format(date_create_from_format('Y-m-d', $surat->tanggal_surat), 'd/m/Y');
            $surat->tanggal_surat = $converted_date;
            $res['success'] = true;
            $res['message'] = "Get surat with id {$id_surat} success";
            $res['data'] = $surat;
        }else if($surat && $surat == null){
            $res['success'] = true;
            $res['message'] = "Surat with id {$id_surat} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Get surat with id {$id_surat} failed, something wrong with the request";
        }
        
        return response($res);
        
    }

    public function checkExists($no_surat){
      $surat = Surat::where('nomor', $no_surat)->first();

      if ($surat) {
        return true;
      }else{
        return false;
      }
      
    }

    public function create(Request $request){
      
      $params = $request->all();
      if($this->checkExists($request->nomor_surat)){
          $res['success'] = false;
          $res['message'] = 'Record already exists!';
          return response($res);
      }else{
          switch ($params['tipe_surat']) {
          case '1':
                  $create_surat = Surat::create([
                      'jenis' => $params['jenis'],
                      'tipe_surat' => $params['tipe_surat'],
                      'tanggal_surat' => date("Y-m-d"),
                      'nomor' => $params['nomor_surat'],
                      'kepada'=> $params['kepada_surat_perintah'],
                      'dari' => $params['dari_surat_perintah'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '2':
              $create_surat = Surat::create([
                      'jenis' => $params['jenis'],
                      'tipe_surat' => $params['tipe_surat'],
                      'nomor' => $params['nomor_surat'],
                      'tanggal_surat' => date("Y-m-d"),
                      'tentang'=> $params['tentang_surat_edaran'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '3':
              $create_surat = Surat::create([
                      'jenis' => $params['jenis'],
                      'tipe_surat' => $params['tipe_surat'],
                      'nomor' => $params['nomor_surat'],
                      'tanggal_surat' => date_format(date_create_from_format('d/m/Y', $params['tanggal_surat_biasa']), 'Y-m-d'),
                      'kepada' => $params['kepada_surat_biasa'],
                      'klasifikasi' => $params['klasifikasi'],
                      'lampiran' => $params['lampiran_surat_biasa'],
                      'perihal' => $params['perihal_surat_biasa'],
                      'disposisi' => isset($params['select_disposisi_kepada_surat_biasa']) ? $params['select_disposisi_kepada_surat_biasa'] : '',
                      'isi_disposisi' => isset($params['isi_disposisi_surat_biasa']) ? $params['isi_disposisi_surat_biasa'] : '',
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '4':
                $create_surat = Surat::create([
                      'jenis' => $params['jenis'],
                      'tipe_surat' => $params['tipe_surat'],
                      'nomor' => $params['nomor_surat'],
                      'kepada'=> $params['kepada_nota_dinas'],
                      'tanggal_surat' => date("Y-m-d"),
                      'dari' => $params['dari_nota_dinas'],
                      'perihal' => $params['hal_nota_dinas'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '5':
                $create_surat = Surat::create([
                      'jenis' => $params['jenis'],
                      'tipe_surat' => $params['tipe_surat'],
                      'nomor' => $params['nomor_surat'],
                      'tanggal_surat' => date_format(date_create_from_format('d/m/Y', $params['tanggal_undangan']), 'Y-m-d'),
                      'kepada' => $params['kepada_undangan'],
                      'klasifikasi' => $params['klasifikasi'],
                      'lampiran' => $params['lampiran_undangan'],
                      'perihal' => $params['perihal_undangan'],
                      'tentang' => $params['isi_undangan'],
                      'disposisi' => isset($params['select_disposisi_kepada_undangan']) ? $params['select_disposisi_kepada_undangan'] : '',
                      'isi_disposisi' => isset($params['isi_disposisi_undangan']) ? $params['isi_disposisi_undangan'] : '',
                      'created_by' => $params['created_by']
                  ]);
              break;
            }
            
            if ($create_surat) {
                if ($this->updateFileRecords($params['nomor_surat'], $params['filename'])) {
                  $res['success'] = true;
                  $res['message'] = "Insert surat success";
                  return response($res);
                }else{
                  $res['success'] = false;
                  $res['message'] = 'Insert surat failed 1!';
                  return response($res);
                }
            }else{
                $res['success'] = false;
                $res['message'] = 'Insert surat failed 2!';
                return response($res);
            }
      }
    }

    public function updateFileRecords($no_surat, $file){
      
      $surat = Surat::where('nomor', $no_surat)->update(['file_surat' => $file]);
      if ($surat){
        return true;
      }else{
        return false;
      }
    }

    public function update(Request $request){
      
      $params = $request->all();

          switch ($params['tipe_surat']) {
          case '1':
                  $params_update  = array(
                                    'kepada' => $params['kepada_surat_perintah'],
                                    'dari' => $params['dari_surat_perintah']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_surat'] = $params['filename'];
                  }

                  $update_surat = Surat::where('nomor', $params['nomor_surat'])->update($params_update);
              break;
          case '2':
                  $params_update  = array(
                                    'tentang'=> $params['tentang_surat_edaran'],
                                    'tanggal_surat'=> $params['tanggal_surat_edaran'],
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_surat'] = $params['filename'];
                  }
                  $update_surat = Surat::where('nomor', $params['nomor_surat'])->update($params_update);
              break;
          case '3':
                  $params_update  = array(
                                    'tanggal_surat'=> date_format(date_create_from_format('d/m/Y', $params['tanggal_surat_biasa']), 'Y-m-d'),
                                    'kepada'=> $params['kepada_surat_biasa'],
                                    'klasifikasi'=> $params['klasifikasi'],
                                    'lampiran'=> $params['lampiran_surat_biasa'],
                                    'perihal' => $params['perihal_surat_biasa'],
                                    'disposisi' => isset($params['select_disposisi_kepada_surat_biasa']) ? $params['select_disposisi_kepada_surat_biasa'] : '',
                                    'isi_disposisi' => isset($params['isi_disposisi_surat_biasa']) ? $params['isi_disposisi_surat_biasa'] : '',
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_surat'] = $params['filename'];
                  }
                  $update_surat = Surat::where('nomor', $params['nomor_surat'])->update($params_update);
              break;
          case '4':
                  $params_update  = array(
                                    'kepada'=> $params['kepada_nota_dinas'],
                                    'dari' => $params['dari_nota_dinas'],
                                    'perihal' => $params['hal_nota_dinas'],
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_surat'] = $params['filename'];
                  }
                  $update_surat = Surat::where('nomor', $params['nomor_surat'])->update($params_update);
              break;
          case '5':
                  $params_update  = array(
                                    'tanggal_surat' => date_format(date_create_from_format('d/m/Y', $params['tanggal_undangan']), 'Y-m-d'),
                                    'kepada' => $params['kepada_undangan'],
                                    'klasifikasi' => $params['klasifikasi'],
                                    'lampiran' => $params['lampiran_undangan'],
                                    'perihal' => $params['perihal_undangan'],
                                    'tentang' => $params['isi_undangan'],
                                    'disposisi' => isset($params['select_disposisi_kepada_undangan']) ? $params['select_disposisi_kepada_undangan'] : '',
                                    'isi_disposisi' => isset($params['isi_disposisi_undangan']) ? $params['isi_disposisi_undangan'] : '',
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_surat'] = $params['filename'];
                  }
                  $update_surat = Surat::where('nomor', $params['nomor_surat'])->update($params_update);
              break;
            }
            
            if ($update_surat) {
                $res['success'] = true;
                $res['message'] = "Update surat success";
            }else{
                $res['success'] = false;
                $res['message'] = 'Update surat failed!';
            }
            
            return response($res);
    }

    public function delete(Request $request, $id_surat)
    {

        $surat = Surat::where('id_dokumen', $id_surat)->first();
        $no_surat = $surat->file_surat;
        $delete_surat = Surat::where('id_dokumen', $id_surat)->delete();
        if($delete_surat != null){
            $res['success'] = true;
            $res['message'] = "Delete surat with id {$id_surat} success";
            $res['data'] = $no_surat;
        }else if($surat && $surat == null){
            $res['success'] = true;
            $res['message'] = "Surat with id {$id_surat} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Delete surat with id {$id_surat} failed, something wrong with the request";
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