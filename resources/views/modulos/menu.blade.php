  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{route('soporte.index')}}" class="brand-link">
      <img src="/adminlte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">SoporteDGC</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
  

      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-header">GENERAL</li>    
        
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-sitemap"  style="color: lime"></i>
              <p  style="color: white">
                Ubicaciones
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('ubicaciones.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Ubicaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('ubicaciones.create')}}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nueva Ubicación</p>
                </a>
              </li>
              
            </ul>
          </li>
          
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-print"  style="color: white"></i>
              <p  style="color: white">
                Impresoras
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('impresoras.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Ubicaciones</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('impresoras.create')}}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nueva Impresora</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-tint"  style="color: red"></i>
              <p  style="color: white">
                Toners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('toners.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Toners</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('toners.create')}}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nuevo Toner</p>
                </a>
              </li>
              
            </ul>
          </li>

          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-list"  style="color: azuregray"></i>
              <p  style="color: white">
                Cambio de toners
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{route('cambios.index')}}" class="nav-link">
                  <i class="far fa-eye nav-icon" style="color: red;"></i>
                  <p>Ver Cambios</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="{{route('cambios.create')}}" class="nav-link">
                  <i class="far fa-plus nav-icon" style="color: lime"></i>
                  <p>Nuevo Cambio</p>
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