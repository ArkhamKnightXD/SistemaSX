<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Shuxhy | www.Shuxhy.com</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/search.css')}}">

    <!-- Select -->
    <link rel="stylesheet" href="{{asset('css/bootstrap-select.min.css')}}">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
    <link rel="apple-touch-icon" href="{{asset('img/apple-touch-icon.png')}}">
    <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}">

  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <header class="main-header">

        <!-- Logo -->
        <a href="/welcome" class="logo">
          <!-- mini logo for sidebar mini 50x50 pixels -->
          <span class="logo-mini"><b>Shu</b></span>
          <!-- logo for regular state and mobile devices -->
          <span class="logo-lg"><b>Shuxhy</b></span>
        </a>

        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Navegación</span>
          </a>
          <!-- Navbar Right Menu -->
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <!-- Messages: style can be found in dropdown.less-->
              
            <!-- Right Side Of Navbar -->
          <div align="Right">
            <ul class="nav navbar-nav navbar-right">

                            <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Cerrar Sesión</a></li>
                            </ul>
                        </li>
            </ul>
          </div>

                <ul class="dropdown-menu">
                  <!-- User image -->
                  <li class="user-header">
                    
                    <p>
                      www.Shuxhy.com - Reposteria
                      <small>www.Instagram.com</small>
                    </p>
                  </li>
                  
                  <!-- Menu Footer-->
                  <li class="user-footer">
                    
                    <div class="pull-right">
                      <a href="#" class="btn btn-default btn-flat">Cerrar</a>
                    </div>
                  </li>
                </ul>
              </li>
              
            </ul>
          </div>

        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
                    
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header"></li>

            <li class="treeview">
              <a href="#">
                <i class="fa fa-spinner"></i>
                <span>Produccion</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('almacen/receta') }}"><i class="fa fa-circle-o"></i>Recetas</a></li>
                <li><a href="{{ url('almacen/produccion')}}"><i class="fa fa-circle-o"></i>Nueva produccion</a></li>
                </ul>
            </li>
            
            
            <li class="treeview">
              <a href="#">
                <i class="fa fa-archive"></i>
                <span>Almacén</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('almacen/producto')}}"><i class="fa fa-circle-o"></i>Productos</a></li>
                <li><a href="{{ url('almacen/material')}}"><i class="fa fa-circle-o"></i>Materiales</a></li>
                <li><a href="{{ url('almacen/combo')}}"><i class="fa fa-circle-o"></i>Combos</a></li>
              </ul>
            </li>
            
            <li class="treeview">
              <a href="{{ url('almacen/pedido')}}">
                <i class="fa fa-truck"></i>
                <span>Pedidos</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
            </li>

             <li class="treeview">
              <a href="{{ url('almacen/cliente')}}">
                <i class="fa fa-users"></i>
                <span>Clientes</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>

            <li class="treeview">
              <a href="{{ url('almacen/factura')}}">
                <i class="fa fa-shopping-cart"></i>
                <span>Facturación</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
              </li>

                <li class="treeview">
              <a href="{{ url('almacen/suplidor')}}">
                <i class="fa fa-fax"></i>
                <span>Suplidores</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>
             
            </li>


              <li class="treeview">
              <a href="{{ url('almacen/compra')}}">
                <i class="fa fa-cart-arrow-down"></i>
                <span>Compras</span>
                 <i class="fa fa-angle-left pull-right"></i>
              </a>


              <li class="treeview">
              <a href="#">
                <i class="fa fa-cog"></i>
                <span>Administración</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('administracion/usuario')}}"><i class="fa fa-circle-o"></i>Usuarios</a></li>
                <li><a href="{{ url('administracion/unidad')}}"><i class="fa fa-circle-o"></i>Unidades</a></li>
                <li><a href="{{ url('administracion/forma')}}"><i class="fa fa-circle-o"></i>Formas</a></li>
                <li><a href="{{ url('administracion/relleno')}}"><i class="fa fa-circle-o"></i>Rellenos</a></li>
                <li><a href="{{ url('administracion/topping')}}"><i class="fa fa-circle-o"></i>Toppings</a></li>
                <li><a href="{{ url('administracion/sabor')}}"><i class="fa fa-circle-o"></i>Sabores</a></li>
              </ul>
            </li>         


            <li class="treeview">
              <a href="#">
                <i class="fa fa-folder"></i> <span>Reportes</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="{{ url('reportes/ventas')}}"><i class="fa fa-circle-o"></i>Ventas</a></li>
                 <li><a href="{{ url('reportes/ganancias')}}"><i class="fa fa-circle-o"></i>Ganancias</a></li>
                  <li><a href="{{ url('reportes/produccion')}}"><i class="fa fa-circle-o"></i>Produccion</a></li>
                
              </ul>
            </li>
                        
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>





       <!--Contenido-->
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        
        <!-- Main content -->
        <section class="content">
          
          <div class="row">
            <div class="col-md-12">
              <div class="box">
                <div class="box-header with-border">
                  
                  <div class="box-tools pull-right">
                    <button class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
                    
                    <button class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                  </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                  	<div class="row">
	                  	<div class="col-md-12">
		                          <!--Contenido-->
                              @yield('contenido') <!--Contenido dinamico-->
		                          <!--Fin Contenido-->
                           </div>
                        </div>
		                    
                  		</div>
                  	</div><!-- /.row -->
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div><!-- /.col -->
          </div><!-- /.row -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <!--Fin-Contenido-->
      
      
    <!-- jQuery 2.1.4 -->
    <script src="{{asset('js/jQuery-2.1.4.min.js')}}"></script>
    @stack('scripts')
    <!-- Bootstrap 3.3.5 -->
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/search.js')}}"></script>

     <!-- Select -->
    <script src="{{asset('js/bootstrap-select.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{asset('js/app.min.js')}}"></script>
    
  </body>
</html>
