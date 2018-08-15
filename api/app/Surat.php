<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

/**
 * Model dokumen
 */
class Surat extends Model
{

  /**
   * Table database
   */
  protected $table = 'surat';
  protected $primaryKey = 'id_dokumen';
  public $id_dokumen = '';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'no_agenda', 'no_surat', 'kepada', 'dari', 'sifat', 'disposisi', 'tanggal_surat', 'file_surat',
  ];

  /**
   * One to one relationships
   */

  public static function getOne($id_dokumen){
    $result = DB::table('surat')
              ->join('dokumen', 'surat.id_dokumen', '=', 'dokumen.id_dokumen')
              ->where('surat.id_dokumen', '=', $id_dokumen)
              ->get();

    return $result;
  }

  public function dokumen()
  {
    return $this->hasOne('App\Dokumen', 'id_dokumen', 'id_dokumen');
  }
}