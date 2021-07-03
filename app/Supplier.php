<?php

namespace App;

use Illuminate\Foundation\Auth\User as SetAuth;
use Illuminate\Database\Eloquent\Model;

class Supplier extends SetAuth
{

    protected $fillable = [
        'email',
        'nama_company',
        'password',
        'bus_id',
        'no_telp',
        'status'
    ];

    protected $hidden = [
        'password'
    ];

    public function bus(){
        return $this->hasMany(Bus::class);
    }
}
