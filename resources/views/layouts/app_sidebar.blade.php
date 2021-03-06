  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="admin" class="brand-link">
      <img src="{{asset('images/logo_pharmacy.png')}}" alt="AdminLTE Logo" class="brand-image" >
      <strong style="font-size: xx-large;">PMS</strong>
    </a>


    <div class="sidebar">
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item">
            <a href="{{url('admin')}}" class="nav-link">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
              </p>
            </a>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-medkit" aria-hidden="true"></i>
              <p>
                Medicine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('company') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Brand/Company</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('catagory') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medicine Catagory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ url('desk') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Desk Management</p>
                </a>
              </li>

              <li class="nav-item">
                <a href="{{ url('medicine') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage Medicine</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cart-plus"></i>
              <p>
                Purcase Medicine
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ url('purcase') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purcase</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{ route('purcase.create') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Purcase Report</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon far fa-chart-bar"></i>
              <p>
                Stock Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('stock_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Stock Preview</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('medicine_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Medcine Stock</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-balance-scale"></i>
              <p>
                Sale
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('retail_sale')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retail Sale</p>
                </a>
              </li>

            </ul>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('whole_sale')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whole Sale</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-dollar-sign"></i>
              <p>
                Expense
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('expense_catagory')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense Catagory</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('expense_for')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Expense</p>
                </a>
              </li>
            </ul>
          </li>


          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-book-open"></i>
              <p>
                Report
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('daily_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Daily Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('retail_sale_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retail Sale Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('whole_sale.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whole Sale Report</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('retailsale_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Retail Sale Profit</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{url('whole_sale_report')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Whole Sale Profit</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-handshake"></i>
              <p>
                Customer
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{url('customer')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Customer</p>
                </a>
              </li>
            </ul>
          </li>

          <li class="nav-item has-treeview">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-cog"></i>
              <p>
                Settigs
                <i class="fas fa-angle-left right"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="pages/tables/simple.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>General Settings</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="pages/tables/data.html" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Currency</p>
                </a>
              </li>
            </ul>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  <div class="content-wrapper">
