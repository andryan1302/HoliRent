@extends('supplier/template/main')
@section('title','Dashboard Supplier Edit')
@extends('supplier/template/navbar')
@extends('supplier/template/sidebar')
@extends('supplier/template/footer')
@extends('supplier/template/linkjs')

@section('content')
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <a href="{{route('supplier.bus')}}" class="btn btn-danger m-2"><i class="fas fa-arrow-left"></i></a>
            <h1>Edit Supplier</h1>
          </div>
          <div class="row">
            <div class="col-12 ">
              <div class="card">
                <div class="card-header d-flex" style="justify-content:space-between">
                  <h4>Form</h4>
                  
                </div>
                <form action="{{route('supplier.bus.update',$data->id)}}" method="post">
                    @method('put')
                    @csrf
                    <div class="card-body">
                        <div class="form-group">
                            <label>Plate Number</label>
                            <input type="text" class="form-control" name="plat_nomor" value="{{$data->plat_nomor}}">
                             @error('plat_nomor') 
                                 <small style="color:red">{{ ucwords($message) }}</small>
                             @enderror 
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" class="form-control" name="nama_bus" value="{{$data->nama_bus}}">
                             @error('nama_bus') 
                                 <small style="color:red">{{ ucwords($message) }}</small>
                             @enderror 
                        </div>
                        <div class="form-group">
                            <label>Type</label>
                            <select class="form-control form-control-sm tipe" name="tipe" data="{{$data->tipe}}">
                                <option value="HD" @if($data->tipe == "HD") selected @endif>HD</option>
                                <option value="SHD" @if($data->tipe == "SHD") selected @endif>SHD</option>
                                <option value="NON-HD" @if($data->tipe == "NON-HD") selected @endif>NON-HD</option>
                                <option value="HDD" @if($data->tipe == "HDD") selected @endif >HDD</option>
                                <option value="DD" @if($data->tipe == "DD") selected @endif >DD</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text" class="form-control" name="harga" value="{{$data->harga}}">
                             @error('harga') 
                                 <small style="color:red">{{ ucwords($message) }}</small>
                             @enderror 
                        </div>
                        <div class="form-group">
                          <label class="d-block">Image</label>
                          <input type="file" name="gambar">
                        </div>
                    </div>
                    <div class="card-footer text-right mb-4">
                        <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    </div>
                </form>
            </div>
          </div>
        </section>
      </div>
@endsection
