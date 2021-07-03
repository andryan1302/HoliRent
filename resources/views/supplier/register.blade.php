<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Admin Login</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

  <!-- CSS Libraries -->
  <!-- <link rel="stylesheet" href="node_modules/jqvmap/dist/jqvmap.min.css">
  <link rel="stylesheet" href="node_modules/weathericons/css/weather-icons.min.css">
  <link rel="stylesheet" href="node_modules/weathericons/css/weather-icons-wind.min.css">
  <link rel="stylesheet" href="node_modules/summernote/dist/summernote-bs4.css"> -->

  <!-- Template CSS -->
  <link rel="stylesheet" href="/assets/css/style.css">
  <link rel="stylesheet" href="/assets/css/loginstyle.css">
  <link rel="stylesheet" href="/assets/css/components.css">
</head>

<body>
      <!-- Main Content -->


      <div class="kotak">
        <div class="circle"></div>
        <div class="circle2"></div>
        <div class="container">
          <div class="row">
            <div class="col-md-5 "  style="margin-top:200px;">
              <h1>Join With Us and Feel The Conveniencer</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum explicabo eaque esse iste voluptatem possimus dignissimos non odio at accusamus molestias, illo iusto quisquam delectus. Magnam iure vel commodi inventore.</p>
            </div>
            <div class="col-md-5 offset-md-2">
              <div class="login-form">
                <div class="header-login">
                  <h3>Register</h3>
                  <p>Make Free Account Here </p>
                </div>
                <div class="main-login">
                    <form method="POST" action="{{route('supplier.regis')}}">
                      @csrf
                      <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" tabindex="1" autofocus>
                        @error('email')
                        <div class="invalid-feedback" style="display:block">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="name">Company Name</label>
                        <input id="company_name" type="text" class="form-control @error('company_name') is-invalid @enderror" name="company_name" tabindex="2">
                        @error('company_name')
                        <div class="invalid-feedback" style="display:block">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" tabindex="3">
                        @error('password')
                        <div class="invalid-feedback" style="display:block">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        <label for="password">Password Confirmation</label>
                        <input id="password" type="password" class="form-control" name="password_confirmation" tabindex="4">
                      </div>
    
                      <div class="form-group">
                        <div class="d-block">
                            <label for="phone_number" class="control-label">Phone Number</label>
                        </div>
                        <input id="phone_number" type="number" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number" tabindex="5">
                        @error('phone_number')
                        <div class="invalid-feedback" style="display:block">
                          {{ $message }}
                        </div>
                        @enderror
                      </div>
                      <div class="form-group">
                        
                      </div>
                      <button type="submit" class="btn btn-lg btn-block" style="background-color:#343a40;color:white;"tabindex="6">
                        Register
                      </button>
                    </form>
                </div>
                <div class="footer">
                  <h5 class="mt-3 mb-3">OR</h5>
                  <a type="submit" class="btn btn-outline-success btn-lg btn-block" href="{{route('supplier.view.login')}}"tabindex="7">
                        Login
                  </a>
                </div>
              </div>
            </div>
            
          </div>
        </div>
      </div>

  <!-- General JS Scripts -->
  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjmdVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.nicescroll/3.7.6/jquery.nicescroll.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
  <script src="/assets/js/stisla.js"></script>
  @include('sweetalert::alert')

  <!-- JS Libraies -->
  <!-- <script src="node_modules/simpleweather/jquery.simpleWeather.min.js"></script>
  <script src="node_modules/chart.js/dist/Chart.min.js"></script>
  <script src="node_modules/jqvmap/dist/jquery.vmap.min.js"></script>
  <script src="node_modules/jqvmap/dist/maps/jquery.vmap.world.js"></script>
  <script src="node_modules/summernote/dist/summernote-bs4.js"></script>
  <script src="node_modules/chocolat/dist/js/jquery.chocolat.min.js"></script> -->

  <!-- Template JS File -->
  <script src="/assets/js/scripts.js"></script>
  <script src="/assets/js/custom.js"></script>

  <!-- Page Specific JS File -->
  <script src="/assets/js/page/index-0.js"></script>
</body>
</html>
