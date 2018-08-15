<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model dokumen
 */
class ProdukHukum extends Model
{

  /**
   * Table database
   */
  protected $table = 'produkhukum';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'no_produkhukum', 'tanggal_produkhukum', 'file_produkhukum',
  ];

  /**
   * One to one relationships
   */
  public function dokumen()
  {
    return $this->hasOne('App\Dokumen', 'id_dokumen');
  }
}