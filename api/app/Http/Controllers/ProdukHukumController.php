<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\ProdukHukum;

class ProdukHukumController extends Controller
{

    public function __construct(){
        
    }

    public function getAllProdukHukum(Request $request)
    {
        $produkhukum = ProdukHukum::all();

        if($produkhukum){
            $res['success'] = true;
            $res['message'] = 'Get all produkhukum success';
            $res['data'] = $produkhukum;
        }else{
            $res['success'] = false;
            $res['message'] = 'Get all produkhukum failed, something wrong with the request';
        }

        return response($res);
    }

    public function getOne(Request $request, $id_dokumen)
    {

        $produkhukum = ProdukHukum::where('id_dokumen', $id_dokumen)->first();
        
        if($produkhukum != null){
            //$converted_date = date_format(date_create_from_format('Y-m-d', $produkhukum->tanggal_produkhukum), 'd/m/Y');
            //$produkhukum->tanggal_kegiatan = $converted_date;
            $res['success'] = true;
            $res['message'] = "Get produk hukum with id {$id_dokumen} success";
            $res['data'] = $produkhukum;
        }else if($produkhukum && $produkhukum == null){
            $res['success'] = true;
            $res['message'] = "Produk Hukum with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Get surat with id {$id_dokumen} failed, something wrong with the request";
        }
        
        return response($res);
        
    }

    public function checkExists($id_dokumen){
      $produkhukum = ProdukHukum::where('id_dokumen', $id_dokumen)->first();

      if ($produkhukum) {
        return true;
      }else{
        return false;
      }
      
    }

    public function create(Request $request){
      
      $params = $request->all();
      
          switch ($params['jenis']) {
          case '1':
                  $create_produkhukum = ProdukHukum::create([
                      'jenis' => $params['jenis'],
                      'nomor' => $params['nomor'],
                      'tentang' => $params['tentang'],
                      'file_produkhukum' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '2':
               $create_produkhukum = ProdukHukum::create([
                      'jenis' => $params['jenis'],
                      'nomor' => $params['nomor'],
                      'dengan' => $params['dengan'],
                      'tentang' => $params['tentang'],
                      'file_produkhukum' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
          case '3':
              $create_produkhukum = ProdukHukum::create([
                      'jenis' => $params['jenis'],
                      'nomor' => $params['nomor'],
                      'dengan' => $params['dengan'],
                      'tentang' => $params['tentang'],
                      'file_produkhukum' => $params['filename'],
                      'created_by' => $params['created_by']
                  ]);
              break;
            }
            
            if ($create_produkhukum) {
                $res['success'] = true;
                $res['message'] = "Insert produkhukum success";
                return response($res);
            }else{
                $res['success'] = false;
                $res['message'] = 'Insert produkhukum failed!';
                return response($res);
            }
      
    }

    public function updateFileRecords($id_dokumen, $file){
      
      $produkhukum = ProdukHukum::where('id_dokumen', $id_dokumen)->update(['file_kegiatan' => $file]);
      if ($produkhukum){
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
                                    'tentang' => $params['tentang']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_produkhukum'] = $params['filename'];
                  }

                  $update_produkhukum = ProdukHukum::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '2':
                 $params_update  = array(
                                    'dengan' => $params['dengan'],
                                    'tentang' => $params['tentang']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_produkhukum'] = $params['filename'];
                  }
                  $update_produkhukum = ProdukHukum::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
          case '3':
                  $params_update  = array(
                                    'dengan' => $params['dengan'],
                                    'tentang' => $params['tentang']
                                    );
                  if ($params['filename'] != "") {
                    $params_update['file_produkhukum'] = $params['filename'];
                  }

                  $update_produkhukum = ProdukHukum::where('id_dokumen', $params['id_dokumen'])->update($params_update);
              break;
            }
            
            if ($update_produkhukum) {
                $res['success'] = true;
                $res['message'] = "Update produkhukum success";
            }else{
                $res['success'] = false;
                $res['message'] = 'Update produkhukum failed!';
            }
            
            return response($res);
    }

    public function delete(Request $request, $id_dokumen)
    {

        $produkhukum = ProdukHukum::where('id_dokumen', $id_dokumen)->first();
        $filename = $produkhukum->file_produkhukum;
        $delete_produkhukum = ProdukHukum::where('id_dokumen', $id_dokumen)->delete();
        if($delete_produkhukum != null){
            $res['success'] = true;
            $res['message'] = "Delete produkhukum with id {$id_dokumen} success";
            $res['data'] = $filename;
        }else if($produkhukum && $produkhukum == null){
            $res['success'] = true;
            $res['message'] = "ProdukHukum with id {$id_dokumen} not found";
        }else{
            $res['success'] = false;
            $res['message'] = "Delete produkhukum with id {$id_dokumen} failed, something wrong with the request";
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