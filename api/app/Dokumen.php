<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model dokumen
 */
class Dokumen extends Model
{

  /**
   * Table database
   */
  protected $table = 'dokumen';
  protected $primaryKey = 'id_dokumen';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis_dokumen', 'created_by',
  ];

  /**
   * One to one relationships
   */
  public function dokumenKegiatan()
  {
    return $this->hasMany('App\DokumenKegiatan');
  }

  public function produkHukum()
  {
    return $this->hasMany('App\ProdukHukum');
  }

  public function rencanaKegiatan()
  {
    return $this->hasMany('App\RencanKegiatan');
  }

  public function surat()
  {
    return $this->hasMany('App\Surat');
  }
}