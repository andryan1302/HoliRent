<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\History;
use App\Bus;
use App\Transaction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function viewdashboard(){
        $id = Auth::user()->id;
        $hist = History::where('supplier_id',$id)
                        ->join('buses', 'history.bus_id', '=', 'buses.id')
                        ->count();
        $trans = Transaction::where('supplier_id',$id)
                        ->join('buses', 'transactions.bus_id', '=', 'buses.id')
                        ->count();
        $bus = Bus::where('supplier_id',$id)
                        ->count();
        return view('supplier/dashboard',[
            'hist' => $hist,
            'bus' => $bus,
            'trans' => $trans,
        ]);
    }
}
