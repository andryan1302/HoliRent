<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Transaction;
use App\History;

class TransactionController extends Controller
{
    public function index(){
        $data = Transaction::paginate(4);
        return view('admin/transaction/index',['data' => $data]);
    }

    public function proses($id){
        $data = Transaction::findOrFail($id);
        $no_rand = Str::random(8);
        $insert = History::create([
            'no_transaksi' => $no_rand,
            'customer_id' => $data->customer_id,
            'bus_id' => $data->bus_id,
            'tanggal_sewa' => $data->tanggal_sewa,
            'tanggal_selesai' => $data->tanggal_selesai,
            'total' => $data->total,
            'status' => 'Berhasil',
        ]);

        if($insert){
            $data->delete();
            return redirect()->route('admin.transaction')->with('success','Accept Sucessfull');
        }else{
            return redirect()->route('admin.transaction')->with('Error','Something Wrong');
        };
    }

    public function decline($id){
        $data = Transaction::findOrFail($id);
        $no_rand = Str::random(8);
        $insert = History::create([
            'no_transaksi' => $no_rand,
            'customer_id' => $data->customer_id,
            'bus_id' => $data->bus_id,
            'tanggal_sewa' => $data->tanggal_sewa,
            'tanggal_selesai' => $data->tanggal_selesai,
            'total' => $data->total,
            'status' => 'Gagal',
        ]);
        if($insert){
            $data->delete();
            return redirect()->route('admin.transaction')->with('success','Decline Sucessfull');
        }else{
            return redirect()->route('admin.transaction')->with('Error','Something Wrong');
        };
        
    }
}
