<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Surat;

class SuratController extends Controller
{
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
        $surat = Surat::where('id_dokumen', $id_surat)->get();
        
        if($surat != null){
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

    public function update(Request $request, $id_surat)
    {
        $surat = User::where('id_dokumen', $login->nip)->update(['api_token' => null]);
    }

    public function delete (Request $request)
    {
      $nip = $request->header('nip');
      $login = User::where('nip', $nip)->first();
        
      if (!$login) {
          $res['success'] = false;
          $res['message'] = "User not logged in";
         
          return response($res);
      }else{
        $delete_token = User::where('nip', $login->nip)->update(['api_token' => null]);

        if ($delete_token) {
                  $res['success'] = true;
                  $res['message'] = 'Logout sucessful';
                  
                  return response($res);
              }else{
              $res['success'] = false;
              $res['message'] = 'Failed to delete user token';
              
              return response($res);
          }
      }
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