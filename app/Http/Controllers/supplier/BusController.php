<?php

namespace App\Http\Controllers\supplier;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bus;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\supplier\bus\StoreRequest;


class BusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id = Auth::user()->id;
        $data = Bus::where('supplier_id',$id)
                    ->paginate(4);
        return view('supplier/bus/index',compact('data'));
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
    public function store(StoreRequest $request)
    {
        $supplierbus = new Bus;
        $supplierbus->supplier_id = Auth::user()->id;
		$supplierbus->plat_nomor = $request->plat_nomor;
		$supplierbus->nama_bus = $request->nama_bus;
		$supplierbus->tipe = $request->tipe;
		$supplierbus->harga = $request->harga;
        
		$filename = time().'.'.$request->gambar->extension();
		$request->gambar->move(public_path('images'), $filename);
		$supplierbus->gambar = $filename;

        $supplierbus->save();

        return redirect()->route('supplier.bus')->with('success','Bus Is Already Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function show(Request $req)
    {
        $id = Auth::user()->id;
        $search = $req->get('data_search');
        $data = Bus::where([
                        ['plat_nomor', 'like', "%$search%"],
                        ['supplier_id', '=', $id],
                        ])
                        ->orWhere([
                            ['nama_bus', 'like', "%$search%"],
                            ['supplier_id', '=', $id],
                            ])->paginate(4);
        return view('supplier/bus/index',['data' => $data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Bus::findOrFail($id);
        return view('supplier/bus/edit',['data' => $data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        $bus = Bus::findOrFail($id);
        $bus->plat_nomor = $req->plat_nomor;
        $bus->nama_bus = $req->nama_bus;
        $bus->tipe = $req->tipe;
        $bus->harga = $req->harga;
        
        $filepath = "images/$bus->gambar";
		if($req->gambar != null) {
			if(\File::exists(public_path($filepath)))
				\File::delete(public_path($filepath));

			$filename = time().'.'.$req->gambar->extension();
			$req->gambar->move(public_path('images'), $filename);
			$bus->gambar = $filename;
        }
        $bus->save();

        return redirect()->route('supplier.bus')->with('success', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Bus::findOrFail($id);
        $data->delete();

        return redirect()->route('supplier.bus')->with('success', 'Delete Successfully');
    }
}
