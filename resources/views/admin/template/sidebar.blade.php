@section('sidebar')
    <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('admin.view.dashboard')}}">HoliRent</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('admin.view.dashboard')}}">HR</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li><a class="nav-link" href="{{ route('admin.view.dashboard')}}"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
              <li class="menu-header">Data</li>
              <li><a class="nav-link" href="{{route('admin.customer')}}"><i class="far fa-square"></i> <span>Customer</span></a></li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i><span>Supplier</span></a>
                <ul class="dropdown-menu">
                  <li class="active"><a class="nav-link" href="{{route('admin.supplier')}}">Active Supplier</a></li>
                  <li><a class="nav-link" id="request" href="{{route('admin.supplier.request')}}">Request Supplier</a></li>
                </ul>
              </li>
              <li class="menu-header">Data Transactions</li>
              <li><a class="nav-link" href="{{route('admin.transaction')}}"><i class="far fa-square"></i> <span>Trasaction</span></a></li>
              <li><a class="nav-link" href="{{route('admin.history')}}"><i class="far fa-square"></i> <span>History</span></a></li>
            </ul> 
        </aside>
    </div>
@endsection