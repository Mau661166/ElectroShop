<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="css/font-face.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">


    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">USUARIO:
    @if($errors->first('nombre'))
    <p class ='text-danger'>{{$errors->first('nombre')}}</p>
    @endif
    </label>
    <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
    <div class="col-md-6">
    <input id="usuario" value="{{old('nombre')}}" type="text"  name="usuario" placeholder="Usuario">                                 
    </div>
    </div>


    <div class="form-group row">
    <label for="name" class="col-md-4 col-form-label text-md-right">Correo:
    @if($errors->first('email'))
    <p class ='text-danger'>{{$errors->first('email')}}</p>
    @endif
    </label>
    <label for="name" class="col-md-1 col-form-label text-md-right asterisco">*</label>
    <div class="col-md-6">
    <input id="email" value="{{old('email')}}" type="text"  name="Email" placeholder="email">                                 
    </div>
    </div>


    <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Contraseña:
    @if($errors->first('email'))
    <p class ='text-danger'>{{$errors->first('email')}}</p>
    @endif
    </label>
    <label for="password" class="col-md-1 col-form-label text-md-right asterisco">*</label>
    <div class="col-md-6">
    <input id="password" value="{{old('password')}}" type="text"  name="Passwors" placeholder="password">                                 
    </div>
    </div>


    <div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Confirmar:
    @if($errors->first('email'))
    <p class ='text-danger'>{{$errors->first('email')}}</p>
    @endif
    </label>
    <label for="password" class="col-md-1 col-form-label text-md-right asterisco">*</label>
    <div class="col-md-6">
    <input id="password" value="{{old('password')}}" type="text"  name="Confirmar Passwors" placeholder="password">                                 
    </div>
    </div>
<center>
    <form action="" method="post">
 
 <label for="name">Name:</label>
 <input name="name" required><br />

 <label for="email">Email:</label>
 <input name="email" type="email" required><br />

 <div class="g-recaptcha" data-sitekey="6LcePAATAAAAAGPRWgx90814DTjgt5sXnNbV5WaW"></div>

 <br>
 <br>
 <br>
 <br>

 <input type="submit" value="Submit" />

</form>
</center>
        

    
  <!-- Jquery JS-->
    <script src="vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="vendor/slick/slick.min.js">
    </script>
    <script src="vendor/wow/wow.min.js"></script>
    <script src="vendor/animsition/animsition.min.js"></script>
    <script src="vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="vendor/circle-progress/circle-progress.min.js"></script>
    <script src="vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="js/main.js"></script>

</body>

</html>
   





    
    
      
     
