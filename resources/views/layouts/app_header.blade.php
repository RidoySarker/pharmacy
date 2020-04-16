  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a class="btn btn-block btn-outline-success nav-link" href="/purcase"><i class="fas fa-cart-plus"></i> Purcase</a>
 
      </li> &nbsp;
      <li class="nav-item d-none d-sm-inline-block">
        <a class="btn btn-block btn-outline-success nav-link" href="/stock_report"><i class="far fa-chart-bar"></i> Stock Report</a>
      </li>
    </ul>&nbsp;
<div class="dropdown">
  <button class="btn btn-block btn-outline-success dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-money-bill"></i> Sale
  </button>
  <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
    <a class="dropdown-item" href="{{url('retail_sale')}}">Retail Sale</a>
    <a class="dropdown-item" href="{{url('whole_sale')}}">Whole Sale</a>
  </div>
</div>


    <ul class="navbar-nav ml-auto">

    
        <a class="nav-link" href="{{url('expire_date')}}">
          <i class="fas fa-exclamation-triangle"></i>

          <span class="badge badge-danger navbar-badge">
                            @php
                            $c_date=date('Y-m-d');
                            $ex_date = DB::table('purcases')->whereDate('expire_date', '<=', $c_date)->get();
                            @endphp
                            {{collect($ex_date)->count('expire_date')}}
          </span>
        </a>

 
      <li class="nav-item dropdown">
        <a class="nav-link"  href="{{url('out_of_stock')}}">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">
                        @php
                        $out_stocks=DB::table('stocks')->where('total_stock','=',0)->get();
                        @endphp
                        {{collect($out_stocks)->count('medicine_code')}}
          </span>
        </a>
      </li>
      <li class="nav-item dropdown">
            <a href="" class="dropdown-toggle user-panel " data-toggle="dropdown">
              <img src="{{Auth::user()->image==''? '/images/blankavatar.png' : '/'.Auth::user()->image}}" class="img-circle" alt="User Image">
              <span class="hidden-xs">{{Auth::user()->name}}</span>
            </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <div class="card card-widget widget-user">
              <div class="widget-user-header bg-info">
                <h3 class="widget-user-username">Welcome {{Auth::user()->name}}</h3>
                <h5 class="widget-user-desc">Founder &amp; CEO</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle elevation-2" src="{{Auth::user()->image==''? '/images/blankavatar.png' : '/'.Auth::user()->image}}" alt="User Avatar">
              </div>
              </div>
          <a href="{{url('profile')}}" class="btn btn-info btn-flat" style="margin-top: 62px;">Profile</a>
          <a href="{{url('password')}}" class="btn btn-info btn-flat" style="margin-top: 62px;margin-left: 18px;">Password</a>
              <form method="post" action="{{route('logout')}}"> 
                @csrf
                <button class="btn btn-info btn-flat float-right" style="margin-top: -38px;">Sign out</button>
              </form>
        </div>
      </li>
    </ul>
  </nav>
