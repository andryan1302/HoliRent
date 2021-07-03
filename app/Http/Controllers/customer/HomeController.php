<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Bus;
use App\History;
use Carbon\Carbon;
use App\Transaction;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $data = Bus::all();
        return view('customer/home',compact('data'));
    }

    public function konfirmasi($id){
        
        $data = Bus::findOrFail($id);
        return view('customer/konfirmasi',compact('data'));
    }

    public function konfirmasiAction(Request $r){
        
        $r->validate([
            'tanggal_selesai' => 'required',
            'tanggal_sewa' => 'required',
        ]);

        $data = Bus::findOrFail($r->id);

        $tglSekarang = Carbon::now();
        $tglSewa = Carbon::parse($r->tanggal_sewa);
        $tglSelesai = Carbon::parse($r->tanggal_selesai);
        $selisih = $tglSelesai->diffInDays($tglSewa);
        $total = $selisih * $data->harga;

        $tglSewas = Carbon::parse($r->tanggal_sewa)->addDay();
        $tglSelesais = Carbon::parse($r->tanggal_selesai)->addDay();
        
        
        if($tglSewas->lt($tglSekarang) || $tglSelesais->lt($tglSekarang)){
            return redirect()->route('customer.konfirmasi',$r->id)->with('error','Tanggal Sudah Lewat');
        }elseif($tglSewas->gt($tglSelesais) || $tglSelesais->lt($tglSewas) || $tglSewas->eq($tglSelesais)){
            return redirect()->route('customer.konfirmasi',$r->id)->with('error','Masukkan Tanggal Dengan Benar');
        }elseif(
            Transaction::where('tanggal_sewa',$r->tanggal_sewa)->orWhere('tanggal_selesai',$r->tanggal_selesai)->where('bus_id',$r->id)->count() > 0){
                return redirect()->route('customer.konfirmasi',$r->id)->with('error','Tanggal Sudah Terisi');
        }
            
        return view('customer/checkout',[
                'data' => $data,
                'tglsewa' => $tglSewa->format('Y-m-d'),
                'tglselesai' => $tglSelesai->format('Y-m-d'),
                'selisih' => $selisih,
                'total' => $total,
                'mp' => $r->metode_pembayaran,
            ]);


    }

    public function checkout(Request $r){
        
        $no_rand = Str::random(8);
        Transaction::create([
            'no_transaksi' => $no_rand,
            'customer_id' => Auth::user()->id,
            'bus_id' => $r->id,
            'tanggal_sewa' => $r->tanggal_sewa,
            'tanggal_selesai' => $r->tanggal_selesai,
            'total' => $r->total,
            'metode_pembayaran' => $r->mp,
            'status' => 'Belum Dibayar',
        ]);

        return redirect()->route('customer.home')->with('success','Pesanan Berhasil,Silahkan Lakukan Pembayaran');
    }

    public function cart(){
        $data = Transaction::where('customer_id',Auth::user()->id)->where('status','Belum DiBayar')->orWhere('status','Proses')->get();
        return view('customer.cart',compact('data'));
    }

    public function bayar(Request $r){
        $r->validate([
            'bukti_pembayaran' => 'required',
            'no_transaksi' => 'required',
        ]);


        $data = Transaction::findOrFail($r->no_transaksi);
        $data->status = "Proses";
        
        $filename = time().'.'.$r->bukti_pembayaran->extension();
		$r->bukti_pembayaran->move(public_path('images'), $filename);
		$data->bukti_pembayaran = $filename;
        $data->save();

        return redirect()->route('customer.home')->with('success','Pembayaran Berhasil, Silahkan Tunggu Admin Melakukan Proses');
        
    }
    
    public function delete($id){
        $data = Transaction::findOrFail($id);
        $data->delete();
        
        return redirect()->route('customer.cart')->with('success','Pemesanan Berhasil Dibatalkan');

    }

    public function history(){
        $data = History::where('customer_id',Auth::user()->id)->get();
        return view('customer.history',compact('data'));
    }
}
