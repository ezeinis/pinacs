<!DOCTYPE html>

<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title') - Admin - Basic Auth Sentinel</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- Stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/main.css">
    <link rel="stylesheet" type="text/css" href="/css/sweetalert.css">
    <link rel="stylesheet" type="text/css" href="/css/font-awesome.min.css">
    <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->


</head>
<body>

    <header>



<nav class="navbar navbar-default">
  <div class="container-fluid">

    <!-- Brand/logo -->
    <div class="navbar-header">
      <a class="navbar-brand" href="#">Pinacs</a>
    </div>
    <ul class="nav navbar-nav navbar-right">
        <li><a href="/logout">Logout</a></li>
      </ul>
  </div>
</nav>



    </header>

    <div class="container-fluid main-container">
        <div class="sidebar">
            @if(Sentinel::getUser()['roles'][0]->name=='Admins')
                <ul>
                    <li>
                        <a href="/admin/profiles"><i class="fa fa-users side_links" aria-hidden="true"></i>Users</a>
                    </li>
                    <li>
                        <a href="/admin/levelsclasses"><i class="fa fa-book side_links" aria-hidden="true"></i>Levels - Classes</a>
                    </li>
                </ul>
            @elseif(Sentinel::getUser()['roles'][0]->name=='Teachers')
                <ul>
                    <li>
                        <a href="/profile"><i class="fa fa-user side_links" aria-hidden="true"></i>
                        My Profile</a>
                    </li>
                    <li>
                        <a href="/teacher/classes"><i class="fa fa-book side_links" aria-hidden="true"></i>My Classes</a>
                    </li>
                </ul>
            @elseif(Sentinel::getUser()['roles'][0]->name=='Students')
                <ul>
                    <li>
                        <a href="/profile"><i class="fa fa-user side_links" aria-hidden="true"></i>
                        My Profile</a>
                    </li>
                    <li>
                        <a href="/student/classes"><i class="fa fa-book side_links" aria-hidden="true"></i>My Classes</a>
                    </li>
                </ul>
            @endif
        </div>
        <div class="main-content">
          @yield('content')
        </div>
    </div>

    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/jquery.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    @yield('js')

</body>
</html>
