
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
                  <a href="/home" class="navbar-brand"><b>Lipa</b>Rent</a>
                  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                    <i class="fa fa-bars"></i>
                  </button>
                </div>
        
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                  <ul class="nav navbar-nav">
                    <li class="active"><a href="/home">Home<span class="sr-only">(current)</span></a></li>
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
              </section>
        
              <!-- Main content -->
              <section class="content">
                    @yield('content')

              </section>
              <!-- /.content -->
            </div>
            <!-- /.container -->
          </div>
          <!-- /.content-wrapper -->
          <footer class="main-footer">
            <div class="container">
              <div class="pull-right hidden-xs">
                <b>Lipa</b> Rent
              </div>
              <strong>Copyright &copy; 2018 <a href="https://liparent.com">LipaRent</a>.</strong> All rights
              reserved.
            </div>
            <!-- /.container -->
          </footer>
        </div>
        <!-- ./wrapper -->        
<script src="{{asset('js/app.js')}}"></script>
</body>
</html>