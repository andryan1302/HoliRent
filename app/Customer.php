<?php

namespace App;

use Illuminate\Foundation\Auth\User as SetAuth;

class Customer extends SetAuth
{
    
    protected $fillable = [
        'email',
        'nama',
        'password',
        'alamat',
        'status'
    ];
    
    protected $hidden = [
        'password',
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }
    
}
