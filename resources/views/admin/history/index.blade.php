@extends('admin/template/main')
@section('title','Dashboard History')
@extends('admin/template/navbar')
@extends('admin/template/sidebar')
@extends('admin/template/footer')
@extends('admin/template/linkjs')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data History</h1>
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
                            <th>Transaction Number</th>
                            <th>Customer Name</th>
                            <th>Bus Name</th>
                            <th>Rent Date</th>
                            <th>End Date</th>
                            <th>Total</th>
                            <th>Status</th>
                          </tr>
                          @foreach($data as $datas)
                          <tr>
                            <td p-0>{{ $datas->no_transaksi }}</td>
                            
                            <td style="min-width:200px;">{{$datas->customer->nama}}</td>

                            <td style="min-width:120px">{{$datas->bus->nama_bus}}</td>

                            <td>{{$datas->tanggal_sewa}}</td>
                            <td>{{$datas->tanggal_selesai}}</td>
                            <td>{{$datas->total}}</td>
                            <td>{{$datas->status}}</td>                 
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