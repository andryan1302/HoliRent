<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $fillable = [
        'plat_nomor',
        'nama_bus',
        'tipe',
        'harga',
        'status'
    ];

    public function transaction(){
        return $this->hasMany(Transaction::class);
    }

    public function history(){
        return $this->hasMany(History::class);
    }

    public function supplier(){
        return $this->belongsTo(Supplier::class);
    }
}
