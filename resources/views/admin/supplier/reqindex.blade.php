@extends('admin/template/main')
@section('title','Dashboard Supplier')
@extends('admin/template/navbar')
@extends('admin/template/sidebar')
@extends('admin/template/footer')
@extends('admin/template/linkjs')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Data Supplier</h1>
          </div>
          <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                      <h4></h4>
                      <div class="card-header-form d-flex">
                        <form action="{{route('admin.supplier.req.search')}}" method="GET">
                          <div class="input-group">
                            <input type="text" class="form-control" style="border-radius:0px !important" name="data_search">
                            <div class="btn-group">
                              <button type="submit" style="border-radius:0px !important" class="btn btn-primary mx-1"><i class="fas fa-search"></i> Search</button>
                              <a href="{{route('admin.supplier.request')}}" style="border-radius:0px !important;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Reset</a>
                            </div>
                          </div>
                        </form>
                      </div>
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped text-center" style="padding:0px 0px">
                          <tr>
                            <th>No</th>
                            <th>Company Name</th>
                            <th>Email</th>
                            <th>Telephone number</th>
                            <th>Action</th>
                          </tr>
                          @foreach($data as $datas)
                          <tr>
                            <td p-0>{{ $loop->iteration }}</td>
                            
                            <td style="min-width:200px;">{{ $datas->nama_company }}</td>

                            <td style="min-width:120px">
                              {{ $datas->email }}
                            </td>

                            <td>{{$datas->no_telp}}</td>
                            <td style="min-width:325px;">
                                <a href="{{ route('admin.supplier.req.accept',$datas->id) }}" class="btn btn-success"><i class="fas fa-edit"></i>Accept</a> 
                                <form action="{{ route('admin.supplier.delete',$datas->id) }}" class="d-inline formdelete" method="post">
                                  @csrf
                                  @method('delete')
                                    <button type="submit" class="btn btn-danger btnHapus"><i class="fas fa-trash"></i>Reject</button>
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
@section('codejs')
<script>
$(document).ready(function(){
    $('.btnHapus').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You Cant Undo This Action Again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!'
            }).then((result) => {
            if (result.isConfirmed) {
                $('.formdelete').submit();
            }
        })
    })
})
</script>
@endsection
