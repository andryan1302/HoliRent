<?php

namespace App\Http\Controllers\auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Customer;
use App\Bus;
use App\Http\Requests\Auth\CustomerRequest;
use App\Http\Requests\customer\CustomerRegisRequest;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{

    public function __construct(){
        $this->middleware('guest:customer')->except('logout');
    }

    public function viewlogin(){
        $data = Bus::all();
        return view('customer/index',compact('data'));
    }
    
    public function login(CustomerRequest $req){
        $data = $req->only('email','password');
        $auth = Auth::guard('customer')->attempt($data);

        if($auth) return redirect()->route('customer.home')->with('success','Selamat Anda Berhasil Login');

        return redirect()->route('customer.view.login')->with('error','Username Atau Password Salah');
    }

    public function logout(){
        Auth::guard('customer')->logout();

		return redirect()->route('customer.view.login')->with('success','Anda Berhasil Logout');
    }

    public function register(CustomerRegisRequest $req){
        $email = $req->emails;
        $username = $req->usernames;
        $password = $req->passwords;
        $address = $req->address;

        Customer::create
        ([
            'email' => $email,
            'nama' => $username,
            'password' => Hash::make($password),
            'alamat' => $address,
            'status' => "A",
        ]);
        return redirect()->route('customer.view.login')->with('success', 'Register Successfull');
    }
}