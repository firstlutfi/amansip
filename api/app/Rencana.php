<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

/**
 * Model dokumen
 */
class Rencana extends Model
{

  /**
   * Table database
   */
  protected $table = 'rencanakegiatan';
  protected $primaryKey = 'id_dokumen';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'nama_kegiatan', 'waktu_pelaksanaan', 'tanggal_kegiatan', 'jumlah_anggaran', 'tujuan', 'file_kegiatan', 'created_by'
  ];

  /**
   * One to one relationships
   */
  public function user(){
    return $this->belongsTo('App\User', 'created_by');
  }
}