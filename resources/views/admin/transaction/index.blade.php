@extends('admin/template/main')
@section('title','Dashboard Transaction')
@extends('admin/template/navbar')
@extends('admin/template/sidebar')
@extends('admin/template/footer')
@extends('admin/template/linkjs')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Transaction</h1>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4></h4>
                      <div class="card-header-form d-flex">
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped text-center" style="padding:0px 0px">
                          <tr>
                            <th>No</th>
                            <th>Customer Name</th>
                            <th>Bus Name</th>
                            <th>Rent Date</th>
                            <th>End Date</th>
                            <th>Total</th>
                            <th>Payment Method</th>
                            <th>Status</th>
                            <th>Proof of Payment</th>
                            <th>Action</th>
                          </tr>
                          @foreach($data as $datas)
                          <tr>
                            <td p-0>{{ $loop->iteration }}</td>
                            
                            <td style="min-width:200px;">{{$datas->customer->nama}}</td>

                            <td style="min-width:120px">{{$datas->bus->nama_bus}}</td>

                            <td>{{$datas->tanggal_sewa}}</td>
                            <td>{{$datas->tanggal_selesai}}</td>
                            <td>{{$datas->total}}</td>
                            <td>{{$datas->metode_pembayaran}}</td>
                            <td>{{$datas->status}}</td>
                            <td><img src="{{ asset("images/$datas->bukti_pembayaran")}}" alt="" width="100px"></td>
                            <td style="min-width:325px;"> 
                                <form action="{{route('supplier.transaction.proses',$datas->no_transaksi)}}" class="d-inline formdelete" method="post">
                                  @csrf
                                  @method('put')
                                    <button type="submit" class="btn btn-success"><i class="fas fa-check"></i> Success</button>
                                </form> 
                                <form action="{{route('supplier.transaction.decline',$datas->no_transaksi)}}" class="d-inline formdelete" method="post">
                                  @csrf
                                  @method('put')
                                    <button type="submit" class="btn btn-danger btnHapus"><i class="fas fa-times"></i> Decline</button>
                                </form>
                            </td>
                          </tr>
                          @endforeach
                        </table>
                        {{ $data->links() }}
                      </div>
                    </div>
                  </div>
          </div>
        </section>
      </div>

@endsection