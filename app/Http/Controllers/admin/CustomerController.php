<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Customer;
use Illuminate\Http\Request;
use App\Http\Requests\Admin\Customer\UpdateRequest;


class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Customer::paginate(4);
        return view('admin/customer/index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(request $request)
    {
        $search = $request->get('data_search');
        $data = Customer::where('email', 'like', "%$search%")
                        ->orWhere('nama', 'like', '%$search%')
                        ->paginate(4);
        return view('admin/customer/index',['data' => $data]);     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Customer::findOrFail($id);
        return view('admin/customer/edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRequest $request, $id)
    {
        $data = Customer::findOrFail($id);
        $data->email = $request->email;
        $data->nama = $request->name;
        $data->alamat = $request->address;
        $data->status = $request->status;
        $data->save();
        
        return redirect()->route('admin.customer')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Customer::findOrFail($id);
        $data->delete();

        return redirect()->route('admin.customer')->with('success', 'Delete Successfully');
    }

    public function setactive($id){
        $data =  Customer::findOrFail($id);
        $data->status = 'A';
        $data->save();

        return redirect()->route('admin.customer')->with('success', 'Your Data Now is Active');
    }
    
    public function setnonactive($id){
        $data =  Customer::findOrFail($id);
        $data->status = 'D  ';
        $data->save();

        return redirect()->route('admin.customer')->with('success', 'Your Data Now is Deactive');
    }
}
