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
  </div>
</nav>



    </header>

    <div class="container">
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Login</h3>
                    </div>
                    <div class="panel-body">
                        <form method="POST" action="/login">
                        {{csrf_field()}}
                        <fieldset>
                            @if (session()->has('error_message'))
                                <div class="alert alert-danger">
                                    {{ session()->get('error_message') }}
                                </div>
                            @endif
                            <!-- Email field -->
                            <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email" name="email">
                            </div>
                            <!-- Password field -->
                            <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                            </div>
                            <div class="checkbox">
                                <label for="remember">
                                  <input id="remember" name="remember" type="checkbox"> Remember me
                                </label>
                              </div>
                            <!-- Submit field -->
                            <div class="form-group">
                                <button type="submit" class="btn btn-success">Login</button>
                            </div>
                        </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="//code.jquery.com/jquery-1.11.0.min.js"></script>
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>

</body>
</html>
