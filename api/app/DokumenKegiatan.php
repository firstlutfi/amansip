<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model dokumen
 */
class DokumenKegiatan extends Model
{

  /**
   * Table database
   */
  protected $table = 'dokumenkegiatan';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'tentang' 'tanggal_kegiatan', 'file_kegiatan',
  ];

  /**
   * One to one relationships
   */
  public function dokumen()
  {
    return $this->belongsTo('App\Dokumen', 'id_dokumen');
  }
}