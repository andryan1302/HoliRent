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
            <a class="nav-item nav-link active" href="#">Hi, {{ Auth::user()->nama }}</a>
            <a class="nav-item nav-link active" href="{{route('customer.logout')}}">Logout</a>
		      </div>
        </div>
      </div>
    </nav>
<div class="container" style="min-height:60vh">
    <div class="row mt-4 mb-3">
        <form action="{{ route('customer.checkout') }}" method="POST">
        @csrf
        <div class="col-sm-12">
            <h2 class="font-weight-bold" style="font-size:25px;">Checkout</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-9">
            <h6>Pemesanan</h6>
            <input type="hidden" name="tanggal_sewa" value="{{ $tglsewa }}" readonly>
            <input type="hidden" name="tanggal_selesai" value="{{ $tglselesai }}" readonly>
            <input type="hidden" name="id" value="{{ $data->id }}">
            <input type="hidden" name="total" value="{{ $total }}">
            <input type="hidden" name="mp" value="{{ $mp }}">
            <hr>
            <label class="font-weight-bold">Tanggal Sewa</label>
            <input type="date" value="{{ $tglsewa }}" readonly><br>
            <label class="font-weight-bold">Tanggal Selesai</label>
            <input type="date" value="{{ $tglselesai }}" readonly>
            <hr>
            <h6>Bus</h6>
            <div class="row">
                <div class="col-sm-3">
                    <img src="/images/{{$data->gambar}}" width="200" height="200" alt="">
                </div>
                <div class="col-sm-5">
                    <p class="font-weight-bold">{{$data->nama_bus}}</p>
                    <p class="font-weight-bold">Harga Barang : Rp.{{$data->harga}} </p>
                    <p class="font-weight-bold">Jumlah Hari : <span class='jumlahhari'>{{$selisih}}</span></p>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="card" style="width: 20rem;">
                <div class="card-body">
                    <h5 class="card-title">Ringkasan Pesanan</h5>
                    <hr>
                    <div class="row mb-2">
                        <div class="col-sm-7">
                            <h6 class="card-subtitle text-muted">Harga</h6>
                        </div>
                        <div class="col-sm-5">
                            <h6 class="card-subtitle">{{$data->harga}}</h6>                    
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-sm-7">
                            <h6 class="card-subtitle text-muted">Metode Pembayaran</h6>
                        </div>
                        <div class="col-sm-5">
                            <h6 class="card-subtitle">{{$mp}}</h6>                    
                        </div>
                    </div>
                    <hr>
                    <div class="row mb-4">
                        <div class="col-sm-7">
                            <h6 class="card-subtitle text-muted">Total Harga</h6>
                        </div>
                        <div class="col-sm-5">
                            <h6 class="card-subtitle">{{$total}}</h6>                    
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <button class="btn btn-block btn-primary" style="border-radius:10px">Bayar</button>
                        </div>
                    </div>
                    </form>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <a href="{{ route('customer.home')}}" class="btn btn-block btn-danger" style="border-radius:10px">Batalkan</a>
                        </div>
                    </div>
                </div>
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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@include('sweetalert::alert')
</body>
</html>
