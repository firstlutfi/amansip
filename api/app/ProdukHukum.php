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
  protected $primaryKey = 'id_dokumen';
  public $timestamps = false;

  /**
   * The attributes that are mass assignable.
   *
   * @var array
   */
  protected $fillable = [
    'id_dokumen', 'jenis', 'nomor', 'tentang', 'dengan', 'tanggal_produkhukum', 'file_produkhukum', 'created_by'
  ];

  /**
   * One to one relationships
   */
  public function user(){
    return $this->belongsTo('App\User', 'created_by');
  }
}