<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    
    protected $primaryKey = 'no_transaksi';
    protected $keyType = 'string';
    public $incrementing = false;
    protected $fillable = [
        'no_transaksi',
        'customer_id',
        'bus_id',
        'tanggal_sewa',
        'tanggal_selesai',
        'total',
        'metode_pembayaran',
        'status',
        'bukti_pembayaran',
    ];

    public function bus(){
        return $this->belongsTo(Bus::class);
    }

    public function customer(){
        return $this->belongsTo(Customer::class);
    }
}
