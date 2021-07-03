<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;

// Model
use App\Customer;
use App\Supplier;
use App\Transaction;
use App\History;

// Endmodel
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function viewdashboard(){
        $cust = Customer::all()->count();
        $supp = Supplier::all()->count();
        $trans = Transaction::all()->count();
        $history = History::all()->count();
        $supprequest = Supplier::where('status','D')->count();
        return view('admin/dashboard',[
            'cust' => $cust,
            'supp' => $supp,
            'trans' => $trans,
            'history' => $history,
            'reqsup' => $supprequest,
        ]);
    }
}
