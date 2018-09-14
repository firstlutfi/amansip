<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Laravel\Lumen\Auth\Authorizable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nip','password','name', 'email', 'jabatan', 'role',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'api_token'
    ];

    public function surat(){
        return $this->hasMany('App\Surat');
    }

    public function dokumenKegiatan(){
        return $this->hasMany('App\DokumenKegiatan');
    }

    public function produkHukum(){
        return $this->hasMany('App\ProdukHukum');
    }

    public function rencanaKegiatan(){
        return $this->hasMany('App\RencanKegiatan');
    }
}
