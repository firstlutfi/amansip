<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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
    'id_dokumen', 'jenis', 'tipe_surat', 'tentang', 'nomor', 'kepada', 'dari', 'sifat', 'disposisi', 'isi_disposisi', 'klasifikasi', 'lampiran', 'perihal', 'tanggal_surat', 'file_surat',
  ];
}