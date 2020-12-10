 <?php $company=DB::select('SELECT *  FROM company');
        foreach($company as $value){
            $com=$value->name;
            $logo=$value->logo;
        }?>

<a href="index3.html" class="brand-link">
      <img src="{{asset('image/company/$logo')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">{{$com}}</span>
    </a>
 <aside class="main-sidebar sidebar-dark-primary elevation-4">
   

   
    <div class="sidebar">
      
     <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
         
        </div>
        <div class="info">
          <a href="#" class="d-block">{{$com}}</a>
        </div>
      </div>

      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <li class="nav-item">
            <a href="{{'home'}}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Home
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
           <li class="nav-item">
            <a href="{{'company'}}" class="nav-link">
              <i class="nav-icon fa fa-home"></i>
              <p>
                Company
                <span class="badge badge-info right"></span>
              </p>
            </a>
          </li>
        <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-image"></i>
              <p>
                Banner
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
           <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ads')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ads.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Products
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('products')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('products.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              
            </ul>
          </li>
           <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fa fa-gift"></i>
              <p>
                Category
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('category')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Manage</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('category.create')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Create</p>
                </a>
              </li>
              
            </ul>
          </li>

        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
