@extends('supplier/template/main')
@section('title','Dashboard')
@extends('supplier/template/navbar')
@extends('supplier/template/sidebar')
@extends('supplier/template/footer')
@extends('supplier/template/linkjs')

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
                        <form action="{{route('supplier.bus.search')}}" method="GET">
                          <div class="input-group">
                            <input type="text" class="form-control" style="border-radius:0px !important" name="data_search">
                            <div class="btn-group">
                              <button type="submit" style="border-radius:0px !important" class="btn btn-primary mx-1"><i class="fas fa-search"></i> Search</button>
                              <a href="{{route('supplier.bus')}}" style="border-radius:0px !important;" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Reset</a>
                            </div>
                          </div>
                        </form>
                      </div>
                      <a href="" class="btn btn-primary" data-target="#modalInsert" data-toggle="modal" style="border-radius:4px !important"><i class="fas fa-plus"></i> Add</a> 
                    </div>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped text-center" style="padding:0px 0px">
                          <tr>
                            <th>No</th>
                            <th>Plate Number</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Action</th>
                          </tr>
                          @foreach($data as $datas)
                          <tr>
                            <td p-0>{{ $loop->iteration }}</td>
                            
                            <td style="min-width:200px;">{{ $datas->plat_nomor }}</td>

                            <td style="min-width:120px">
                              {{ $datas->nama_bus }}
                            </td>
                            <td style="min-width:120px">
                              {{ $datas->tipe }}
                            </td>
                            <td style="min-width:120px">
                              {{ $datas->harga }}
                            </td>

                            <td style="min-width:120px">
                              {{ $datas->gambar }}
                            </td>
                            <td style="min-width:325px;">
                               
                                <a href="{{ route('supplier.bus.edit',$datas->id) }}" class="btn btn-warning"><i class="fas fa-edit"></i> Edit</a> 
                                <form action="{{ route('supplier.bus.delete',$datas->id) }}" class="d-inline formdelete" method="post">
                                  @csrf
                                  @method('delete')
                                    <button type="submit" class="btn btn-danger btnHapus"><i class="fas fa-trash"></i> Delete</button>
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
    <div class="modal fade" id="modalInsert" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header bb-1">
            <h5 class="modal-title" id="modalLabel">Add Bus</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="{{route('supplier.bus.add')}}" method="POST" enctype="multipart/form-data">
              @csrf
              <div class="form-group">
                <label>Plate Number</label>
                <input type="text" class="form-control" name="plat_nomor">
                @error('plat_nomor')
                <small style="color:red">{{ ucwords($message) }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Bus Name</label>
                <input type="text" class="form-control" name="nama_bus">
                @error('nama_bus')
                <small style="color:red">{{ ucwords($message) }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label>Type</label>
                <select class="form-control form-control-sm" name="tipe">
                  <option value="HD">HD</option>
                  <option value="SHD">SHD</option>
                  <option value="NON-HD">NON-HD</option>
                  <option value="HDD">HDD</option>
                  <option value="DD">DD</option>
                </select>
              </div>
              <div class="form-group">
                <label>Price</label>
                <input type="number" class="form-control" name="harga">
                @error('harga')
                <small style="color:red">{{ ucwords($message) }}</small>
                @enderror
              </div>
              <div class="form-group">
                <label class="d-block">Image</label>
                <input type="file" name="gambar">
                @error('gambar')
                <small style="color:red">{{ ucwords($message) }}</small>
                @enderror
              </div>
          </div>
          <div class="modal-footer bg-whitesmoke br">
            <a type="button" class="btn btn-danger" data-dismiss="modal">Batal</a>
            <button type="submit" class="btn btn-primary">Tambah</button>
          </div>
          </form>
        </div>
      </div>
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
