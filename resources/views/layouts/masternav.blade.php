
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>LipaRent</title>
  <link rel="stylesheet" href="{{asset('css/app.css')}}"> 
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>

<body class="hold-transition skin-blue layout-top-nav">
        <div class="wrapper">
        
          <header class="main-header">
            <nav class="navbar navbar-static-top">
              <div class="container">
                <div class="navbar-header">
                  <a href="../../index2.html" class="navbar-brand"><b>Admin</b>LTE</a>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>
                </div>
        
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Link <span class="sr-only">(current)</span></a></li>
                    <li><a href="#">Link</a></li>
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <span class="caret"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="#">Action</a></li>
                        <li><a href="#">Another action</a></li>
                        <li><a href="#">Something else here</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Separated link</a></li>
                        <li class="divider"></li>
                        <li><a href="#">One more separated link</a></li>
                      </ul>
                    </li>
                  </ul>
                </div>
                <!-- /.navbar-collapse -->
                <!-- Navbar Right Menu -->
                <div class="navbar-custom-menu">
                  
                        <ul class="nav navbar-nav">


                                <!-- User Account: style can be found in dropdown.less -->
                                <li class="dropdown user user-menu">
                                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{asset('images/user.jpg')}}" class="user-image" alt="User Image">
                                    <span class="hidden-xs"> {{ Auth::user()->name }}</span>
                                  </a>
                                  <ul class="dropdown-menu">
                                  @guest
                                      <li><a href="{{ route('login') }}">Login</a></li>
                                      <li><a href="{{ route('register') }}">Register</a></li>
                                  @else
                                    <!-- User image -->
                                    <li class="user-header">
                                      <img src="{{asset('images/user.jpg')}}" class="img-circle" alt="User Image">
                                      <p>
                                          {{ Auth::user()->name }}
                                        <small>Landlord</small>
                                      </p>
                                    </li>
                                    <!-- Menu Footer-->
                                    <li class="user-footer">
                                      <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">Profile</a>
                                      </div>
                                      <div class="pull-right">
                                          <a href="{{ route('logout') }}"  class="btn btn-default btn-flat"
                                          onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                          Logout
                                      </a>
                                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                          {{ csrf_field() }}
                                      </form>
                                      </div>
                                    </li>
                                  @endguest  
                                  </ul>
                                </li>
                              </ul>  
                   
                </div>
                <!-- /.navbar-custom-menu -->
              </div>
              <!-- /.container-fluid -->
            </nav>
          </header>
          <!-- Full Width Column -->
          <div class="content-wrapper">
            <div class="container">
              <!-- Content Header (Page header) -->
              <section class="content-header">
                <h1>
                  Top Navigation
                  <small>Example 2.0</small>
                </h1>
                <ol class="breadcrumb">
                  <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                  <li><a href="#">Layout</a></li>
                  <li class="active">Top Navigation</li>
                </ol>
              </section>
        
              <!-- Main content -->
              <section class="content">
                <div class="callout callout-info">
                  <h4>Tip!</h4>
        
                  <p>Add the layout-top-nav class to the body tag to get this layout. This feature can also be used with a
                    sidebar! So use this class if you want to remove the custom dropdown menus from the navbar and use regular
                    links instead.</p>
                </div>
                <div class="callout callout-danger">
                  <h4>Warning!</h4>
        
                  <p>The construction of this layout differs from the normal one. In other words, the HTML markup of the navbar
                    and the content will slightly differ than that of the normal layout.</p>
                </div>
                <div class="box box-default">
                  <div class="box-header with-border">
                    <h3 class="box-title">Blank Box</h3>
                  </div>
                  <div class="box-body">
                    The great content goes here
                  </div>
                  <!-- /.box-body -->
                </div>
                <!-- /.box -->
              </section>
              <!-- /.content -->
            </div>
            <!-- /.container -->
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="container">
              <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.0
              </div>
              <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
              reserved.
            </div>
            <!-- /.container -->
          </footer>
        </div>
        <!-- ./wrapper -->        
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>