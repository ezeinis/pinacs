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
            <ul>
                <li>
                    <a href="/admin/profiles">Users</a>
                </li>
                <li>
                    <a href="">test</a>
                </li>
                <li>
                    <a href="">test</a>
                </li>
            </ul>
        </div>
        <div class="main-content">
          @yield('content')
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>
