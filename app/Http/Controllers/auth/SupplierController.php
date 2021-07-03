<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Supplier;
use App\Http\Requests\Auth\SupplierRequest;
use App\Http\Requests\supplier\SupplierRegisRequest;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SupplierController extends Controller
{
    public function __construct(){
        $this->middleware('guest:supplier')->except('logout');
    }
    
    public function viewlogin(){
        return view('supplier/login');
    }

    public function viewregis(){
        return view('supplier/register');
    }

    public function login(SupplierRequest $req){ 
        $data = $req->only('email','password');
        $auth = Auth::guard('supplier')->attempt($data);
        if($auth){
            return redirect()->route('supplier.view.dashboard')->with('success','Login Success');
        }
        return redirect()->route('supplier.view.login')->with('error','Email Or Password Wrong');
    }

    public function regis(SupplierRegisRequest $req){
        $email = $req->email;
        $company = $req->company_name;
        $password = $req->password;
        $phone = $req->phone_number;

        Supplier::create([
            'email' => $email,
            'nama_company' => $company,
            'password' => Hash::make($password),
            'no_telp' => $phone,
            'status' => "D"
        ]);
        return redirect()->route('supplier.view.login')->with('success', 'Register Successfull');

    }

    public function logout(){
        Auth::guard('supplier')->logout();

		return redirect()->route('supplier.view.login')->with('success','Logout Successfull');
    }
}
