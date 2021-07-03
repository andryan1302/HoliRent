<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Holirent</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="/assets/style.css">
    <link rel="stylesheet" href="/fontaw/css/all.css">
    
    <!-- Font -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Rajdhani:wght@400;700&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
	
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
      <div class="container">
        <a class="navbar-brand" href="#">Holirent</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav ml-auto">
            <a class="nav-item nav-link active" href="{{ route('customer.history') }}"><i class="fas fa-edit"> History</i></a> 
            <a class="nav-item nav-link active" href="{{ route('customer.cart') }}"><i class="fas fa-shopping-cart"></i></a>
            <a class="nav-item nav-link active" href="#product">Hi,{{ Auth::user()->nama }}</a>
            <a class="nav-item nav-link active" href="{{route('customer.logout')}}">Logout</a>
		      </div>
        </div>
      </div>
    </nav>

    <!-- Jumbotron -->
    <div class="jumbotron jumbotron-fluid">
      <div class="container">
        <h1 class="display-4">More Than Just <span>Rental</span><br>
          It's <span>HOLIRENT</span></h1>
        <a href="#product" class="btn btn-success log-button">Explore</a>
      </div>
    </div>

    <!-- Container -->
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-10 panel">
          <div class="row">
            <div class="col-xl">
              <img src="/assets/img/mapmarker.png" alt="" class="float-left" style="margin-right:5px;">
              <h2>Location</h2>
              <p>Jl.Katulampa Blok D8 No 10</p>
            </div>
            <div class="col-xl">
              <img src="/assets/img/users.png" alt="" class="float-left" style="margin-right:25px;">
              <h2>Users</h2>
              <p>15.000+ Has been join</p>
            </div>
            <div class="col-xl">
              <img src="/assets/img/calender.png" alt="" class="float-left" style="width:135px;margin-left:-5px;">
              <h2>Date</h2>
              <p>Friday, 15-01-2021</p>
            </div>
          </div>
        </div>
      </div>

      <section class="product" id="product">  
        <div class="row">
          <h2>Product Card <br><span><small>Find ur Product Here</small></span></h2>
        </div>
        <div class="row product-list">
          @foreach($data as $datas)
          <div class="kartu" id="{{$datas->id}}">
            <div class="img-kartu">
              <img src="{{ asset("images/$datas->gambar")}}" alt="">
            </div>
            <div class="name-kartu">
              <p>{{$datas->nama_bus}}</p>
            </div>
            
            <div class="price-kartu">
              <div class="info">
                <i class="fas fa-cog"></i>
                <p style="font-size:14px;">{{$datas->plat_nomor}}</p>
              </div>
              <div class="info">
                <i class="fas fa-tag"></i>
                <p style="font-size:14px;">Rp.{{$datas->harga}}/day</p>
              </div>
              <div class="info">
                <i class="fas fa-cog"></i>
                <p style="font-size:14px;">{{$datas->tipe}}</p>                
              </div>
            </div>
            <div class="rent">
            <a href="{{route('customer.konfirmasi',$datas->id)}}" class="btn btn-warning">rent</a>
            </div>
          </div>
          @endforeach
        </div>
      <section>
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
<script>
  $('.signup').click(function(){
    $('#signinPage').modal('hide');
    $('#signupPage').modal('show');
  })

  $('.signin').click(function(){
    $('#signupPage').modal('hide')
    $('#signinPage').modal('show');
  })

</script>
</html>