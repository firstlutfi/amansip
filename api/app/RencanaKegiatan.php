<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model dokumen
 */
class RencanaKegiatan extends Model
{

  /**
   * Table database
   */
  protected $table = 'rencanakegiatan';

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'tentang', 'tanggal_rencana', 'file_rencana',
  ];

  /**
   * One to one relationships
   */
  public function dokumen()
  {
    return $this->hasOne('App\Dokumen', 'id_dokumen');
  }
}