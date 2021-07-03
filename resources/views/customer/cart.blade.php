<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Checkout</title>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="/fontaw/css/all.css">
    
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-dark navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">Holirent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="{{ route('customer.history') }}"><i class="fas fa-edit"> History</i></a> 
            <a class="nav-item nav-link active" href="{{ route('customer.cart') }}"><i class="fas fa-shopping-cart"></i></a> 
            <a class="nav-item nav-link active" href="#product">Hi, {{ Auth::user()->nama }}</a>
            <a class="nav-item nav-link active" href="{{route('customer.logout')}}">Logout</a>
		      </div>
        </div>
      </div>
    </nav>
<div class="container" style="min-height:60vh">
    <div class="row mt-4 mb-3">
        <div class="col-sm-12">
            <h2 class="font-weight-bold" style="font-size:25px;">Keranjang</h2>
        </div>
    </div>
    <div class="row">
      <div class="col-sm-12">
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
              <td>
                @if($datas->status === "Belum Dibayar")
                      <button type="submit" class="btn btn-warning bayar" data-toggle="modal" data-target="#modal-bp" id_trans="{{$datas->no_transaksi}}"><i class="fas fa-edit"></i> Bayar</button>
                @elseif($datas->status === "Proses") Proses @endif
              </td>
              
              <td style="min-width:250px;"> 
                <form action="{{ route('customer.delete',$datas->no_transaksi) }}" class="d-inline formdelete" method="post">
                  @csrf
                  @method('delete')
                    <button type="submit" class="btn btn-danger btnHapus"><i class="fas fa-trash"></i> Batalkan</button>
                </form>
              </td>
            </tr>
            @endforeach
          </table>
        </div>
      </div>
    </div>
</div>

<footer class="page-footer mt-4 bg-dark text-white">
      <div class="bg-success">
        <div class="container">
          <div class="row py-4 d-flex justify-content-center">

          </div>
        </div>
      </div>

      <div class="container text-center text-md-left mt-5">
        <div class="row">
          <div class="col-md-3 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">The Providers</h6>
            <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width:125px;height:2px">
            <p class="mt-2">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Quibusdam amet at sint quas, nobis veritatis distinctio nam obcaecati quisquam aliquid modi. Ipsam dicta voluptas, quibusdam quos iure eaque tempore animi!</p>
          </div>

          <div class="col-md-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">Products</h6>
            <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width:85px;height:2px">
            <ul class="list-unstyled">
              <li class="my-2"><a href="#">HTML</a></li>
              <li class="my-2"><a href="#">HTML</a></li>
              <li class="my-2"><a href="#">HTML</a></li>
              <li class="my-2"><a href="#">HTML</a></li>
            </ul>
          </div>

          <div class="col-md-2 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">Usefull Links</h6>
            <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width:110px;height:2px">
            <ul class="list-unstyled">
              <li class="my-2"><a href="#">Home</a></li>
              <li class="my-2"><a href="#">About</a></li>
              <li class="my-2"><a href="#">Contact</a></li>
              <li class="my-2"><a href="#">Servis</a></li>
            </ul>
          </div>

          <div class="col-md-3 mx-auto mb-4">
            <h6 class="text-uppercase font-weight-bold">Contact</h6>
            <hr class="bg-success mb-4 mt-0 d-inline-block mx-auto" style="width:75px;height:2px">
            <ul class="list-unstyled">
              <li class="my-2"><i class="fas fa-home mr-3"></i> Katulampa, Jl Katulampa D8</li>
              <li class="my-2"><i class="far fa-envelope mr-3"></i> holirent@gmail.com</li>
              <li class="my-2"><i class="fas fa-phone mr-3"></i> 08980916908</li>
              <li class="my-2"><i class="fas fa-print mr-3"></i> +00223345363</li>
            </ul>
          </div>

        </div>
      </div>
    </footer>
</body>


    <div class="modal fade" id="modal-bp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title text-center w-100 font-weight-bold" id="exampleModalLabel" style="font-family: 'Roboto';">Pembayaran</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body mx-4">
            <form action="{{ route('customer.bayar') }}" style="padding: 20px;" method="POST" enctype="multipart/form-data">
			        @csrf 
              <div class="form-group">
                <label for="exampleInputEmail1">Bukti Pembayaran</label>
                <input type="hidden" name="no_transaksi" class="id">
                <input type="file" class=" @error('bukti_pembayaran') is-invalid @enderror" name="bukti_pembayaran">
                @error('bukti_pembayaran')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
              </div>
              <button type="submit" class="btn btn-primary form-control mt-3">Kirim</button>
              <p class="text-center mt-2">Or</p>
              <a class="btn btn-success form-control signup text-white">Batal</a>
            </form>
          </div>
        </div>
      </div>
    </div>
    @include('sweetalert::alert')
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
@include('sweetalert::alert')
</body>
</html>

<script>
$('.bayar').click(function(){
  var data = $(this).attr('id_trans');
    $('#modal-bp').modal('show');
    $('.id').val(data);
});
$('.btnHapus').click(function(e){
        e.preventDefault();
        Swal.fire({
            title: 'Are you sure?',
            text: "You Cant Undo This Action Again",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Delete!',
            }).then((result) => {
            if (result.isConfirmed) {
                $('.formdelete').submit();
            }
        });
    });
</script>