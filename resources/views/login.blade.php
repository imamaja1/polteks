<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="asset2/fonts/icomoon/style.css">

    <link rel="stylesheet" href="asset2/css/owl.carousel.min.css">

    <link rel="stylesheet" href="asset2/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="asset2/css/style.css">

    <title>WPDSM</title>
  </head>
  <body>
  

  
  <div class="content ">
    <div class="container">
      <div class="row">
        <div class="col-md-6">
          <img src="asset2/images/IMG-20220710-WA0021.jpg" alt="Image" class="img-fluid">
        </div>
        <div class="col-md-6 contents">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="mb-4" style="margin-top: 70px">
              <h3>Sign In</h3>
            </div>

            @if ($message = Session::get('status'))
            <div class="alert alert-success text-white" role="alert">
              <strong>Berhasil!</strong> {{ $message }}
            </div>
            @endif
            
            <form action="/login" role="form" class="text-start" method="post">
              @csrf
              <div class="form-group first">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" id="email" autofocus required>

              </div>
              <div class="form-group last mb-4">
                <label for="password">Password</label>
                <input type="password" class="form-control" name="password" id="password" autofocus required>
                
              </div>
              

              <input type="submit" value="Log In" class="btn btn-block btn-primary">

              
              
            </form>
            </div>
          </div>
          <p class="mt-4 text-sm text-center">
            Don't have an account?
            <a href="/register" class="text-primary text-gradient font-weight-bold">Sign up</a>
          </p>
        </div>
        
      </div>
    </div>
  </div>
    <script src="asset2/js/jquery-3.3.1.min.js"></script>
    <script src="asset2/js/popper.min.js"></script>
    <script src="asset2/js/bootstrap.min.js"></script>
    <script src="asset2/js/main.js"></script>
  </body>
</html>