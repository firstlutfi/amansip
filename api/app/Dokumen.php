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
  protected $table = 'dokumenkegiatan';
  protected $primaryKey = 'id_dokumen';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'nama_kegiatan', 'tanggal_kegiatan', 'file_kegiatan', 'lampiran', 'nomor', 'tempat_kegiatan', 'pimpinan', 'acara', 'dasar', 'isi', 'created_by'
  ];

  /**
   * One to one relationships
   */
  public function user(){
    return $this->belongsTo('App\User', 'created_by');
  }
}