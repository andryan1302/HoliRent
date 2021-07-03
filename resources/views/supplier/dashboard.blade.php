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
      <h1>Dashboard</h1>
    </div>
    <div class="row">
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-primary">
            <i class="far fa-user"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Bus</h4>
            </div>
            <div class="card-body">
              {{$bus}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-danger">
            <i class="far fa-newspaper"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>Transaction</h4>
            </div>
            <div class="card-body">
              {{$trans}}
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
          <div class="card-icon bg-warning">
            <i class="far fa-file"></i>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4>History</h4>
            </div>
            <div class="card-body">
              {{$trans}}
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>
@endsection
